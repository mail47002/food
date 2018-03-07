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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Helper::isClientReviews()) {
            $reviews = UserReview::where('author_id', Auth::id())
                ->paginate();
        } else {
            $reviews = ProductReview::with(['product.user.profile'])
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
}
