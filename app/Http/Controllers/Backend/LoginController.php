<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('backend.login.index');
    }

    public function login(Request $request)
    {
        $this->validateForm($request);

        $remember = $request->has('remember') ? true : false;

        if (Auth::guard('admin')->attempt($this->credentials($request), $remember)) {
            return redirect()->route('admin.dashboard');
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
            'role_id'   => 1,
        ];
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect('/admin');
    }
}
