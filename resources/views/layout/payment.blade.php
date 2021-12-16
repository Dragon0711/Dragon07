
@extends('layout.navbar')

@section('navbar')


    <div class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 offset-lg-1" style="border: 1px solid grey; padding: 20px; border-radius: 25px;">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center"><h2> Your Information </h2></div>


                        <form action="{{ route('payment.process') }}" id="contact_form" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputEmail1">Full Name</label>
                                <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Your Full Name " name="name" required="">
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone Number</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value=""  aria-describedby="emailHelp" placeholder="Enter Your Phone Number" required="">
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value=""  aria-describedby="emailHelp" placeholder="Enter Your Email " >
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value=""  aria-describedby="emailHelp" placeholder="Enter Your Email " required="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">City</label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" value=""  aria-describedby="emailHelp" placeholder="Enter Your Email " required="">
                            </div>

                            <div class="form-group"><h4> Choose Payment Method</h4>
                                <ul>
                                    <div class="row px-2">
                                    <li class="mr-5"><input type="radio"  name="payment" value="visa"><img src="{{asset('frontend/images/mastercard.png')}}" style="width: 80px; height:50px" > </li>
                                    <li class="mr-5"><input type="radio" name="payment" value="paypal"><img src="{{asset('frontend/images/paypal.png')}}" style="width: 80px; height:50px" > </li>
                                    <li><input type="radio" name="payment" value="molie"><img src="{{asset('frontend/images/mollie.png')}}" style="width: 80px; height:50px" > </li>
                                    </div>
                                </ul>
                            </div>


                            <div class="contact_form_button text-center">
                                <button type="submit" class="btn btn-dark">Continue</button>
                            </div>
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

@endsection

