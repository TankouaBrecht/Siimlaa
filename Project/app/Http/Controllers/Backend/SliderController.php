<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use  App\Models\Slider;
use  App\Models\BeautySlider;
use Carbon\Carbon;
use Image;


class SliderController extends Controller
{
    /*===========================================
    SLIDER PRINCIPAL VIEW PAGE
    ===========================================*/

    public function ctrSliderPrincipalView() {

        $sliders = Slider::latest()->get();

        return view('backend.slider.principal.slider_principal_view', compact('sliders'));

    } //End Method


    /*===========================================
    STORE SLIDER PRINCIPAL
    ===========================================*/

    public function ctrSliderStore(Request $request) {

        $request->validate([
            'slider_main_title_fr'=>'required',
            'slider_secondary_title_fr'=>'required',
            'slider_action_title_fr'=>'required',
            'slider_image'=>'required',
           ],[

            'slider_main_title_fr.required'=>'SVP veuillez insérer le titre principal en francais',
            'slider_secondary_title_fr.required'=>'SVP veuillez insérer le titre sécondaire en francais',
            'slider_action_title_fr.required'=>"SVP veuillez insérer le titre de l'action en francais",
            'slider_image.required'=>'Une Image est requise pour cette glissière(Slider)',
        ]);
       
        $store_slider = new Slider();
        $store_slider->slider_offer_title_fr = $request->slider_offer_title_fr;
        $store_slider->slider_main_title_fr = $request->slider_main_title_fr;
        $store_slider->slider_secondary_title_fr = $request->slider_secondary_title_fr;
        $store_slider->slider_action_title_fr = $request->slider_action_title_fr;
        $store_slider->slider_desc_fr = $request->slider_desc_fr;
        $store_slider->slider_slug_fr = Str::slug($request->slider_main_title_fr);
        $store_slider->discount_price = $request->discount_price;

        if($request->file('slider_image')){

            $image = $request->file('slider_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(728,954)->save('upload/sliders/'.$name_gen);
            $save_url = 'upload/sliders/'.$name_gen;
            $store_slider['slider_image'] = $save_url;

        }

        $store_slider->save();

        $notification = array(
            'message' =>'Slider Inserted Successfully',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($notification);

    } //End Method


    /*===========================================
    EDIT SLIDER PRINCIPAL
    ===========================================*/

    public function ctrSliderEdit($slider_id) {

        $slider = Slider::findOrFail($slider_id);
        
        return view('backend.slider.principal.slider_principal_edit', compact('slider'));

    } //End Method


    /*===========================================
    UPDATE SLIDER PRINCIPAL
    ===========================================*/

    public function ctrSliderUpdate(Request $request) {

        $slider_id = $request->id;
        $old_img = $request->old_img;

        $update_slider = Slider::findOrFail($slider_id);
        $update_slider->slider_offer_title_fr = $request->slider_offer_title_fr;
        $update_slider->slider_main_title_fr = $request->slider_main_title_fr;
        $update_slider->slider_secondary_title_fr = $request->slider_secondary_title_fr;
        $update_slider->slider_action_title_fr = $request->slider_action_title_fr;
        $update_slider->slider_desc_fr = $request->slider_desc_fr;
        $update_slider->slider_slug_fr = Str::slug($request->slider_main_title_fr);
        $update_slider->discount_price = $request->discount_price;
        $update_slider->updated_at = Carbon::now();

        if($request->file('slider_image')){

            @unlink($old_img);

            $image = $request->file('slider_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,358)->save('upload/sliders/'.$name_gen);
            $save_url = 'upload/sliders/'.$name_gen;
            $update_slider['slider_image'] = $save_url;

        }

        $update_slider->save();

        $notification = array(
            'message' =>'Slider mis à jour avec succès',
            'alert-type'=>'info'
        );
        
        return redirect()->route('principal.slider.view')->with($notification);

    } //End Method

    /*===========================================
    DELETE SLIDER PRINCIPAL
    ===========================================*/

    public function ctrSliderDelete($slider_id) {

        $slider = Slider::findOrFail($slider_id);
        $slider_image = $slider->slider_image;

        @unlink($slider_image);

        $slider->delete();

        $notification = array(
            'message' =>'Slider supprimé avec succès',
            'alert-type'=>'success'
        );
        
        return redirect()->back()->with($notification);

    } //End Method

    /*===========================================
    ACTIVE SLIDER PRINCIPAL
    ===========================================*/

    public function SliderActive($slider_id) {

        $active_slider = Slider::findOrFail($slider_id);

        Slider::findOrFail($slider_id)->update(['status' => 1]);

        $notification = array(
            'message' =>'Slider activé avec succès',
            'alert-type'=>'success'
        );
        
        return redirect()->back()->with($notification);


    } //End Method


    /*===========================================
    INACTIVE SLIDER PRINCIPAL
    ===========================================*/

    public function SliderInactive($slider_id) {

        $inactive_slider = Slider::findOrFail($slider_id);

        Slider::findOrFail($slider_id)->update(['status' => 0]);

        $notification = array(
            'message' =>'Slider désactivé avec succès',
            'alert-type'=>'error'
        );
        
        return redirect()->back()->with($notification);

    } //End Method

}
