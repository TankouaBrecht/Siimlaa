<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    
    /*===========================================
    CONTACT PAGE VIEW PAGE
    ===========================================*/

    public function ctrContactUsView(){

        return view('frontend.pages.contact.contact_us'); 

    } //End Method

}
