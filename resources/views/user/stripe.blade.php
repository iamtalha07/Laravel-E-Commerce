@extends('layouts.user')
@section('content')

<script src="https://js.stripe.com/v3/" type="text/javascript"></script></pre>

<?php

$stripe = new \Stripe\StripeClient(
  'sk_test_51IkQhPJYJ7e9EO5O63KucPqui6U8uhzdjOsrGTAKgIKYQhV9apDXwL424kIiLitwYLcgmxG02m6WUYMNtdIDUvri00RVrboyMV'
);
    $intent = $stripe->paymentIntents->retrieve(
  'pi_1IkR12JYJ7e9EO5OiMOFrDKy',
  []
);
   
?>


<form id="payment-form" data-secret="<?= $intent->client_secret ?> action="ok" method="POST">
    @csrf
    <div id="card-element">
      <!-- Elements will create input elements here -->
    </div>
  
    <!-- We'll put the error messages in this element -->
    <div id="card-errors" role="alert"></div>
  
    <button type="submit">Submit Payment</button>
  </form>

<script>
var stripe = Stripe('pk_test_51IkQhPJYJ7e9EO5OlWIYVr0v6IERpJYLv0OHoqARLxAVy4JDZpmwXSdfmbZGmDfpye6LM5xpMZZJk12Ot6LGvs7200s93fRXWW');
var elements = stripe.elements();

var elements = stripe.elements();
var style = {
  base: {
    color: "#32325d",
  }
};

var card = elements.create("card", { style: style });
card.mount("#card-element");

card.on('change', ({error}) => {
  let displayError = document.getElementById('card-errors');
  if (error) {
    displayError.textContent = error.message;
  } else {
    displayError.textContent = '';
  }
});


var form = document.getElementById('payment-form');

form.addEventListener('submit', function(ev) {
  ev.preventDefault();
  // If the client secret was rendered server-side as a data-secret attribute
  // on the <form> element, you can retrieve it here by calling `form.dataset.secret`
  stripe.confirmCardPayment(clientSecret, {
    payment_method: {
      card: card,
      billing_details: {
        name: 'Jenny Rosen'
      }
    }
  }).then(function(result) {
    if (result.error) {
      // Show error to your customer (e.g., insufficient funds)
      console.log(result.error.message);
    } else {
      // The payment has been processed!
      if (result.paymentIntent.status === 'succeeded') {
        // Show a success message to your customer
        // There's a risk of the customer closing the window before callback
        // execution. Set up a webhook or plugin to listen for the
        // payment_intent.succeeded event that handles any business critical
        // post-payment actions.
      }
    }
  });
});














// var stripe = Stripe('pk_test_51IkQhPJYJ7e9EO5OlWIYVr0v6IERpJYLv0OHoqARLxAVy4JDZpmwXSdfmbZGmDfpye6LM5xpMZZJk12Ot6LGvs7200s93fRXWW');
// var elements = stripe.elements();


// // Custom styling can be passed to options when creating an Element.
// var style = {
//   base: {
//     // Add your base input styles here. For example:
//     fontSize: '16px',
//     color: "#32325d",
//   }
// };

// // Create an instance of the card Element
// var card = elements.create('card', {style: style});

// // Add an instance of the card Element into the `card-element` <div>
// card.mount('#card-element');


// card.addEventListener('change', function(event) {
//   var displayError = document.getElementById('card-errors');
//   if (event.error) {
//     displayError.textContent = event.error.message;
//   } else {
//     displayError.textContent = '';
//   }
// });

// var form = document.getElementById('payment-form');
// form.addEventListener('submit', function(event) {
//   event.preventDefault();

//   stripe.createToken(card).then(function(result) {
//     if (result.error) {
//       // Inform the customer that there was an error
//       var errorElement = document.getElementById('card-errors');
//       errorElement.textContent = result.error.message;
//     } else {
//       // Send the token to your server
//       stripeTokenHandler(result.token);
//     }
//   });
// });


// function stripeTokenHandler(token) {
//   // Insert the token ID into the form so it gets submitted to the server
//   var form = document.getElementById('payment-form');
//   var hiddenInput = document.createElement('input');
//   hiddenInput.setAttribute('type', 'hidden');
//   hiddenInput.setAttribute('name', 'stripeToken');
//   hiddenInput.setAttribute('value', token.id);
//   form.appendChild(hiddenInput);

//   // Submit the form
//   form.submit();
// }
</script>

@endsection