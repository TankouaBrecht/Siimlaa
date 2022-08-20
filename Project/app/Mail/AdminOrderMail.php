<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order_admin_Info;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order_admin_Info)
    {
        $this->order_admin_Info = $order_admin_Info;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return  $this->subject('SIIMLAA')->view('email.admin_order')->subject('Notification');
    }
}
