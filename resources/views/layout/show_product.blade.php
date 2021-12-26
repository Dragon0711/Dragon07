<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/product_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/product_responsive.css') }}">


@extends('layout.navbar')


@section('navbar')


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
                            <form action="{{ url("product/add/cart/$product->id") }}" method="post">
                                @csrf
                                    <div class="col-lg-4">
                                    <!-- Product Quantity -->
                                        <div class="form-group">
                                            <div class="product_quantity clearfix">
                                                <span>Quantity: </span>
                                                <input id="quantity_input" type="text" pattern="[0-9]*" value="1" name="qty">
                                                <div class="quantity_buttons">
                                                    <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
                                                    <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
                                                </div>
                                            </div>
                                        </div>

                                                <style>
                                                    .form-control {
                                                        width: 110px !important;
                                                    }
                                                </style>
                                                <div class="row pt-2" style="width: 400px">
                                                    <div class="col-lg-3 mr-5">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect"><h5>Color</h5></label>
                                                        <select class="form-control input-group-lg color_list" id="exampleFormControlSelect" name="color" >
                                                            @foreach($color as $value)
                                                            <option value="{{ $value }}">{{ $value }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    </div>

                                                    <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect"><h5>Size</h5></label>
                                                            <select class="form-control input-group-lg" id="exampleFormControlSelect" name="size">
                                                                @foreach($size as $value)
                                                                <option value="{{ $value }}">{{ $value }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                            </div>

                                @if($product->discount_price == null)
                                    <div class="product_price">{{$product->price}}$</div>
                                @else
                                    <div class="product_price">{{ $product->discount_price }}$<span>{{$product->price}}$</span></div>
                                @endif

                                <div class="button_container">
                                    <button type="submit" class="button cart_button">Add to Cart</button>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                </div>
                            </form>

                        </div>
                    </div><br>
                    <!-- Go to www.addthis.com/dashboard to customize your tools -->
                    <div class="addthis_inline_share_toolbox" ></div>
                </div>

            </div>
        </div>
    </div>



        <!-- Face Book Comment -->
        <div class="container" style="margin-left: 85px">
            <h5 style="color: #2e9ad0">Add Your Comment ^-^</h5>
            <div class="fb-comments" data-href="{{Request::url()}}" data-width="" data-numposts="5"></div>
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



    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/ar_AR/sdk.js#xfbml=1&version=v12.0&appId=1653350134897164&autoLogAppEvents=1" nonce="z1rm5g2q"></script>

    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-61c89e3deee9dfbb"></script>


@endsection
