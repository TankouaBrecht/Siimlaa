<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Store;
use App\Models\SocialNetwork;
use Carbon\Carbon;
use App\Mail\ExpiryMail;
use Illuminate\Support\Facades\Mail;
use App\Models\MultiImg;
use App\Models\User;
use Image;

class StoreController extends Controller
{
    /*===========================================
    ADD STORE VIEW PAGE
    ===========================================*/

    public function ctrAddStoreView() {
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
		$brands = Brand::latest()->get();
        $users = User::latest()->get();
        return view('backend.store.store_add', compact('categories', 'brands', 'subcategories', 'users'));

    } //End Method

    /*===========================================
    VIEW ALL STORES VIEW PAGE
    ===========================================*/

    public function ctrViewAllStores() {

        $stores = Store::all();

        return view('backend.store.view_all_stores', compact('stores'));

    } //End Method

    /*===========================================
    STORE STORES TO THE DATABASE
    ===========================================*/

    public function ctrStoreStore(Request $request) {
     
        $image = $request->file('store_thambnail');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(300,300 )->save('upload/stores/thambnail/'.$name_gen);
    	$save_url = 'upload/stores/thambnail/'.$name_gen;

        $store_id = Store::insertGetId([
            'user_id' => $request->user_id,
            'store_name' => $request->store_name,
            'store_name_slug' => Str::slug($request->store_name),
            'store_adress' => $request->store_adress,
            'store_contact' => $request->store_contact,
            'store_email' => $request->store_email,
            'store_descp_en' => $request->store_descp_en,
            'store_descp_fr' => $request->store_descp_fr,
            'store_thambnail' => $save_url,
            'type' => $request->type,
            'status' => 1,
            'raiting' => 5,
            'created_at' => Carbon::now(),  
            'expiry_date' => Carbon::now()->addDay(31),	 
  
        ]);


        ////////// Add Multiples Specifications Start ///////////

        $count_spec_title = count($request->spec_title);

        if($count_spec_title != NULL){

            for($i = 0; $i < $count_spec_title; $i++) {

                SocialNetwork::insert([

                    'store_id' => $store_id,
                    'network_name' => $request->spec_title[$i],
                    'network_link' => $request->spec_desc[$i],
                    'created_at' => Carbon::now()

                ]);

            }
        }

        $notification = array(
			'message' => 'Store Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);


    } //End Method


    /*===========================================
    EDIT STORE VIEW PAGE
    ===========================================*/
    public function ctrEditStore($id){

		$categories = Category::latest()->get();
		$brands = Brand::latest()->get();
		$subcategory = SubCategory::latest()->get();
		$subsubcategory = SubSubCategory::latest()->get();
		$stores = Store::findOrFail($id);
		return view('backend.store.store_edit',compact('categories','brands','subcategory','subsubcategory','stores'));

	}

    /*===========================================
    DELETE STORES FROM DATABASE
    ===========================================*/

    public function ctrStoreDelete($store_id){
        $store = Store::findOrFail($store_id);
        unlink($store->store_thambnail);
        Store::findOrFail($store_id)->delete();


        $notification = array(
           'message' => 'Store Deleted Successfully',
           'alert-type' => 'success'
        );

       return redirect()->back()->with($notification);

    }// end method 
    
    /*===========================================
    ACTIVE Store  PRINCIPAL
    ===========================================*/

    public function ctrStoreActive($item_id) {

        Store::findOrFail($item_id)->update([
            'status' => 1,
            'created_at' => Carbon::now(),  
            'expiry_date' => Carbon::now()->addDay(31),	 
        ]);

        $notification = array(
            'message' =>'Store Active Successfully',
            'alert-type'=>'success'
        );
        
        return redirect()->back()->with($notification);


    } //End Method


    /*===========================================
    INACTIVE Store  PRINCIPAL
    ===========================================*/

    public function ctrStoreInactive($item_id) {

        Store::findOrFail($item_id)->update(['status' => 0]);

        $notification = array(
            'message' =>'Store Inactive Successfully',
            'alert-type'=>'error'
        );
        
        return redirect()->back()->with($notification);

    } //End Method

    /*===========================================
     STORE EXPIRY DATE VERIF
    ===========================================*/

    public function StoreExpiryVerif() {

        $items = Store::all();

        foreach($items as $item){
            $get_user = User::findOrFail($item->user_id);
            $user_name=$get_user->firstname;
            $user_email=$get_user->email;

            $created = Carbon::now();
            $expiry = $item->expiry_date;
            $diff = $expiry->diffIndays($created);
    
            if($diff == 0){
                Store::findOrFail($item->id)->update(['status' => 0]);
            }elseif($diff == 7){
                // envoie d'un mail pour prevenir l'utilisateur qu'il doit payer 
                $expiryInfo=[
                    'title' => 'MarketPlace',
                    'name' => $user_name,
                    'store' => $item->store_name,
                ];
                Mail::to("$user_email")->send(new ExpiryMail($expiryInfo));
            }

            $get_inactive_store = Store::where('status',0)->get();
            foreach($get_inactive_store as $i_store){
                Product::where('store_id',$i_store->id)->update(['status' => 1]);
            }
        }

        


    } //End Method
}
