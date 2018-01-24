<?php

namespace App\Notifications;

use App\Advert;
use App\Order;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class OrderStored extends Notification
{
    use Queueable;

    public $user;
    public $advert;
    public $order;

    /**
     * OrderStored constructor.
     *
     * @param User $user
     * @param Advert $advert
     * @param Order $order
     */
    public function __construct(User $user, Advert $advert, Order $order)
    {
        $this->user = $user;
        $this->advert = $advert;
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    public function toDatabase($notifiable)
    {
        return [
            'user'   => $this->user,
            'advert' => $this->advert,
            'order'  => $this->order
        ];
    }
}