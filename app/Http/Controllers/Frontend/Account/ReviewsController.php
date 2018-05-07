<?php

namespace App\Http\Controllers\Frontend\Account;

use App\ProductReview;
use App\UserReview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Helper;

class ReviewsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'profile.check']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Helper::isClientReviews()) {
            $reviews = UserReview::with('answer')
                ->where('author_id', Auth::id())
                ->paginate();
        } else {
            $reviews = ProductReview::with(['product.user.profile', 'answer'])
                ->where('author_id', Auth::id())
                ->paginate();
        }

        $productReviews = ProductReview::where('author_id', Auth::id())->count();
        $userReviews = UserReview::where('author_id', Auth::id())->count();

        return view('frontend.account.reviews.index', [
            'reviews'        => $reviews,
            'productReviews' => $productReviews,
            'userReviews'    => $userReviews
        ]);
    }

    public function create()
    {
        return view('frontend.account.reviews.create');
    }
}
