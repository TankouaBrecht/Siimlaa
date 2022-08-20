<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use  App\Models\Service;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\MultiImg;
use App\Mail\DeleteMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Specification;
use Carbon\Carbon;
use Image;

class ServiceController extends Controller
{

    /*===========================================
    ADD Service VIEW PAGE
    ===========================================*/

    public function ctrAddserviceView() {
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
		$brands = Brand::latest()->get();
        return view('backend.service.service_add', compact('categories', 'brands', 'subcategories'));

    } //End Method

    /*===========================================
    VIEW ALL ServiceS VIEW PAGE
    ===========================================*/

    public function ctrViewAllServices() {

        $services = Service::all();

        return view('backend.service.view_all_services', compact('services'));

    } //End Method

    /*===========================================
    STORE ServiceS TO THE DATABASE
    ===========================================*/

    public function ctrStoreservice(Request $request) {

        $image = $request->file('service_thambnail');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(300,300 )->save('upload/services/thambnail/'.$name_gen);
    	$save_url = 'upload/services/thambnail/'.$name_gen;

        $service_code = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 8);

        $service_id = Service::insertGetId([
            'brand_id' => 1,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'service_name_fr' => $request->service_name_fr,
            'service_code' => $service_code,
            'service_slug_fr' => Str::slug($request->service_name_fr),
            'service_tags_fr' => $request->service_tags_fr,
            'selling_price' => $request->selling_price,
            'long_descp_fr' => $request->long_descp_fr,
            'service_thambnail' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now(),   	 
  
        ]);

        ////////// Multiple Image Upload Start ///////////

        // $images = $request->file('multi_img');

        // foreach ($images as $img) {

        //     $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        //     Image::make($img)->resize(300,300)->save('upload/services/multi-image/'.$make_name);
        //     $uploadPath = 'upload/services/multi-image/'.$make_name;

        //     MultiImg::insert([
        //         'service_id' => $service_id,
        //         'photo_name' => $uploadPath,
        //         'created_at' => Carbon::now(), 
        //     ]);
    
        // }

        $notification = array(
			'message' => 'Service Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);


    } //End Method


    /*===========================================
    EDIT Service VIEW PAGE
    ===========================================*/
    public function ctrEditservice($id){

		$categories = Category::latest()->get();
		$brands = Brand::latest()->get();
		$subcategory = SubCategory::latest()->get();
		$services = Service::findOrFail($id);
		return view('backend.service.service_edit',compact('categories','brands','subcategory','subsubcategory','services'));

	}

    /*===========================================
    DELETE ServiceS FROM DATABASE
    ===========================================*/

    public function ctrserviceDelete($service_id){
        $service = Service::findOrFail($service_id);
        unlink($service->service_thambnail);
        Service::findOrFail($service_id)->delete();

        $images = MultiImg::where('service_id',$service_id)->get();
        foreach ($images as $img) {
            unlink($img->photo_name);
            MultiImg::where('service_id',$service_id)->delete();
        }

        $notification = array(
           'message' => 'Service Deleted Successfully',
           'alert-type' => 'success'
        );

        $delInfo=[
            'title' => 'Service DELETED',
            'name' => 'Kom Loic',
        ];
       return redirect()->back()->with($notification);

    }// end method 
    /*===========================================
    ACTIVE Service  PRINCIPAL
    ===========================================*/

    public function ctrserviceActive($item_id) {

        Service::findOrFail($item_id)->update(['status' => 1]);

        $notification = array(
            'message' =>'Service Active Successfully',
            'alert-type'=>'success'
        );
        
        return redirect()->back()->with($notification);


    } //End Method


    /*===========================================
    INACTIVE Service  PRINCIPAL
    ===========================================*/

    public function ctrserviceInactive($item_id) {

        Service::findOrFail($item_id)->update(['status' => 0]);

        $notification = array(
            'message' =>'Service Inactive Successfully',
            'alert-type'=>'error'
        );
        
        return redirect()->back()->with($notification);

    } //End Method
}
