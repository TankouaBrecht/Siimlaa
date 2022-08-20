<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    
    function create(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:5|max:15'
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['created_at'] = Carbon::now();
        DB::table('admins')->insert($data);
    
        return redirect()->route('admin.login')->with('success','admin inserted Successfull');
    
    }

    function check(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:1|max:15'
        ]);
        $creds = $request->only('email','password');
        if(Auth::guard('admin')->attempt($creds)){
            return redirect()->route('admin.dashboard.home');
        }else{
            return redirect()->route('admin.login')->with('fail','Error');
        }
    
    }
    
    function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    function profile(){
        $admin_auth_id = Auth::id();
        $admindata = Admin::find($admin_auth_id);
        return view('admin.pages.profile.admin_profile', compact('admindata'));
    }

    function editprofile(){
        $admin_auth_id = Auth::id();
        $editdata = Admin::find($admin_auth_id);
        return view('admin.pages.profile.admin_profile_edit', compact('editdata'));
    }

    function storeprofile(Request $request){

        $admin_auth_id = Auth::id();

        $data = Admin::find($admin_auth_id);
        $data->name = $request->name;
        $data->email = $request->email;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin_images/'.$data->profil_photo_path));
            $filename = date('ymdhi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['profile_photo_path'] = $filename;
        }
        $notification = array(
            'success' => 'admin profile updated successfully',
        ); 
        $data->save();

     return redirect()->route('admin.profile')->with($notification);    
    }

}
