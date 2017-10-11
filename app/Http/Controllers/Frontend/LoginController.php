<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\MailClass;
use Auth;
use Mail;
use Validator;
use App\User;
use File;
use Image;
use App\Address;
use App\Reviews;
use Hash;

class LoginController extends Controller
{
    public function show()
    {
        return view('frontend.login.show');
    }

    public function login(Request $request)
    {
        $this->validateForm($request);

        if (Auth::guard('web')->attempt($this->credentials($request), true)) {
            if (Auth::user()->email_token){
                return redirect()->route('profile.users.create');
            }

            return redirect()->route('profile.users.show', Auth::id());
        }

        return redirect()->back()->withInput();
    }

    protected function validateForm(Request $request)
    {
        $this->validate($request, [
            'email'     => 'required|email',
            'password'  => 'required|string',
        ]);
    }

    protected function credentials(Request $request)
    {
        return [
            'email'     => $request->email,
            'password'  => $request->password,
            'verified'  => 1
        ];
    }

    public function logout()
    {
        Auth::guard('web')->logout();

        return redirect('login');
    }
}
