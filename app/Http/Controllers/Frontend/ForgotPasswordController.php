<?php

namespace App\Http\Controllers\Frontend;

use App\Mail\EmailVerification;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('frontend.login.forgot');
    }

    public function forgot(Request $request)
    {
        $this->validateForm($request);

        return view('frontend.login.success');
    }

    protected function validateForm(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
        ]);
    }

}
