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
    /**
     * Show login form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        return view('frontend.login.show');
    }

    /**
     * Login user.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $this->validateForm($request);

        if (Auth::guard('web')->attempt($this->credentials($request), true)) {
            if (Auth::user()->has_profile){
                return response()->json([
                    'url' => route('account.user.show')
                ]);
            }

            return response()->json([
                'url' => route('account.user.create')
            ]);
        }
    }

    /**
     * Logout user.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        Auth::guard('web')->logout();

        return redirect('login');
    }

    /**
     * Validate request form.
     *
     * @param Request $request
     */
    protected function validateForm(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);
    }

    /**
     * User credentials.
     *
     * @param Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return [
            'email'    => $request->email,
            'password' => $request->password,
            'verified' => User::VERIFIED
        ];
    }
}
