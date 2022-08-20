<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function AddToWishlist(Request $request, $product_id){

        if(Auth::check()){
            $exists = wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();
            if(!$exists){
                wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now()
                ]);
                return response()->json(['success'=> 'Successfully Added On Your Wishlist']);
           }else{
            return response()->json(['error'=> 'product already exist On Your Wishlist']);
           }
        }else{
            return response()->json(['error'=> 'First Login Your Account']);
        }

    }

    public function wishlistView(){
        return view('frontend.pages.shop-wishlist.index');
    }

    public function GetWishlistProduct(){
        $wishlist = wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
        return response()->json($wishlist);
    }

    public function GetWishlistcount(){
        $wishlist = wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
        
        if(empty($wishlist)){
            $wish_count = '0';
        }else{
            $wish_count = count($wishlist);
        }
        return response()->json($wish_count);
    }

    public function DeleteWishlistProduct($rowId){
        wishlist::findOrFail($rowId)->delete();
        
        return response()->json(['success' => 'Product Remove from wishlist']);
    }
}
