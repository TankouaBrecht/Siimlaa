<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\AdminOrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;
use Cart;

class StripeController extends Controller
{
    //
    public function StripeOrder(Request $request){

        $total_amount = round(Cart::total());

        // See your keys here: https://dashboard.stripe.com/apikeys
        \Stripe\Stripe::setApiKey('sk_test_51LCoXfFtouspBq4ZbYM7Cjop9BMdcw8juujHzTCobbMcJnhFUT163xbNcTxFDESR3QXxEh4SSBe6Hq5dnE2jnxBi000dmpNmoS');

        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
        'amount' => $total_amount*100,
        'currency' => 'usd',
        'description' => 'Example charge',
        'source' => $token,
        'metadata' => ['order_id' => uniqid()],
        ]);

        // dd($charge);

        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'coutry' => $request->country,
            'town' => $request->town,
            'quarter' => $request->quarter,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'post_code' => 237,
            'notes' => $request->notes,
            'payment_type' => 'Stripe',
            'payment_method' => 'Stripe',
            'payment_type' => $charge->payment_method,
            'transaction_id' => $charge->balance_transaction,
            'currency' => $charge->currency,
            'amount' => $total_amount,
            'order_number' => $charge->metadata->order_id,
   
            'invoice_no' => 'EOS'.mt_rand(10000000,99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'Pending',
            'created_at' => Carbon::now(),

        ]); 

        $carts = Cart::content();
        foreach ($carts as $cart) {
            OrderItem::insert([
                'order_id' => $order_id, 
                'product_id' => $cart->id,
                'color' => $cart->options->color,
                'size' => $cart->options->size,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' => Carbon::now(),
            ]);
        }

        Cart::destroy();

        // Send Mail to User
        $invoice = Order::findOrFail($order_id);
        $OrderInfo=[
            'invoice_no' => $invoice->invoice_no,
            'amount' => $total_amount,
            'name' => $invoice->name,
            'email' => $invoice->email,
        ];
        Mail::to("$invoice->email")->send(new OrderMail($OrderInfo));

        // Send Mail to Admin
        $order_admin_Info=[
            'order_id' => $order_id, 
            'invoice_no' => $invoice->invoice_no,
            'amount' => $total_amount,
            'name' => $invoice->name,
            'email' => $invoice->email,
        ];
        Mail::to("brtankoua@gmail.com")->send(new AdminOrderMail($order_admin_Info));

        $notification = array(
               'message' => 'Your Order Place Successfully',
               'alert-type' => 'success'
           );
   
           return redirect('/')->with($notification);
    }
}
