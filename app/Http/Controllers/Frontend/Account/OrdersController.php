<?php

namespace App\Http\Controllers\Frontend\Account;

use App\Notifications\OrderConfirmed;
use App\Notifications\OrderCanceled;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::with(['advert' => function ($query) {
                $query->with('user');
            }])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('frontend.account.orders.index', [
            'orders' => $orders
        ]);
    }

    public function confirm($id)
    {
        $order = Order::find($id);

        if ($order) {
            $order->confirmed();

            $order->user->notify(new OrderConfirmed($order));
        }

        return redirect()->back();
    }

    public function destroy($id)
    {
        $order = Order::find($id);

        if ($order) {
            $order->user->notify(new OrderCanceled($order));

            $order->delete();
        }

        return redirect()->back();
    }
}
