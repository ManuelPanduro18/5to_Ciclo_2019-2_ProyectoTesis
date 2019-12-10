<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Reservation;

class MailReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $reservationsCall;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Reservation $reservationsCall)
    {
        //
        $this->reservationsCall=$reservationsCall;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('OF. 403 INGRESOS.')->view('mails.received');
    }
}
