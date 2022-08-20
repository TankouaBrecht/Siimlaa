@extends('frontend.main_master')

@section('content')

@section('title')
Shop-checkout
@endsection

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow">Home</a>
            <span></span> Shop
            <span></span> Checkout
        </div>
    </div>
</div>
<section class="mt-50 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-25">
                    <h4>Billing Details</h4>
                </div>
                <form action="{{route('checkout.store')}}" method="POST">
                    @csrf
                    <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <label>Full Name<sup>*</sup></label>

                                        <div class="form-group__content">

                                            <input class="form-control" type="text" name="shipping_name" value="{{Auth::user()->firstname}} {{Auth::user()->lastname}}">

                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">

                                        <label>Email Address<sup>*</sup></label>

                                        <div class="form-group__content">

                                            <input class="form-control" type="email" name="shipping_email" value="{{Auth::user()->email}}">

                                        </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Phone<sup>*</sup></label>

                                        <div class="form-group__content">

                                            <input class="form-control" type="text" name="shipping_phone" value="{{Auth::user()->phone}}">

                                        </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Code postal<sup>*</sup></label>

                                        <div class="form-group__content">

                                            <input class="form-control" type="text" name="post_code" >

                                        </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">

                                        <label>Country<sup>*</sup></label>

                                        <div class="form-group__content">

                                            <input class="form-control" type="text" name="country" value="Cameroon">

                                        </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    <div class="form-group">
                                    <label>Town<sup>*</sup></label>

                                    <div class="form-group__content">

                                        <input class="form-control" type="text" name="town">

                                    </div>

                                    </div>
                                    </div>
                                    <div class="col-md-4">
                                    <div class="form-group">
                                    <label>Quartier<sup>*</sup></label>

                                    <div class="form-group__content">

                                        <input class="form-control" type="text" name="quarter">

                                    </div>

                                    </div>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <label>Commentaire</label>

                                    <div class="form-group__content">

                                        <textarea class="form-control" rows="10" cols="10" name="notes" placeholder="Laisser un commentaire"></textarea>

                                    </div>

                                </div>
                
            </div>
            <div class="col-md-6">
                <div class="order_review">
                    <div class="mb-20">
                        <h4>Your Orders</h4>
                    </div>
                    <div class="table-responsive order_table text-center">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="3">Produit</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($carts as $cart)
                                <tr>
                                    <td class="image product-thumbnail"><img src="{{$cart->options->image}}" alt="#"></td>
                                    <td>
                                        <h5><a href="#">{{$cart->name}}</a></h5> <span class="product-qty">x {{$cart->qty}}</span>
                                    </td>
                                    <td><p>price : $<span>{{$cart->price}}</span></p></td>
                                    @php
                                    $sub=$cart->price*$cart->qty
                                    @endphp
                                    <td>${{$sub}}</td>
                                </tr>
                                @endforeach
                                <!-- <tr>
                                    <th>Shipping</th>
                                    <td colspan="2"><em>Free Shipping</em></td>
                                </tr> -->
                                <tr>
                                    <th>Total</th>
                                    <td colspan="2" class="product-subtotal"><span class="font-xl text-brand fw-900">${{$cartTotal}}</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                    <div class="payment_method">
                        <div class="mb-25">
                            <h5>Veuiller choisir la methode de Paiement</h5>
                        </div>
                        <div class="payment_option">
                            <div class="custome-radio">
                                <input class="form-check-input" required="" type="radio" name="payment_method" value="delivery" id="exampleRadios3" checked="">
                                <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse" data-target="#bankTranfer" aria-controls="bankTranfer">Payer à la Livraison </label>
                                <div class="form-group collapse in" id="bankTranfer">
                                    <p class="text-muted mt-5">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration. </p>
                                </div>
                            </div>
                            <div class="custome-radio">
                                <input class="form-check-input" required="" type="radio" name="payment_method"  value="stripe" id="exampleRadios4" checked="">
                                <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#checkPayment" aria-controls="checkPayment">Paiement par Carte Bancaire</label>
                                <div class="form-group collapse in" id="checkPayment">
                                    <p class="text-muted mt-5">Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode. </p>
                                </div>
                            </div>
                            <div class="custome-radio">
                                <input class="form-check-input" required="" type="radio" name="payment_method" value="paypal" id="exampleRadios5" checked="">
                                <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">Paypal</label>
                                <div class="form-group collapse in" id="paypal">
                                    <p class="text-muted mt-5">Pay via PayPal; you can pay with your credit card if you don't have a PayPal account.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-fill-out btn-block mt-30">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection