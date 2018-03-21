<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\EmailVerification;
use App\User;
use Hash;
use Mail;
use Session;

class RegisterController extends Controller
{
    /**
     * Show registration form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        return view('frontend.register.show');
    }

    /**
     * Register new user.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        $this->validateForm($request);

        $user = $this->createUser($request);

        Mail::to($user->email)->send(new EmailVerification($user));

        return response()->json([
            'success' => true,
            'message' => trans('register.success')
        ]);

    }

    /**
     * Verified user.
     *
     * @param $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function verify($token)
    {
        $user = User::where('token', $token)->first();

        if ($user){
            $user->verified();

            return redirect()->route('login');
        }

        return redirect()->route('register');

    }

    /**
     * Validate request form.
     *
     * @param Request $request
     */
    protected function validateForm(Request $request)
    {
        $this->validate($request, [
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|min:5',
//            'g-recaptcha-response'  => 'required|recaptcha'
        ]);
    }

    /**
     * Create new user in resource.
     *
     * @param Request $request
     * @return mixed
     */
    protected function createUser(Request $request)
    {
        $user = new User;

        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->token = str_random(32);
        $user->save();

        return $user;
    }
}
