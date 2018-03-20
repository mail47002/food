<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProductReviewAnswerResource;
use App\ProductReviewAnswer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ProductReviewAnswersController extends Controller
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

        $answer = ProductReviewAnswer::create($request->all());

        return new ProductReviewAnswerResource($answer);
    }

    protected function validateForm(Request $request)
    {
        $this->validate($request, [
            'product_review_id' => 'required',
            'text'              => 'required'
        ]);
    }
}
