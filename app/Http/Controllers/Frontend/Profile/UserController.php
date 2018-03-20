<?php

namespace App\Http\Controllers\Frontend\Profile;

use App\Order;
use App\ProductReview;
use App\User;
use App\UserReview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Helper;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware([
            'auth', 'profile.check'
        ]);
    }

    public function show($slug)
    {
        $user = User::findBySlug($slug);

        if ($user) {
            // Reviews
            if (Helper::isClientReviews()) {
                $reviews = UserReview::with('answer')
                    ->where('user_id', $user->id)
                    ->paginate();
            } else {
                $reviews = ProductReview::with('answer')
                    ->whereHas('product', function ($query) use ($user) {
                        $query->where('user_id', $user->id);
                    })
                    ->paginate();
            }

            $productReviews = ProductReview::whereHas('product', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->count();

            $userReviews = UserReview::where('user_id', $user->id)->count();

            // Check order
            $hasOrder = Order::whereHas('advert', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })
                ->where('user_id', Auth::id())
                ->exists();

            return view('frontend.profile.user.show', [
                'user'           => $user,
                'reviews'        => $reviews,
                'productReviews' => $productReviews,
                'userReviews'    => $userReviews,
                'hasOrder'       => $hasOrder
            ]);
        }

        return redirect()->back();
    }
}
