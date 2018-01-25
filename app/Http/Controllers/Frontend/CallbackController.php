<?php

namespace App\Http\Controllers\Frontend;

use App\Advert;
use App\Notifications\CallbackStored;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class CallbackController extends Controller
{
    /**
     * CallbackController constructor.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validateForm($request);

        $advert = Advert::find($request->advert_id);

        if ($advert) {
            $advert->user->notify(new CallbackStored(Auth::user(), $advert, $request->phone));

            return response()->json([
                'data'  => [
                    'message' => 'Ваш телефон відправлено'
                ]
            ]);
        }
    }

    /**
     * @param Request $request
     */
    protected function validateForm(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required|string|regex:/\+38\s\(\d{3}\)\s\d{3}\s\d{2}\s\d{2}/'
        ]);
    }
}
