<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use  App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\MultiImg;
use App\Mail\DeleteMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Specification;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{

    /*===========================================
    ADD PRODUCT VIEW PAGE
    ===========================================*/

    public function ctrAddProductView() {
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
		$brands = Brand::latest()->get();
        return view('backend.product.product_add', compact('categories', 'brands', 'subcategories'));

    } //End Method

    /*===========================================
    VIEW ALL PRODUCTS VIEW PAGE
    ===========================================*/

    public function ctrViewAllProducts() {

        $products = Product::all();

        return view('backend.product.view_all_products', compact('products'));

    } //End Method

    /*===========================================
    STORE PRODUCTS TO THE DATABASE
    ===========================================*/

    public function ctrStoreProduct(Request $request) {

        $image = $request->file('product_thambnail');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(300,300 )->save('upload/products/thambnail/'.$name_gen);
    	$save_url = 'upload/products/thambnail/'.$name_gen;

        $product_code = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 8);

        $product_id = Product::insertGetId([
            'brand_id' => 1,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name_fr' => $request->product_name_fr,
            'product_slug_fr' => Str::slug($request->product_name_fr),
            'product_code' => $product_code,
            'product_qty' => $request->product_qty,
            'product_tags_fr' => $request->product_tags_fr,
            'product_size_fr' => $request->product_size_fr,
            'product_color_fr' => $request->product_color_fr,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'long_descp_fr' => $request->long_descp_fr,
            'product_thambnail' => $save_url,
            'status' => 1,
            'stock' => 1,
            'created_at' => Carbon::now(),   	 
  
        ]);

        ////////// Multiple Image Upload Start ///////////

        $images = $request->file('multi_img');

        foreach ($images as $img) {

            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(300,300)->save('upload/products/multi-image/'.$make_name);
            $uploadPath = 'upload/products/multi-image/'.$make_name;

            MultiImg::insert([
                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(), 
            ]);
    
        }

        $notification = array(
			'message' => 'Product Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);


    } //End Method


    /*===========================================
    EDIT PRODUCT VIEW PAGE
    ===========================================*/
    public function ctrEditProduct($id){

		$categories = Category::latest()->get();
		$brands = Brand::latest()->get();
		$subcategory = SubCategory::latest()->get();
		$products = Product::findOrFail($id);
		return view('backend.product.product_edit',compact('categories','brands','subcategory','subsubcategory','products'));

	}

    /*===========================================
    DELETE PRODUCTS FROM DATABASE
    ===========================================*/

    public function ctrProductDelete($product_id){
        $product = Product::findOrFail($product_id);
        unlink($product->product_thambnail);
        Product::findOrFail($product_id)->delete();

        $images = MultiImg::where('product_id',$product_id)->get();
        foreach ($images as $img) {
            unlink($img->photo_name);
            MultiImg::where('product_id',$product_id)->delete();
        }

        $notification = array(
           'message' => 'Product Deleted Successfully',
           'alert-type' => 'success'
        );

        $delInfo=[
            'title' => 'PRODUCT DELETED',
            'name' => 'Kom Loic',
        ];
        Mail::to("komloic90@gmail.com")->send(new DeleteMail($delInfo));
       return redirect()->back()->with($notification);

    }// end method 
    /*===========================================
    ACTIVE Product  PRINCIPAL
    ===========================================*/

    public function ctrProductActive($item_id) {

        Product::findOrFail($item_id)->update(['status' => 1]);

        $notification = array(
            'message' =>'Product Active Successfully',
            'alert-type'=>'success'
        );
        
        return redirect()->back()->with($notification);


    } //End Method


    /*===========================================
    INACTIVE Product  PRINCIPAL
    ===========================================*/

    public function ctrProductInactive($item_id) {

        Product::findOrFail($item_id)->update(['status' => 0]);

        $notification = array(
            'message' =>'Product Inactive Successfully',
            'alert-type'=>'error'
        );
        
        return redirect()->back()->with($notification);

    } //End Method
}
