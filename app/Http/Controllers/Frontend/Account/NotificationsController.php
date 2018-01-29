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

            if ($notification->type === 'App\Notifications\CallbackStored') {
                $notification->advert = Advert::with('user')->find($notification->data['advert_id']);
                $notification->user = User::find($notification->data['user_id']);
            }

            if ($notification->type === 'App\Notifications\AdvertDeleted') {

            }
        }

        return view('frontend.account.notifications.index', [
            'notifications' => $notifications
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
