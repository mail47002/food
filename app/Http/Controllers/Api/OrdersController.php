<?php

namespace App\Http\Controllers\Api;

use App\Advert;
use App\Http\Resources\OrderResource;
use App\Notifications\OrderCanceled;
use App\Notifications\OrderConfirmed;
use App\Notifications\OrderCreated;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Helper;
use Mail;

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
     * Create new order.
     *
     * @param Request $request
     * @return OrderResource
     */
    public function store(Request $request)
    {
        $advert = Advert::with('user')
            ->where('id', $request->advert_id)
            ->where('user_id', '!=', Auth::id())
            ->first();

        if ($advert && $this->isValid($request, $advert)) {
            $request->merge([
                'price'        => $advert->price,
                'custom_price' => $advert->custom_price,
                'status'       => Order::CREATED
            ]);

            $order = Order::create($request->all());

            $advert->user->notify(new OrderCreated($order));
            Mail::to($advert->user->email)->send(new \App\Mail\OrderCreated($order));

            return new OrderResource($order);
        }

        return response('', 422);
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
            ->whereStatus(Order::CREATED)
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

            $order->user->notify(new OrderConfirmed($order));
            Mail::to($order->user->email)->send(new \App\Mail\OrderConfirmed($order));

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
            ->whereStatus(Order::CONFIRMED)
            ->orderBy('updated_at', 'desc')
            ->get();

        return new OrderResource($orders);
    }

    /**
     * Cancel order.
     *
     * @param Request $request
     * @param $id
     * @return OrderResource
     */
    public function cancel(Request $request, $id)
    {
        $order = Order::find($id);

        if ($order) {
            $order->canceled();

            $order->user->notify(new OrderCanceled($order));

            return new OrderResource($order);
        }
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
        if (!Order::where('advert_id', $request->advert_id)->where('user_id', Auth::id())->exists() && $advert->user_id !== Auth::id()) {
            return true;
        }

        return false;
    }
}
