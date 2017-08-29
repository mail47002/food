<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function login()
    {
        return view('frontend.login.login');
    }

     public function registration()
    {
        return view('frontend.login.registration');
    }

    public function register(Request $request)
    {
        // dd($request);
        // $this->validate($request, [
        //     'email'                     => 'required|email|unique:users,email',
        //     'password'                  => 'required|min:5',
        // ]);

        $user = new User();
        $user-> email = $request->email;
        $user-> role_id = 1;
        $user-> password = Hash::make($request->password);
        $user-> token = str_random(30);
        $user->save();



        return redirect()->route('success');
    }

    public function success(Request $request)
    {

        return view('frontend.login.success');
    }

    public function forgot()
    {
        return view('frontend.login.forgot');
    }

    public function information()
    {
        return view('frontend.login.information');
    }

    public function logout()
    {
        Auth::guard('web')->logout();

        return redirect()->route('home')->withLogout(1);
    }

}
