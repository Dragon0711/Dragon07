@extends('layout.navbar')


@section('navbar')



    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/shop_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/shop_responsive.css') }}">

    <!-- Home -->

    <div class="home">
        <div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('frontend/images/shop_background.jpg') }}"></div>
        <div class="home_overlay"></div>
        <div class="home_content d-flex flex-column align-items-center justify-content-center">
            <h2 class="home_title">{{ $catName->name }} </h2>
        </div>
    </div>

    <!-- Shop -->

    <div class="shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">

                    <!-- Shop Sidebar -->
                    <div class="shop_sidebar">
                        <div class="sidebar_section">
                            <div class="sidebar_title">Categories</div>
                            <ul class="sidebar_categories">
                                @foreach($cats as $cat)
                                    <li><a href="{{ url('show/cats/products/'.$cat->id) }}">{{$cat->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar_section filter_by_section">
                            <div class="sidebar_title">Filter By</div>
                            <div class="sidebar_subtitle">Price</div>
                            <div class="filter_price">
                                <div id="slider-range" class="slider_range"></div>
                                <p>Range: </p>
                                <p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
                            </div>
                        </div>

                        <div class="sidebar_section">
                            <div class="sidebar_subtitle brands_subtitle">Brands</div>
                            <ul class="brands_list">
                                @foreach($brandProduct as $row)
                                    <li class="brand"><a href="#">{{$row->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="col-lg-9">

                    <!-- Shop Content -->

                    <div class="shop_content">
                        <div class="shop_bar clearfix">
                            <div class="shop_product_count"><span>186</span> products found</div>
                            <div class="shop_sorting">
                                <span>Sort by:</span>
                                <ul>
                                    <li>
                                        <span class="sorting_text">highest rated<i class="fas fa-chevron-down"></span></i>
                                        <ul>
                                            <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
                                            <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
                                            <li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="product_grid row">
                            <div class="product_grid_border"></div>

                            <!-- Product Item -->
                            @foreach($catsProducts as $row)
                                <div class="product_item is_new">
                                    <div class="product_border"></div>
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{asset('upload/product/'.$row->image_1)}}" style="height: 125px; width: 115px;" alt=""></div>
                                    <div class="product_content">
                                        @if($row->discount_price  == null)
                                            <div class="product_price discount">{{ $row->price .'$' }}</div>
                                        @else
                                            <div class="product_price discount">{{ $row->discount_price .'$' }}<span>{{ $row->price .'$' }}</span></div>
                                        @endif
                                        <div class="product_name"><div><a href="{{ url("product/details/".$row->name.'/'.$row->id) }}" tabindex="0">{{$row->name}}</a></div></div>
                                    </div>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="product_marks">
                                        @if($row->discount_price == null)
                                            <li class="product_mark product_new" style="background: blue">new</li>
                                        @else
                                            <li class="product_mark product_new" style="background: red">
                                                @php
                                                    $mount = $row->price - $row->discount_price;
                                                    $discount = $mount/$row->price*100;
                                                @endphp
                                                {{intval($discount)}}%
                                            </li>
                                        @endif

                                    </ul>
                                </div>
                            @endforeach
                        </div>

                        <!-- Shop Page Navigation -->

                        <div class="shop_page_nav d-flex flex-row">
                            <div class="page_prev d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-left"></i></div>

                            {{ $catsProducts->links() }}

                            <div class="page_next d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-right"></i></div>
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

    <script src="{{ asset('frontend/plugins/parallax-js-master/parallax.min.js') }}"></script>
    <script src="{{ asset('frontend/js/shop_custom.js') }}"></script>

@endsection
