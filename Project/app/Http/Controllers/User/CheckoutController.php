<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shipping;
use App\Models\Commandproduct;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Cart;

class CheckoutController extends Controller
{
    //

        // CHECKOUT 

        public function checkoutView(){
            if(Auth::check()){
      
              if(Cart::total() > 0){
                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();
                return view('frontend.pages.shop-checkout.index',compact('carts','cartQty','cartTotal'));
              }else{
                $notification = array(
                  'message' =>'Add some product to cart',
                  'alert-type'=>'error'
                );
                return redirect('/')->with($notification);
              }
      
             }else{
              $notification = array(
                'message' =>'At First Login Your Account',
                'alert-type'=>'error'
             );
              return redirect()->route('user.login')->with($notification);
             }
          
        }

        public function checkoutStore(Request $request){

            // dd($request->all());

            $data = array();
            $data['shipping_name'] = $request->shipping_name;
            $data['shipping_email'] = $request->shipping_email;
            $data['shipping_phone'] = $request->shipping_phone;
            $data['country'] = $request->country;
            $data['town'] = $request->town;
            $data['post_code'] = $request->post_code;
            $data['quarter'] = $request->quarter;
            $data['notes'] = $request->notes;
            $data['created_at'] = Carbon::now();
            $cartTotal = Cart::total();
            // Shipping::table('users')->insert($data);

            if($request->payment_method == 'stripe'){
                return view('frontend.pages.payment.stripe', compact('data','cartTotal'));
            }elseif($request->payment_method == 'cinetpay'){
                return view('frontend.pages.payment.cinetpay', compact('data','cartTotal'));
            }else{

              return response()->json(['error'=> 'At First Login Your Account']);

            }


        }
}
