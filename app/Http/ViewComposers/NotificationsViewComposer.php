<?php

namespace App\Http\ViewComposers;

use App\Advert;
use App\Order;
use App\User;
use Illuminate\View\View;
use Auth;
use Helper;

class NotificationsViewComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $notifications = Auth::user()
            ->unreadNotifications()
            ->take(5)
            ->get();

        foreach($notifications as $notification) {
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

        $view->with('headerNotifications', $notifications);
    }
}