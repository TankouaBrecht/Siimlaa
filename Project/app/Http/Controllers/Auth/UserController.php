<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Mail\RegisterMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function create(Request $request){
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'username'=>'required',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|min:5|max:15'
        ]);

        $data = array();
        $data['firstname'] = $request->firstname;
        $data['lastname'] = $request->lastname;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['created_at'] = Carbon::now();
        DB::table('users')->insert($data);

        $regisInfo=[
            'title' => 'Bienvenue',
            'name' => $request->firstname,
        ];
        Mail::to("$request->email")->send(new RegisterMail($regisInfo));
    
       return redirect('/')->with('success','Users inserted Successfull');
    
    }

    function check(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:15'
        ]);
        $creds = $request->only('email','password');
        if(Auth::guard('web')->attempt($creds)){
            return redirect('/');
        }else{
            return redirect()->route('user.login')->with('fail','Error');
        }
    
    }
    
    function logout(){
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
