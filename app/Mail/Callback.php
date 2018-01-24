<?php

namespace App\Mail;

use App\Advert;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Callback extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $advert;
    public $phone;

    /**
     * Callback constructor.
     *
     * @param User $user
     * @param Advert $advert
     * @param $phone
     */
    public function __construct(User $user, Advert $advert, $phone)
    {
        $this->user = $user;
        $this->advert = $advert;
        $this->phone = $phone;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.callback');
    }
}
