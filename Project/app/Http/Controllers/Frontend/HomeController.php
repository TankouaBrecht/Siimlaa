<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\service;

class HomeController extends Controller
{

    /*===========================================
    HOME PAGE VIEW PAGE
    ===========================================*/
    public function index(){

        // return view('frontend.pages.home.index'); 
        return view('frontend.pages.home.index'); 

    } //End Method

    /*===========================================
    PRODUCT DETAILS VIEW PAGE
    ===========================================*/
    public function ProductDetails($id,$slug){
        $product = Product::findOrfail($id);
        // color & size English
        $color_fr = $product->product_color_fr;
        $product_color_fr = explode(',', $color_fr);
        $size_fr = $product->product_size_fr;
        $product_size_fr = explode(',', $size_fr);

        // color & size French
        $color_fr = $product->product_color_fr;
        $product_color_fr = explode(',', $color_fr);
        $size_fr = $product->product_size_fr;
        $product_size_fr = explode(',', $size_fr);
        return view('frontend.pages.shop-product-detail.index',compact('product','product_size_fr','product_color_fr'));

    }

        /*===========================================
    PRODUCT DETAILS VIEW PAGE
    ===========================================*/
    public function serviceDetails($id,$slug){
        $service = service::findOrfail($id);

        return view('frontend.pages.shop-service-detail.index',compact('service'));

    }

    /*===========================================
    CATEGORIES DETAILS VIEW PAGE
    ===========================================*/
    public function ProductCategories($id,$slug){

        $products = Product::where('category_id',$id)->get();
        if(count($products) >0 ){
            return view('frontend.pages.shop-product-detail.index',compact('products'));
        }else{
            return view('errors.404');
        }

    }
    
    /*===========================================
    SUBCATEGORIES DETAILS VIEW PAGE
    ===========================================*/
    public function ProductSubSubCategories($id,$slug){
        $products = Product::where('subsubcategory_id',$id)->get();
        return view('frontend.pages.products.product_subcategories',compact('products'));

    }

    /*===========================================
    AJAX PRODUCT VIEW PAGE
    ===========================================*/
    public function ProductViewAjax($id ){
        $product = Product::with('category','brand')->findOrfail($id);
        $color = $product->product_color_fr;
        $product_color = explode(',', $color);

        $size = $product->product_size_fr;
        $product_size = explode(',', $size);
        return response()->json(array(
         'product' => $product,
         'color' => $product_color,
         'size' => $product_size,
        ));

    }

    /*===========================================
    AJAX PRODUCT SEARCH SCRIPT
    ===========================================*/ 
	public function ProductSearch(Request $request){

		$item = $request->search;

        $categories = Category::orderBy('category_name_fr', 'ASC')->get();
		$products = Product::where('product_name_fr','LIKE',"%$item%")->paginate(6)->withQueryString();
		return view('frontend.pages.product.search',compact('products', 'categories'));

	}
    
}
