<?php

namespace App\Http\Controllers\Frontend\Profile;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ReviewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($slug)
    {
        $user = User::findBySlug($slug);

        if ($slug) {
            return view('frontend.profile.reviews.create', [
                'user' => $user
            ]);
        }

        return redirect()->back();
    }
}
