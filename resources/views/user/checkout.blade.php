@extends('layouts.user')
@section('content')
{{-- <script src="https://js.stripe.com/v3/"></script> --}}
<script src='https://js.stripe.com/v2/' type='text/javascript'></script>


 <!-- Breadcrumb Start -->
 <div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
            <li class="breadcrumb-item active">Checkout</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->
<?php 

$total = 0;
?>
 <!-- Checkout Start -->
 {{-- <form accept-charset="UTF-8" action="orderplace" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="pk_test_51IkQhPJYJ7e9EO5OlWIYVr0v6IERpJYLv0OHoqARLxAVy4JDZpmwXSdfmbZGmDfpye6LM5xpMZZJk12Ot6LGvs7200s93fRXWW" id="payment-form"  method="POST"><div style="margin:0;padding:0;display:inline"></div> --}}
  {{-- <form action="{{route('checkout.paypal')}}"   id="payment-form"  method="POST"><div style="margin:0;padding:0;display:inline"></div> --}}
 <form action="orderplace" method="POST" id="payment-form" data-cc-on-file="false" data-stripe-publishable-key="pk_test_51IkQhPJYJ7e9EO5OlWIYVr0v6IERpJYLv0OHoqARLxAVy4JDZpmwXSdfmbZGmDfpye6LM5xpMZZJk12Ot6LGvs7200s93fRXWW">
    @csrf
 <div class="checkout">
    <div class="container-fluid"> 
        <div class="row">
            <div class="col-lg-8">
                <div class="checkout-inner">
                    <div class="billing-address">
                        {{-- @if(Session::get('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{Session::get('status')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        @endif --}}

                        @if ((Session::has('success-message')))
                        <div class="alert alert-success col-md-12">{{
                        Session::get('success-message') }}</div>
                        @endif @if ((Session::has('fail-message')))
                        <div class="alert alert-dangeer col-md-12">{{
                          Session::get('fail-message') }}</div>
                          @endif

                        <h2>Shipping Address</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <label>First Name</label>
                                <input class="form-control" type="text" name="fname" placeholder="First Name">
                                @error('fname')
                                <p style="color:red">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>Last Name</label>
                                <input class="form-control" type="text" name="lname" placeholder="Last Name">
                                @error('lname')
                                <p style="color:red">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>E-mail</label>
                                <input class="form-control" type="text" name="email" placeholder="E-mail">
                                @error('email')
                                <p style="color:red">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>Mobile No</label>
                                <input class="form-control" type="text" name="phone" placeholder="Mobile No">
                                @error('phone')
                                <p style="color:red">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label>Address</label>
                                <input class="form-control" type="text" name="address" placeholder="Address">
                                @error('address')
                                <p style="color:red">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label>Country</label>
                                <select class="custom-select" name="country">
                                    <option selected>United States</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="India">India</option>
                                    <option value="Usa">USA</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>City</label>
                                <input class="form-control" type="text" name="city" placeholder="City">
                            </div>
                        
                           
                        </div>
                        
                    </div>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="checkout-inner">
                    <div class="checkout-summary">
                        <h1>Cart Total</h1>
                        @foreach($data as $item)
                        <p>{{$item->products->title}}<span>Rs. {{$item->price}}</span></p>
                        <?php 
                        $total += $item->price;
                        ?>
                        @endforeach
                       
                        <p class="sub-total">Sub Total<span>Rs. {{$total}}</span></p>
                        <p class="ship-cost">Shipping Cost<span>Rs. 100</span></p>
                        <h2>Grand Total<span>Rs. {{$total+100}}</span></h2>
                        <input type="hidden" name="total" value="{{$total+100}}">
                        
                    </div>

                    <div class="checkout-payment">
                        <div class="payment-methods">
                            <h1>Payment Methods</h1>
                            <div class="payment-method">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" value="Cash" id="payment-1" name="payment">
                                    <label class="custom-control-label" for="payment-1">Cash on Delievery</label>
                                </div>
                                <div class="payment-content" id="payment-1-show">
                                    <p>
                                        Pay with cash upon delievery.
                                    </p>
                                </div>
                                @error('payment')
                                <p style="color:red">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="payment-method">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" value="Online" id="payment-2" name="payment">
                                    <label class="custom-control-label" for="payment-2">Online Payment</label>
                                </div>
                                
                                <div class="payment-content" id="payment-2-show">
                                  
                                    <div class='form-row'>
                                        <div class='col-xs-12 form-group required'>
                                          <label class='control-label'>Name on Card</label>
                                          <input class='form-control' size='20' type='text'>
                                        </div>
                                      </div> 
                                      <div class='form-row'>
                                        <div class='col-xs-12 form-group required'>
                                          <label class='control-label'>Card Number</label>
                                          <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                                        </div>
                                      </div>
                                      <div class='form-row'>
                                        <div class='col-xs-4 form-group cvc required'>
                                          <label class='control-label'>CVC</label>
                                          <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='3' type='text'>
                                        </div>
                                        <div class='col-xs-4 form-group expiration required'>
                                          <label class='control-label'>Expiration</label>
                                          <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                                        </div>
                                        <div class='col-xs-4 form-group expiration required'>
                                          <label class='control-label'> </label>
                                          <input class='form-control card-expiry-year' placeholder='YYYY' size='2' type='text'>
                                        </div>
                                      </div>
                                      <div class='form-row'>
                                        <div class='col-md-12'>
                                          <div class='form-control total btn btn-info'>
                                            Total:
                                            <span class='amount'>$300</span>
                                          </div>
                                        </div>
                                      </div>
                                    
                                </div>
                            </div>
                            <div class="payment-method">
                              <div class="custom-control custom-radio">
                                  <input type="radio" class="custom-control-input" value="paypal" id="payment-3" name="payment">
                                  <label class="custom-control-label" for="payment-3">Paypal</label>
                              </div>
                              <div class="payment-content" id="payment-1-show">
                                  <p>
                                      Pay using paypal.
                                  </p>
                              </div>
                              @error('payment')
                              <p style="color:red">{{$message}}</p>
                              @enderror
                          </div>
                            
                         
                        </div>
                        <div class="checkout-btn">
                            <button type="submit" id="submit_button">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>




<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<script>
//  $(document).ready(function(){
//      if( document.getElementById("payment-2").checked = true)
//       {
//         var $form = $("#payment-form");

//   $form.on('submit', function(e) {
//     if (!$form.data('cc-on-file')) {
//       e.preventDefault();
//       Stripe.setPublishableKey($form.data('stripe-publishable-key'));
//       Stripe.createToken({
//         number: $('.card-number').val(),
//         cvc: $('.card-cvc').val(),
//         exp_month: $('.card-expiry-month').val(),
//         exp_year: $('.card-expiry-year').val()
//       }, stripeResponseHandler);
//     }
//   });
      
//   function stripeResponseHandler(status, response) {
//     if (response.error) {
//       $('.error')
//         .removeClass('hide')
//         .find('.alert')
//         .text(response.error.message);
//     } else {
//       // token contains id, last4, and card type
//       var token = response['id'];
//       // insert the token into the form so it gets submitted to the server
//       $form.find('input[type=text]').empty();
//       $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
//       $form.get(0).submit();
//     }
//   }
//       }
   
// });



// $('.payment').change(function(){
//   if($(this).val() == 'Online')
//   {
//     $(function() {
//   var $form = $("#payment-form");

//   $form.on('submit', function(e) {
//     if (!$form.data('cc-on-file')) {
//       e.preventDefault();
//       Stripe.setPublishableKey($form.data('stripe-publishable-key'));
//       Stripe.createToken({
//         number: $('.card-number').val(),
//         cvc: $('.card-cvc').val(),
//         exp_month: $('.card-expiry-month').val(),
//         exp_year: $('.card-expiry-year').val()
//       }, stripeResponseHandler);
//     }
//   });

//   function stripeResponseHandler(status, response) {
//     if (response.error) {
//       $('.error')
//         .removeClass('hide')
//         .find('.alert')
//         .text(response.error.message);
//     } else {
//       // token contains id, last4, and card type
//       var token = response['id'];
//       // insert the token into the form so it gets submitted to the server
//       $form.find('input[type=text]').empty();
//       $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
//       $form.get(0).submit();
//     }
//   }
// })
//   }
//   else
//   {
//     alert('Mobile is selected')
//   }
// });

$(document).ready(function(){
  $('#submit_button').click(function() {
   
if ($("#payment-2").is(':checked')) {
 
  var $form = $("#payment-form");

  $form.on('submit', function(e) {

    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  });

  function stripeResponseHandler(status, response) {
    if (response.error) {
      $('.error')
        .removeClass('hide')
        .find('.alert')
        .text(response.error.message);
    } else {
      // token contains id, last4, and card type
      var token = response['id'];
      // insert the token into the form so it gets submitted to the server
      $form.find('input[type=text]').empty();
      $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
      $form.get(0).submit();
    }
  }

}


  });
});


// $(function() {
//   var $form = $("#payment-form");

//   $form.on('submit', function(e) {

//     if (!$form.data('cc-on-file')) {
//       e.preventDefault();
//       Stripe.setPublishableKey($form.data('stripe-publishable-key'));
//       Stripe.createToken({
//         number: $('.card-number').val(),
//         cvc: $('.card-cvc').val(),
//         exp_month: $('.card-expiry-month').val(),
//         exp_year: $('.card-expiry-year').val()
//       }, stripeResponseHandler);
//     }
//   });

//   function stripeResponseHandler(status, response) {
//     if (response.error) {
//       $('.error')
//         .removeClass('hide')
//         .find('.alert')
//         .text(response.error.message);
//     } else {
//       // token contains id, last4, and card type
//       var token = response['id'];
//       // insert the token into the form so it gets submitted to the server
//       $form.find('input[type=text]').empty();
//       $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
//       $form.get(0).submit();
//     }
//   }
// });
</script>
@endsection