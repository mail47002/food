<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForgotPasswordController extends Controller
{
    public function show()
    {
        return view('frontend.forgot.show');
    }

    public function forgot(Request $request)
    {
        $this->validateForm($request);
    }

    protected function validateForm(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
        ]);
    }
}
