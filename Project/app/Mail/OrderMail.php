<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;
    public $OrderInfo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($OrderInfo)
    {
        $this->OrderInfo = $OrderInfo;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return  $this->subject('SIIMLAA')->view('email.order')->subject('Notification');
    }
}
