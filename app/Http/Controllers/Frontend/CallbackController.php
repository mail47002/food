<?php

namespace App\Http\Controllers\Frontend;

use App\Advert;
use App\Mail\Callback;
use App\Notifications\CallbackStored;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Mail;

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

        $user = User::find($request->user_id);
        $advert = Advert::find($request->advert_id);

        if ($user && $advert) {
            $user->notify(new CallbackStored($user, $advert, $request->phone));
//            Mail::to(Auth::user()->email)->send(new Callback($user, $advert, $request->phone));

            return response()->json([
                'status'  => 'success',
                'message' => 'Ваш телефон відправлено'
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
