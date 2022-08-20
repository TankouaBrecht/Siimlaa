<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /*===========================================
    ABOUT US PAGE VIEW PAGE
    ===========================================*/

    public function ctrAboutUsView(){

        return view('frontend.pages.about.about_us'); 

    } //End Method

}
