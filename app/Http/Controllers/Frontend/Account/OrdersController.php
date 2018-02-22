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
    /**
     * OrdersController constructor.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $orders = Order::with(['advert', 'user'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('frontend.account.orders.index', [
            'orders' => $orders
        ]);
    }

    /**
     * Order confirm.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function confirm($id)
    {
        $order = Order::find($id);

        if ($order) {
            $order->confirmed();

            $order->user->notify(new OrderConfirmed($order));
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $order = Order::find($id);

        if ($order && $order->status === Order::CANCELED) {
            $order->advert->user->notify(new OrderCanceled($order));

            $order->delete();
        }

        return redirect()->back();
    }
}
