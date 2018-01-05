<?php

namespace App\Http\Controllers\Frontend\Profile;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function show($user)
    {
        $user = User::where('slug', $user)->first();

        if ($user) {
            return view('frontend.profile.user.show', [
                'user' => $user
            ]);
        }
    }
}
