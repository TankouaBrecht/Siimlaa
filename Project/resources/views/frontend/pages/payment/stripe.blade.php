@extends('frontend.main_master')

@section('content')

@section('title')
MarketPlace | Checkout
@endsection
<script src="https://js.stripe.com/v3/"></script>
<style>
    /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
.StripeElement {
  box-sizing: border-box;
  height: 40px;
  padding: 10px 12px;
  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;
  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}
.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}
.StripeElement--invalid {
  border-color: #fa755a;
}
.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;}
</style>
    <!--=====================================
    Breadcrumb
    ======================================-->  
	
    <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Checkout
                </div>
            </div>
        </div>

    <!--=====================================
    Checkout
    ======================================--> 
    <div class="ps-checkout ps-section--shopping">

        <div class="container">

            <div class="ps-section__content">

                    <div class="row">

                        <div class="col-lg-6 ">

                            <div class="ps-form__billing-info">

                                <h3 class="ps-form__heading">Your Shopping Amount</h3><br>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group" >

                                        <div class="form-group__content">

                                           <p>Sub total : XAF <strong>{{$cartTotal}}</strong></p>

                                        </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">

                                        <div class="form-group__content">

                                           <p>Coupon Name : <strong>None</strong></p>

                                        </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">

                                        <div class="form-group__content">

                                        <p>Coupon Discount : <strong>0</strong>%</p>

                                        </div>

                                        </div>
                                    </div>
                                </div>
                                
                                <h1 class="text-center" style="font-size:20px ;">TOTAL : XAF <strong>{{$cartTotal}}</strong></h1>

                            </div>

                        </div>

                        <div class="col-lg-6">


                        <form action=" {{ route('user.stripe.order') }} " method="post" id="payment-form">
                            @csrf
                        <div class="form-row">
                          
                          <div class="form-group" style="width: 80% !important;">
                            <label for="card-element">
                            Credit or debit card
                            </label>                                                      
                            <input type="hidden" name="name" value="{{$data['shipping_name']}}">
                            <input type="hidden" name="email" value="{{$data['shipping_email']}}">
                            <input type="hidden" name="phone" value="{{$data['shipping_phone']}}">
                            <input type="hidden" name="country" value="{{$data['country']}}">
                            <input type="hidden" name="town" value="{{$data['town']}}">
                            <input type="hidden" name="quarter" value="{{$data['quarter']}}">
                            <input type="hidden" name="notes" value="{{$data['notes']}}">
                            <div id="card-element">

                            </div>
                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>
                        </div>
                        <br>
                        <button class="ps-btn ps-btn--fullwidth" style="width: 40% ;">Submit Payment</button>
                        </form>

                        </div>

                    </div>

            </div>

        </div>

    </div>

<script type="text/javascript">

var stripe = Stripe('pk_test_51LCoXfFtouspBq4Z5apgyEUcSX5LPg5yK3bgzT8A3eHcLqmyoveat7Euoztd1opYb5onNQBAj5vmW5OhFulVCfJz00aNX9zAEL');
var elements = stripe.elements();
// 
// Custom styling can be passed to options when creating an Element.
var style = {

    base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` .
card.mount('#card-element');

// Create a token or display an error when the form is submitted.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the customer that there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}

</script>
@endsection