@extends('layout.navbar')

@section('navbar')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/product_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/product_responsive.css') }}">



    <!-- Single Product -->

    <div class="single_product">
        <div class="container">
            <div class="row">

                <!-- Images -->
                <div class="col-lg-2 order-lg-1 order-2">
                    <ul class="image_list">
                        <li data-image="{{ asset("upload/product/$product->image_1") }}"><img src="{{ asset("upload/product/$product->image_1") }}" alt=""></li>
                        <li data-image="{{ asset("upload/product/$product->image_2") }}"><img src="{{ asset("upload/product/$product->image_2") }}" alt=""></li>
                        <li data-image="{{ asset("upload/product/$product->image_3") }}"><img src="{{ asset("upload/product/$product->image_3") }}" alt=""></li>
                    </ul>
                </div>

                <!-- Selected Image -->
                <div class="col-lg-5 order-lg-2 order-1">
                    <div class="image_selected"><img src="{{ asset("upload/product/$product->image_1") }}" alt=""></div>
                </div>

                <!-- Description -->
                <div class="col-lg-5 order-3">
                    <div class="product_description">
                        <div class="product_category">{{ $product->categoryT->name }} > {{ $product->subCat->name }}</div>
                        <div class="product_name">{{ $product->name }}</div>
                        <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                        <div class="product_text"><p>{{str_limit($product->desc , $limit = 700)  }}</p></div>
                        <div class="order_info d-flex flex-row">
                            <form action="#">
                                <div class="clearfix" style="z-index: 1000;">

                                    <!-- Product Quantity -->
                                    <div class="product_quantity clearfix">
                                        <span>Quantity: </span>
                                        <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
                                        <div class="quantity_buttons">
                                            <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
                                            <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
                                        </div>
                                    </div>

                                    <!-- Product Color -->
                                    <ul class="product_color">
                                        <li>
                                            <span>Color: </span>
                                            <div class="color_mark_container"><div id="selected_color" class="color_mark" style="background-color: rgb(0, 0, 0);"></div></div>
                                            <div class="color_dropdown_button"><i class="fas fa-chevron-down"></i></div>

                                            <ul class="color_list">
                                                <li><div class="color_mark" style="background: #999999;"></div></li>
                                                <li><div class="color_mark" style="background: #b19c83;"></div></li>
                                                <li><div class="color_mark" style="background: #000000;"></div></li>
                                            </ul>
                                        </li>
                                    </ul>

                                </div>
                                @if($product->discount_price == null)
                                    <div class="product_price">{{$product->price}}$</div>
                                @else
                                    <div class="product_price">{{ $product->discount_price }}$<span>{{$product->price}}$</span></div>
                                @endif

                                <div class="button_container">
                                    <button type="button" class="button cart_button">Add to Cart</button>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Recently Viewed -->

    <div class="viewed">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="viewed_title_container">
                        <h3 class="viewed_title">Recently Viewed</h3>
                        <div class="viewed_nav_container">
                            <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                            <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                        </div>
                    </div>

                    <div class="viewed_slider_container">

                        <!-- Recently Viewed Slider -->

                        <div class="owl-carousel owl-theme viewed_slider">
                            @foreach($recentView as $row)
                            <!-- Recently Viewed Item -->
                            <div class="owl-item">
                                <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="viewed_image"><img src="{{asset("upload/product/".$row->image_1)}}" alt="" style="height: 130px;"></div>
                                    <div class="viewed_content text-center">

                                        @if($row->discount_price == null)
                                            <div class="product_price discount">{{$row->price}}$</div>
                                        @else
                                            <div class="product_price discount">{{ $row->discount_price }}$<span>{{$row->price}}$</span></div>
                                        @endif
                                        <div class="viewed_name"><a href="{{ url("product/details/".$row->name.'/'.$row->id) }}">{{$row->name}}</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">Viewed</li>
                                    </ul>
                                </div>
                            </div>
                                @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection