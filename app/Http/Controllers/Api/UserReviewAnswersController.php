<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserReviewAnswerResource;
use App\UserReviewAnswer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class UserReviewAnswersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $this->validateForm($request);

        $request->merge([
            'author_id' => Auth::id()
        ]);

        $answer = UserReviewAnswer::create($request->all());

        return new UserReviewAnswerResource($answer);
    }

    protected function validateForm(Request $request)
    {
        $this->validate($request, [
            'user_review_id' => 'required',
            'text'           => 'required'
        ]);
    }
}
