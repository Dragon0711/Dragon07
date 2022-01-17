@extends('layout.navbar')

@section('navbar')
<div class="row col-lg-8" style="margin:35px">

 <div class="mb-4 text-sm text-gray-600">
    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
</div>

@if (session('status') == 'verification-link-sent')
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
    </div>
@endif

<div class="mt-4 flex items-center justify-between">
    <form method="POST" action="{{ route('verification.send') }}">
        @csrf

        <div>
            <button type="submit" class="btn btn-primary">
                {{ ('Resend Verification Email') }}
            </button>
        </div>
    </form><br>

    <form method="POST" action="{{ route('user.logout') }}">
        @csrf

        <button type="submit" class="btn btn-danger">
            {{ ('Log Out') }}
        </button>
    </form>
</div>
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
