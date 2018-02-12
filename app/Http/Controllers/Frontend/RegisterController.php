<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\EmailVerification;
use App\User;
use Hash;
use Mail;

class RegisterController extends Controller
{
    public function show()
    {
        return view('frontend.register.show');
    }

    public function register(Request $request)
    {
        $this->validateForm($request);

        $user = $this->createUser($request);

        Mail::to($user->email)->send(new \App\Mail\EmailVerification($user->token));

        return redirect()->route('success');

    }

    public function success()
    {
        return view('frontend.register.success');
    }

    public function verify(Request $request)
    {
        $user = User::where('token', $request->token)->first();
        if ($user){
            $user->verified();
            return view('frontend.register.information');
        }

        return redirect()->route('register');

    }

    protected function validateForm(Request $request)
    {
        $this->validate($request, [
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|min:5',
//            'g-recaptcha-response'  => 'required|recaptcha'
        ]);
    }

    protected function validateEmailToken()
    {

    }

    protected function createUser(Request $request)
    {
        return User::create([
            'email'         => $request->email,
            'role_id'       => 1,
            'password'      => Hash::make($request->password),
            'token'   => str_random(60)
        ]);
    }
}
