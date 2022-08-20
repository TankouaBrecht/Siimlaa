<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Intervention\Image\Image;

class BrandController extends Controller
{
    /*===========================================
    BRAND PAGE VIEW PAGE
    ===========================================*/

    public function BrandView(){
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_view',compact('brands'));
    } //End Method

    /*===========================================
    ADD BRAND 
    ===========================================*/

    public function BrandStore(Request $request){
        $request->validate([
        'brand_name_fr'=>'required',
        // 'brand_image'=>'required',
        ],[
            'brand_name_fr'=>'input Brand french Name',
            // 'brand_image'=>'insert image',
        ]);

        if($request->file('brand_image')){

            $file = $request->file('brand_image');
            $filename = date('ymdhi').$file->getClientOriginalName();
            $file->move(public_path('upload/brands'),$filename);

            Brand::insert([
                'brand_name_fr'=>$request->brand_name_fr,
                'brand_slug_fr'=>strtolower(str_replace('','-',$request->brand_name_fr)),
                'brand_image'=>$filename,
            ]);

            $notification = array(
                'message' =>'Brand Inserted With Image Successfully',
                'alert-type'=>'success'
            );

        }else{

            Brand::insert([
                'brand_name_fr'=>$request->brand_name_fr,
                'brand_slug_fr'=>strtolower(str_replace('','-',$request->brand_name_fr)),
            ]);

            $notification = array(
                'message' =>'Brand Inserted Without Image Successfully',
                'alert-type'=>'success'
            );

        }

        return redirect()->back()->with($notification);
        
    } //End Method

    /*===========================================
    EDIT BRAND
    ===========================================*/

    public function BrandEdit($id){
        $brand = Brand::findOrFail($id);
        return view('backend.brand.brand_edit',compact('brand'));
    } //End Method

    public function BrandUpdate(Request $request){
        $brand_id = $request->id;
        $old_img = $request->old_image;

        if($request->file('brand_image')){

            @unlink('upload/brand/'.$old_img);

            $file = $request->file('brand_image');
            $filename = date('ymdhi').$file->getClientOriginalName();
            $file->move(public_path('upload/brand_images'),$filename);
        }

        Brand::findOrFail($brand_id)->update([
            'brand_slug_fr'=> strtolower(str_replace('','-',$request->brand_name_fr)),
            'brand_name_fr'=> $request->brand_name_fr,
            'brand_image'=> $filename,
        ]);

        $notification = array(
            'message' =>'Brand Updated',
            'alert-type'=>'info'
        );

        return redirect()->route('all.brand')->with($notification);

    } //End Method

    /*===========================================
    DELETE BRAND
    ===========================================*/

    public function BrandDelete($id){

        $brand = Brand::findOrFail($id);
        $image = $brand->brand_image;
        @unlink('upload/brand_images/'.$image);
        Brand::findOrFail($id)->delete();

        $notification = array(
            'message' =>'Brand DELETED',
            'alert-type'=>'success'
        );
        return redirect()->route('all.brand')->with($notification);

    } //End Method
 
}
