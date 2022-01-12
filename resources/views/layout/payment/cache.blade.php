
@extends('layout.navbar')

@section('navbar')
    <style>
        /**
       * The CSS shown here will not be introduced in the Quickstart guide, but shows
       * how you can use CSS to style your Element's container.
       */
        .StripeElement {
            box-sizing: border-box;

            height: 55px;
            width: 100%;

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
            background-color: #fefde5 !important;
        }

    </style>

    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_styles.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_responsive.css') }}">
    <script src="https://js.stripe.com/v3/"></script>
    <div class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 offset-lg-1" style="border: 1px solid grey; padding: 20px; border-radius: 25px;">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center"><h4> Caching Pay </h4></div><br><br>

                        <form action="{{ route('cache.charge') }}" method="post" id="payment-form">
                            @csrf
                            <div class="form-row">
                                <label for="card-element">

                                </label>
                                <br>

{{--                            <input type="hidden" name="shipping" value="{{ $charge }} ">--}}
{{--                            <input type="hidden" name="vat" value="{{ $vat }} ">--}}
                            <input type="hidden" name="total" value="{{ Cart::subtotal()  }} ">

                            <input type="hidden" name="ship_name" value="{{ $data['name'] }} ">
                            <input type="hidden" name="ship_phone" value="{{ $data['phone'] }} ">
                            <input type="hidden" name="ship_email" value="{{ $data['email'] }} ">
                            <input type="hidden" name="ship_address" value="{{ $data['address'] }} ">
                            <input type="hidden" name="ship_city" value="{{ $data['city'] }} ">
                            <input type="hidden" name="payment_type" value="{{ $data['payment'] }} ">

                            <button class="btn btn-info text-center" style="margin-left: 280px">Pay Now</button>
                        </form>

                    </div>

                </div>
            </div>
            <div class="panel" style="margin-top: 100px"></div>
        </div>


        <!-- Newsletter -->

        <div class="newsletter">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                            <div class="newsletter_title_container">
                                <div class="newsletter_icon"><img src="{{ asset('frontend/images/send.png')}}" alt=""></div>
                                <div class="newsletter_title">Sign up for Newsletter</div>
                                <div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div>
                            </div>
                            <div class="newsletter_content clearfix">
                                <form action="#" class="newsletter_form">
                                    <input type="email" class="newsletter_input" required="required" placeholder="Enter your email address">
                                    <button class="newsletter_button">Subscribe</button>
                                </form>
                                <div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">

            // Create a Stripe client.
            var stripe = Stripe('pk_test_51K4oh8HOkTRiT4zhP4aXo9sN2uAM1OrO3z9sJhY6jgOTcHYPpcTY8SQfURvgO3gxich5AJNnxJjyaxTazqMLAxWz00g9xabjj7');

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
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }


        </script>

@endsection

