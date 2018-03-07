<?php

namespace App\Http\Controllers\Frontend\Profile;

use App\User;
use App\UserReview;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class UserReviewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($slug)
    {
        $user = User::findBySlug($slug);

        if ($slug) {
            return view('frontend.profile.reviews.client.create', [
                'user' => $user
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

        $review = UserReview::create($request->all());

        Session::flash('review', $review);

        return response()->json([
            'success' => true
        ]);
    }

    public function success($slug)
    {
        $user = User::findBySlug($slug);

        if ($user && Session::has('review')) {
            return view('frontend.profile.reviews.client.success', [
                'user' => $user
            ]);
        }

        return redirect()->back();
    }

    protected function validateForm(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'text'    => 'required',
            'rating'  => 'required',
            'type'    => 'required'
        ]);
    }
}
