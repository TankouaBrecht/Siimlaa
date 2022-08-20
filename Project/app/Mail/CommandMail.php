<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommandMail extends Mailable
{
    use Queueable, SerializesModels;
    public $commandInfo;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($commandInfo)
    {
        $this->commandInfo = $commandInfo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return  $this->subject('SIIMLAA')->view('email.command')->subject('Notification');
    }
}
