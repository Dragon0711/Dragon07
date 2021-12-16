<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_responsive.css') }}">


@extends('layout.navbar')


@section('navbar')


    <!-- Cart -->

    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cart_container">
                        <div class="cart_title">Whish List</div>
                        <div class="cart_items">
                            <ul class="cart_list">
                                @foreach($wishproduct as $row)
                                    <li class="cart_item clearfix">
                                        <div class="cart_item_image text-center"><img src="{{ asset("upload/product/".$row->image_1)}}"  style="height: 125px"></div>
                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title">Name</div>
                                                <div class="cart_item_text">{{$row->name}}</div>
                                            </div>
                                            <div class="cart_item_color cart_info_col">
                                                <div class="cart_item_title">Color</div>
                                                <div class="cart_item_text">{{ $row->color }}</div>
                                            </div>
                                            <div class="cart_item_color cart_info_col">
                                                <div class="cart_item_title">Size</div>
                                                <div class="cart_item_text">{{ $row->size }}</div>
                                            </div>
                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title">Price</div>
                                                <div class="cart_item_text">{{$row->price}}$</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Add to Cart</div>
                                                <a class="btn btn-primary mt-4" href="{{ url("add/cart/".$row->id) }}">Add !</a>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Remove</div>
                                                <div class="cart_item_text"><a href="{{ url("wishlist/delete/".$row->id) }}"> <i class="fa fa-trash"></i></a></div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
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

    <script src="{{ asset('frontend/js/cart_custom.js') }}"></script>

@endsection
