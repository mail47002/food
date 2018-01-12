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
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $advert = Advert::with('user')
            ->where('user_id', '!=', Auth::id())
            ->find($request->advert_id);

        if ($advert && $this->isValid($request, $advert)) {
            $order = Order::create($request->all());

            $advert->user->notify(new OrderCreated($order));
            Auth::user()->notify(new OrderCreated($order));

            return response()->json([
                'status' => 'success'
            ]);
        }

        return response()->json([
            'status' => 'warning'
        ]);
    }

    /**
     * Validate request.
     *
     * @param Request $request
     * @param $advert
     * @return bool
     */
    protected function isValid(Request $request, $advert)
    {
        if (!Order::where('advert_id', $request->advert_id)->where('user_id', Auth::id())->exists() && $advert->user !== Auth::id()) {
            return true;
        }

        return false;
    }
}