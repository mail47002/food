<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('backend.password.index');
    }

    public function forgot(Request $request)
    {
        $this->validateForm($request);

        return view('backend.password.success');
    }

    protected function validateForm(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
        ]);
    }
}
