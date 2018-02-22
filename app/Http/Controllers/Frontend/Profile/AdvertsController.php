<?php

namespace App\Http\Controllers\Frontend\Profile;

use App\Advert;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvertsController extends Controller
{
    public function index($slug, Request $request)
    {
        $user = User::findBySlug($slug);

        if ($user) {
            $advert = Advert::with('user.profile', 'product')
                ->where('user_id', $user->id)
                ->where('type', $request->input('type', 'by_date'))
                ->where('name', 'like', '%' . $request->search . '%')
                ->orderBy('created_at', 'desc')
                ->paginate();

            return view('frontend.profile.adverts.index', [
                'user'    => $user,
                'adverts' => $advert
            ]);
        }

        return redirect()->back();
    }
}
