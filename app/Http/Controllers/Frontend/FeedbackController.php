<?php

namespace App\Http\Controllers\Frontend;

use App\Mail\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    public function show()
    {
        return view('frontend.feedback.show');
    }

    public function store(Request $request)
    {
        $this->validateForm($request);

        Mail::to()->send(new Feedback());
    }

    protected function validateForm(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|regex:/\+38\s\(\d{3}\)\s\d{3}\s\d{2}\s\d{2}/'
        ]);
    }
}
