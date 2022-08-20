<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Cart;

class CartController extends Controller
{
   public function AddToCart(Request $request,$id){
       $product = product::findOrFail($id);

       if($product->discount_price == NULL){
        Cart::add(['id' => $id,
         'name' => $product->product_name_fr,
         'qty' => $request->quantity,
         'price' => $product->selling_price,
         'weight' => 1,
         'options' => [
             'image' => $product->product_thambnail,
             'color' => $request->color,
             'size' => $request->size,
          ]
        ]);
        return response()->json(['success'=> 'Le produit a ete ajouté au panier d achat']);

       }else{
        Cart::add(['id' => $id,
         'name' => $request->product_name,
         'qty' => $request->quantity,
         'price' => $product->discount_price,
         'weight' => 1,
         'options' => [
             'image' => $product->product_thambnail,
             'color' => $request->color,
             'size' => $request->size,
          ]
        ]);
        return response()->json(['success'=> 'Le produit a ete ajouté au panier d achat']);
        
       }

    }

    public function MiniCart(){

      $carts = Cart::content();
      $cartQty = Cart::count();
      $cartTotal = Cart::total();
      return response()->json(array(
        'carts' => $carts,
        'cartQty' => $cartQty,
        'cartTotal' => $cartTotal,
      ));

    }

    public function RemoveMiniCart($rowId){
       Cart::remove($rowId);
       return response()->json(['success' => 'Produit supprimé du panier d achat']);
    }

    public function CartView(){

      return view('frontend.pages.shop-cart.index'); 

  } //End Method

}
