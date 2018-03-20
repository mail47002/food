<?php

namespace App\Http\Controllers\Frontend\Profile;

use App\Product;
use App\ProductReview;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class ProductReviewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($slug)
    {
        $user = User::findBySlug($slug);

        if ($slug) {
            $products = Product::leftJoin('adverts', 'adverts.product_id', '=', 'products.id')
                ->leftJoin('orders', 'orders.advert_id', '=', 'adverts.id')
                ->select('products.*')
                ->where('adverts.user_id', $user->id)
                ->where('orders.user_id', Auth::id())
                ->groupBy('products.id')
                ->get();

            return view('frontend.profile.reviews.product.create', [
                'user'     => $user,
                'products' => $products
            ]);
        }

        return redirect()->route('profile.reviews.create');
    }

    public function store(Request $request)
    {
        $this->validateForm($request);

        $request->merge([
            'author_id' => Auth::id()
        ]);

        $review = ProductReview::create($request->all());

        $product = Product::find($review->product_id);

        if ($product) {
            $rating = ProductReview::where('product_id', $review->product_id)
                ->avg('rating');

            $product->ratingUpdate($rating);
        }

        Session::flash('review', $review);

        return response()->json([
            'success' => true
        ]);
    }

    public function success($slug)
    {
        $user = User::findBySlug($slug);

        if ($user && Session::has('review')) {
            return view('frontend.profile.reviews.product.success', [
                'user' => $user
            ]);
        }

        return redirect()->back();
    }

    protected function validateForm(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required',
            'text'       => 'required',
            'rating'     => 'required',
            'type'       => 'required'
        ]);
    }
}
