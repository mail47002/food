<?php

namespace App\Http\Controllers\Frontend;

use App\Mail\FeedbackStore;
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

        Mail::to()->send(new FeedbackStore());
    }

    protected function validateForm(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ]);
    }
}
