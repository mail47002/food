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

    /**
     * Callback constructor.
     *
     * @param User $user
     * @param Advert $advert
     */
    public function __construct(User $user, Advert $advert)
    {
        $this->user = $user;
        $this->advert = $advert;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.callback');
    }
}
