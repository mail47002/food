<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\OrderResource;
use App\Notifications\OrderCanceled;
use App\Notifications\OrderConfirmed;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    /**
     * OrdersController constructor.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Return new orders.
     *
     * @param Request $request
     * @return OrderResource
     */
    public function stored(Request $request)
    {
        $orders = Order::with(['user'])
            ->where('advert_id', $request->advert_id)
            ->where('confirmed', '!=', Order::CONFIRMED)
            ->orderBy('created_at', 'desc')
            ->get();

        return new OrderResource($orders);
    }

    /**
     * Confirm order.
     *
     * @param Request $request
     * @param $id
     * @return OrderResource
     */
    public function confirm(Request $request, $id)
    {
        $order = Order::find($id);

        if ($order) {
            $order->confirmed();

            $order->user->notification(new OrderConfirmed($order));

            return new OrderResource($order);
        }
    }

    /**
     * Return confirmed orders.
     *
     * @param Request $request
     * @return OrderResource
     */
    public function confirmed(Request $request)
    {
        $orders = Order::with(['user'])
            ->where('advert_id', $request->advert_id)
            ->where('confirmed', Order::CONFIRMED)
            ->orderBy('confirmed_at', 'desc')
            ->get();

        return new OrderResource($orders);
    }

    /**
     * Cancel order.
     *
     * @param Request $request
     * @param $id
     */
    public function cancel(Request $request, $id)
    {
        $order = Order::find($id);

        if ($order) {
            $order->user->notification(new OrderCanceled($order));
        }
    }
}
