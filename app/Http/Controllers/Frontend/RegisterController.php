<?php

namespace App\Http\Controllers\Frontend;

use App\Mail\EmailVerification;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use Mail;

class RegisterController extends Controller
{
    public function index()
    {
        return view('frontend.login.registration');
    }

    public function register(Request $request)
    {
        $this->validateForm($request);

        $user = $this->create($request);

        Mail::to($user->email)->send(new EmailVerification($user->token));

        return view('frontend.login.success');
    }

    public function verify($token)
    {
        $user = User::where('email_token', $token)->first();

        if ($user){
            $user->verified();

            return redirect()->route('login');
        }

        return redirect('/register');
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

    protected function create(Request $request)
    {
        return User::create([
            'email'         => $request->email,
            'role_id'       => 1,
            'password'      => Hash::make($request->password),
            'email_token'   => str_random(60)
        ]);
    }
}
