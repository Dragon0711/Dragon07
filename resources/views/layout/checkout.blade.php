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
                        <div class="cart_title">check Out</div>
                        <div class="cart_items">
                            <ul class="cart_list">
                                @foreach($content as $row)
                                    <li class="cart_item clearfix">
                                        <div class="cart_item_image text-center"><img src="{{ asset("upload/product/".$row->options->image)}}"  style="height: 125px"></div>
                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title">Name</div>
                                                <div class="cart_item_text">{{$row->name}}</div>
                                            </div>
                                            <div class="cart_item_color cart_info_col">
                                                <div class="cart_item_title">Color</div>
                                                <div class="cart_item_text">{{ $row->options->color }}</div>
                                            </div>
                                            <div class="cart_item_color cart_info_col">
                                                <div class="cart_item_title">Size</div>
                                                <div class="cart_item_text">{{ $row->options->size }}</div>
                                            </div>
                                            <div class="cart_item_quantity cart_info_col">
                                                <div class="cart_item_title">Quantity</div><br>
                                                <style>
                                                    input {
                                                        position: absolute;
                                                        left: 10px;
                                                        top: 58px;
                                                        width: 55px;
                                                        height: 20px;
                                                        padding: 0px;
                                                        font-size: 14pt;
                                                        border: solid 0.5px #000;
                                                        z-index: 1;
                                                    }

                                                    .spinner-button {
                                                        position: absolute;
                                                        cursor: default;
                                                        z-index: 2;
                                                        background-color: #ccc;
                                                        width: 14.5px;
                                                        text-align: center;
                                                        margin: 0px;
                                                        pointer-events: none;
                                                        height: 10px;
                                                        line-height: 10px;
                                                    }

                                                    #inc-button {
                                                        left: 50px;
                                                        top: 56px;
                                                    }

                                                    #dec-button {
                                                        left: 50px;
                                                        top: 68px;
                                                    }
                                                </style>
                                                <form method="post" action="{{ url("update/qyt/cart/") }}">
                                                    @csrf
                                                    <input type="hidden"  name="productId" value="{{$row->rowId}}">
                                                    <input type="number" name="qty" value="{{$row->qty}}" min="0" max="100"/>
                                                    <div id="inc-button" class="spinner-button">+</div>
                                                    <div id="dec-button" class="spinner-button">-</div><br>
                                                    <button type="submit" style="margin: -7px 0 0 70px" class="btn btn-success btn-sm"><i class="fas fa-check-square"></i></button>

                                                </form>
                                                {{--                                            <div class="cart_item_text">{{$row->qty}}</div>--}}
                                            </div>
                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title">Price</div>
                                                <div class="cart_item_text">{{$row->price}}$</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Total</div>
                                                <div class="cart_item_text">{{$row->price*$row->qty}}$</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Remove</div>
                                                <div class="cart_item_text"><a href="{{ url("delete/from/cart/".$row->rowId) }}"> <i class="fa fa-trash"></i></a></div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                            <div class="container mt-3">
                                <div class="row">
                                    <div class="col-md">

                                    <form action="{{ url('apply/coupon') }}"  method="post">
                                            @csrf
                                            <h5>Enter coupon number </h5>
                                            <input class="form-control col-lg-6" style="height: 50px" type="text" name="coupon" placeholder="inter your coupon number"><br><br><br><br>
                                            <button type="submit" class="btn btn-primary">Continue</button>
                                        </form>

                                    </div>
                                    <div class="col-md">
                                        <h5>Details </h5>
                                        <ul class="list-group">
                                            <li class="list-group-item">Total Price:<span style="float: right">${{ Cart::subtotal() }}</span></li>
                                            @if(\Illuminate\Support\Facades\Session::has('coupon'))
                                                <li class="list-group-item">Coupon:({{ \Illuminate\Support\Facades\Session::get('coupon')['name'] }})<span style="float: right">${{ \Illuminate\Support\Facades\Session::get('coupon')['discount'] }}</span></li>

                                                <li class="list-group-item">Price after discount:<span style="float: right">${{ \Illuminate\Support\Facades\Session::get('coupon')['balance'] }}</span></li>
                                            @else
                                                @endif
                                            <li class="list-group-item">shipping:<span style="float: right">Free</span></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <a href="{{route('Payment.Page')}}" class="btn-lg btn-dark" style="float: right; margin-right:225px;margin-top: 50px  ">continue Pay</a>

        <div class="panel" style="margin-top: 100px"></div>
    </div>

    <!-- Newsletter -->


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
