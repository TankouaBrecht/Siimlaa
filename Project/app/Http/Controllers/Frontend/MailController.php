<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\marketplace;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function SendEmail(){
        $details=[
            'title' => 'Mail test',
            'body' => 'this is mail testing',
        ];
        Mail::to("brtankoua@gmail.com")->send(new marketplace($details));
        return 'mail sent';
    }
}
