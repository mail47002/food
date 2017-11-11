<?php

namespace App\Http\Controllers\Frontend\Profile;

use App\Advert;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvertsController extends Controller
{
    public function index($user, Request $request)
    {
        $user = User::where('slug', $user)->first();

        if ($user) {
            $advert = Advert::with(['user' => function ($query) use ($user) {
                    $query->where('slug', $user);
                }])
                ->where('type', $request->input('type', 'by_date'))
                ->where('name', 'like', '%' . $request->search . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(2);

            $categories = Category::all();

            return view('frontend.profile.adverts.index', [
                'user'       => $user,
                'adverts'    => $advert,
                'categories' => $categories
            ]);
        }
    }
}
