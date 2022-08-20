<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Commandproduct;
use App\Models\Commandservice;
use App\Models\Product;
use App\Models\Service;
use App\Models\Store;
use App\Mail\CommandMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;

class CommandController extends Controller
{
    public function AddToCommandproduct($product_id){

        if(Auth::check()){
            $exists = Commandproduct::where('user_id',Auth::id())->where('product_id',$product_id)->first();

            if(!$exists){
                Commandproduct::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'store_id' => 1,
                    'created_at' => Carbon::now()
                ]);
                return response()->json(['success'=> 'Votre commande a ete enregistrée']);
           }else{
            return response()->json(['error'=> 'Ce produit existe deja dans la liste de vos commandes']);
           }
        }else{
            return response()->json(['error'=> 'Veuillez vous connecter ou crée un compte']);
        }

    }

    public function AddToCommandservice($service_id){

        if(Auth::check()){
            $exists = Commandservice::where('user_id',Auth::id())->where('service_id',$service_id)->first();

            $get_service = Service::where('id',$service_id)->get();

            foreach($get_service as $row){
               $s_title = $row->service_name_fr;
            }

            if(!$exists){
                Commandservice::insert([
                    'user_id' => Auth::id(),
                    'service_id' => $service_id,
                    'store_id' => 1,
                    'created_at' => Carbon::now()
                ]);
      
                $commandInfo=[
                    'title' => 'Coiffure',
                    'name' => Auth::firstname(),
                    'phone' => Auth::phone(),
                    'email' => Auth::email(),
                    'command_name'=> $s_title,
                ];
                Mail::to("brtankoua@gmail.com")->send(new CommandMail($commandInfo));

                return response()->json(['success'=> 'Votre commande a ete enregistrée']);
           }else{
            return response()->json(['error'=> ' Ce service existe deja dans la liste de vos commandes']);
           }
        }else{
            return response()->json(['error'=> 'Veuillez vous connecter ou crée un compte']);
        }

    }
}
