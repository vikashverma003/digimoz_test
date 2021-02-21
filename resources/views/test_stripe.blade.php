<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<style>
.StripeElement {
    box-sizing: border-box;
    height: 40px;
    padding: 10px 12px;
    border: 1px solid #e8e8e8;
    border-radius: 0;
    background-color: white;
    box-shadow: 0 3px 5px 0 #f1f1f1;
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
  background-color: #fefde5 !important;
}
form#payment-form {
    width: 100%;
    padding: 0 20px;
}
.book-event-page .inner-info-sec {
    padding: 10px 20px;
}
.book-event-page .card .btn-block{
    padding: 13px 2.4rem;
}
</style>

<?php
	//echo"<pre>"; print_r($dataUrl); die;
?>

  <!--Main layout-->
    <div class="container ">
      <div class="row">

		
		@if(session('success'))
			<span class="alert alert-success" role="alert">
				<strong>{{ session('success') }}</strong>
			</span>
		@endif
		 <div class='col-md-4'></div>
 <div class='col-md-4'>
		
        <!--Grid column-->
        <!-- <div class="col-md-6 mb-4"> -->
          <!--Card-->
		<script src="https://js.stripe.com/v3/"></script>
 <form class="form-horizontal" method="POST" id="payment-form" name="form1" role="form" action="{{route('addmoney.stripe', $team_id)}}">
		@csrf
				  <div class="card">
					<div class="card-body">
			    
					<div class="row">
						
					  
						<div class="col-lg-12 col-md-12 mb-2">
							<div class='col-xs-12 form-group card required'>
						 <label class='control-label'>Sponsor Name</label>
						 <input class='form-control business_name' placeholder='Sponsor Name(official)' size='20' type='text' name="business_name" value="" />

						 </div>
						 <div class='col-xs-12 form-group card required'>
						 <label class='control-label'>Name on Credit Card</label>
						 <input class='form-control business_name' placeholder='name on card'  type='text' name="name_on_card" required />

						 </div>
						 <div class='col-xs-12 form-group card required'>
						 <label class='control-label'>Billing Email Address</label>
						 <input class='form-control business_name' placeholder='Sponsor email(official)'  type='text' name="email" required />

						 </div>
						 

						 
						 <div class='col-xs-12 form-group card required'>
						 <label class='control-label'>Amount</label>
						 <input class='form-control' placeholder='amount' size='4' type='number' name="amount" required />

						 </div>
							
							  <div class="form-row">
								<label for="card-element">
								  Credit or debit card
								</label>
								<div id="card-element" style="width:100%;">
								  <!-- A Stripe Element will be inserted here. -->
								</div>

								<!-- Used to display form errors. -->
								<div id="card-errors" role="alert"></div>
							  </div>
							  

							  
						</div>
					</div>
				 <!-- <button class="submit_payment">Submit Payment</button> -->
				</form>
            <button class="btn btn-primary btn-lg btn-block trigger_payment" type="submit">Pay</button>
		</div>
				</div>
				
          </div>
          <!--/.Card-->

      
        <!--Grid column-->
 <!--Grid column-->
       
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </div>
  


  <script>
  // Create a Stripe client.
var stripe = Stripe('pk_test_51I3HHDJjnWbuZjcvoCnexmT74MBguUn60ultAmx261z4FuxCIDxjcnUnSZPffuelXG7BeFkEtzaJDB6Ub6Wo19Po00dFiM7GYJ');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
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

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
 // hiddenInput.setAttribute('name', 'cardnumber');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
  </script>
</body>
</html>