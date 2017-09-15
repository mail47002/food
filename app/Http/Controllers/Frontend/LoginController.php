<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('frontend.login.login');
    }

    public function login(Request $request)
    {
        $this->validateForm($request);

        if (Auth::guard('web')->attempt($this->credentials($request), true)) {
            if (Auth::user()->email_token){
                return redirect()->route('profile.create');
            }

            return redirect()->route('profile.index');
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
