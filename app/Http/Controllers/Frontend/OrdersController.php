<?php

namespace App\Http\Controllers\Frontend;

use App\Advert;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\OrderCreated;
use Auth;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * TODO: Check auth user id & advert id
     *
     */
    public function store(Request $request)
    {
        $this->validateForm($request);

        $advert = Advert::with('user')
            ->where('user_id', '!=', Auth::id())
            ->find($request->advert_id);

        if ($advert && !Order::where('advert_id', $request->advert_id)->where('user_id', Auth::id())->exists()) {
            $order = Order::create($request->all());

            $advert->user->notify(new OrderCreated($order));

            return response()->json([
                'status' => 'success'
            ]);
        }

        return response()->json([
            'status' => 'warning'
        ]);
    }

    protected function validateForm(Request $request)
    {
        $this->validate($request, [
            'advert_id' => 'required',
            'user_id'   => 'required'
        ]);
    }
}