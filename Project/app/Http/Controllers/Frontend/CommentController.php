<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    
   public function AddComment(Request $request){

        if(Auth::check()){

            Review::insert([
                'user_id' => Auth::id(),
                'product_id' => $request->idProduct,
                'comment' => $request->comment,
                'created_at' => Carbon::now()
            ]);

            return response()->json(['success'=> 'Votre commentaire à bien été enregistré ']);

        }else{

            return response()->json(['error'=> 'First Login Your Account']);

        }

   }

    public function ReviewStore(Request $request){

        $product = $request->product_id;

        $request->validate([
            'comment' => 'required',
        ]);

        Review::insert([
            'product_id' => $product,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Review Will Approve By Admin',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    } // end mehtod 

}
