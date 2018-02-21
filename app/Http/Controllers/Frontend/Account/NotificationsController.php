<?php

namespace App\Http\Controllers\Frontend\Account;

use App\Advert;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Helper;

class NotificationsController extends Controller
{
    /**
     * NotificationsController constructor.
     *
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Auth::user()->notifications()->paginate();

        foreach($notifications as $notification) {
            $notification->markAsRead();

            if (Helper::isNotificationOrderCreated($notification->type) || Helper::isNotificationOrderConfirmed($notification->type) || Helper::isNotificationOrderCanceled($notification->type)) {
                $notification->order = Order::with(['advert' => function ($query) {
                        $query->with('user');
                    }, 'user'])
                    ->find($notification->data['order']['id']);
            }
        }

        return view('frontend.account.notifications.index', [
            'notifications' => $notifications
        ]);
    }
}
