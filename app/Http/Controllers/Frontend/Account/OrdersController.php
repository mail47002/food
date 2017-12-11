<?php

namespace App\Http\Controllers\Frontend\Account;

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
        $orders = Order::with(['advert'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('frontend.account.orders.index', [
            'orders' => $orders
        ]);
    }
}
