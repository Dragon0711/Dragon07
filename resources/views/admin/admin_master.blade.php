<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Dev-Desha- Admin DashBoard</title>

    <!-- vendor css -->
    <link href="{{ asset('adminbackend/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('adminbackend/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('adminbackend/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('adminbackend/lib/rickshaw/rickshaw.min.css') }}" rel="stylesheet">
    <link href="{{ asset('adminbackend/lib/summernote/summernote-bs4.css') }}" rel="stylesheet">

    <!-- Tags Input CDN CSS -->
    <link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>


    <!-- Table Css -->
    <link href="{{ asset('adminbackend/lib/highlightjs/github.css') }}" rel="stylesheet">
    <link href="{{ asset('adminbackend/lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
    <link href="{{ asset('adminbackend/lib/select2/css/select2.min.css') }}" rel="stylesheet">

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('adminbackend/css/starlight.css') }}">


    {{--For Tostar--}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

</head>

<body>

<!-- ########## START: LEFT PANEL ########## -->
<div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> starlight</a></div>
<div class="sl-sideleft">
    <div class="input-group input-group-search">
        <input type="search" name="search" class="form-control" placeholder="Search">
        <span class="input-group-btn">
          <button class="btn"><i class="fa fa-search"></i></button>
        </span><!-- input-group-btn -->
    </div><!-- input-group -->

    <label class="sidebar-label">Control Menu</label>
    <div class="sl-sideleft-menu">
        <a href="{{ route('admin.dashboard') }}" class="sl-menu-link active">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Dashboard</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->

        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
                <span class="menu-item-label">Category</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('categories') }}" class="nav-link">Category</a></li>
            <li class="nav-item"><a href="{{ route('SubCat') }}" class="nav-link">Sub Category</a></li>
            <li class="nav-item"><a href="{{ route('brands') }}" class="nav-link">Brand</a></li>
        </ul>
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                <span class="menu-item-label">Coupons</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('coupon') }}" class="nav-link">Coupon</a></li>
        </ul>
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-filing-outline tx-24"></i>
                <span class="menu-item-label">NewsLaters</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('all.NewsLaters') }}" class="nav-link">NewsLaters</a></li>

        </ul>
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                <span class="menu-item-label">Products</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('all.products') }}" class="nav-link">All Products</a></li>
            <li class="nav-item"><a href="{{ route('create.product') }}" class="nav-link">Create</a></li>
        </ul>
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-bookmarks-outline tx-20"></i>
                <span class="menu-item-label">Orders</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('showNewOrder') }}" class="nav-link">All Orders</a></li>
            <li class="nav-item"><a href="{{ route('acceptPayment') }}" class="nav-link">Accept Payment</a></li>
            <li class="nav-item"><a href="{{ route('ordersCanceled') }}" class="nav-link">Orders Cancel</a></li>
            <li class="nav-item"><a href="{{ route('progressDelivery') }}" class="nav-link">Process Delivery</a></li>
            <li class="nav-item"><a href="{{ route('successDelivery') }}" class="nav-link">Success Delivery</a></li>
        </ul>


        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
                <span class="menu-item-label">Returned Orders</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('returned.order') }}" class="nav-link">All Orders</a></li>
        </ul>

        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
                <span class="menu-item-label">Reports</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('orders.report') }}" class="nav-link">Reports Search</a></li>
        </ul>

        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                <span class="menu-item-label">Admins Roles</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{ route('all.admins') }}" class="nav-link">All admins</a></li>
            <li class="nav-item"><a href="{{ route('add.admin') }}" class="nav-link">Add Admin</a></li>
        </ul>

        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-navigate-outline tx-24"></i>
                <span class="menu-item-label">Maps</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="map-google.html" class="nav-link">Google Maps</a></li>
            <li class="nav-item"><a href="map-vector.html" class="nav-link">Vector Maps</a></li>
        </ul>
        <a href="mailbox.html" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-email-outline tx-24"></i>
                <span class="menu-item-label">Mailbox</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-paper-outline tx-22"></i>
                <span class="menu-item-label">Pages</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="blank.html" class="nav-link">Blank Page</a></li>
            <li class="nav-item"><a href="page-signin.html" class="nav-link">Signin Page</a></li>
            <li class="nav-item"><a href="page-signup.html" class="nav-link">Signup Page</a></li>
            <li class="nav-item"><a href="page-notfound.html" class="nav-link">404 Page Not Found</a></li>
        </ul>
    </div><!-- sl-sideleft-menu -->

    <br>
</div><!-- sl-sideleft -->
<!-- ########## END: LEFT PANEL ########## -->

<!-- ########## START: HEAD PANEL ########## -->
<div class="sl-header">
    <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
    </div><!-- sl-header-left -->
    <div class="sl-header-right">
        <nav class="nav">
            <div class="dropdown">
                <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                    <span class="logged-name"><span class="hidden-md-down"> {{ Auth::user()->name }} </span>
                    <img src="{{ asset('upload/admin_images/'.Auth::user()->image) }}" class="wd-32 rounded-circle" alt="">
                </a>
                <div class="dropdown-menu dropdown-menu-header wd-200">
                    <ul class="list-unstyled user-profile-nav">
                        <li><a href="{{ route('admin.profile') }}"><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
                        <li><a href="{{ route('admin.change-password') }} "><span><i class="icon ion-ios-person-outline"></i></span>  Password Change</a></li>

                        <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
                        <li><a href=""><i class="icon ion-ios-download-outline"></i> Downloads</a></li>
                        <li><a href=""><i class="icon ion-ios-star-outline"></i> Favorites</a></li>
                        <li><a href=""><i class="icon ion-ios-folder-outline"></i> Collections</a></li>
                        <li><a href="{{ route('admin.logout') }}"><i class="icon ion-power"></i> Sign Out</a></li>
                    </ul>
                </div><!-- dropdown-menu -->
            </div><!-- dropdown -->
        </nav>
        <div class="navicon-right">
            <a id="btnRightMenu" href="" class="pos-relative">
                <i class="icon ion-ios-bell-outline"></i>
                <!-- start: if statement -->
                <span class="square-8 bg-danger"></span>
                <!-- end: if statement -->
            </a>
        </div><!-- navicon-right -->
    </div><!-- sl-header-right -->
</div><!-- sl-header -->
<!-- ########## END: HEAD PANEL ########## -->


<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">

    @yield('admin')


</div>
<script src="{{ asset('adminbackend/lib/jquery/jquery.js') }}"></script>
<script src="{{ asset('adminbackend/lib/popper.js/popper.js') }}"></script>
<script src="{{ asset('adminbackend/lib/bootstrap/bootstrap.js') }}"></script>
<script src="{{ asset('adminbackend/lib/jquery-ui/jquery-ui.js') }}"></script>
<script src="{{ asset('adminbackend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
{{--<script src="{{ asset('adminbackend/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>--}}
<script src="{{ asset('adminbackend/lib/d3/d3.js') }}"></script>
<script src="{{ asset('adminbackend/lib/rickshaw/rickshaw.min.js') }}"></script>
<script src="{{ asset('adminbackend/lib/chart.js/Chart.js') }}"></script>
<script src="{{ asset('adminbackend/lib/Flot/jquery.flot.js') }}"></script>
<script src="{{ asset('adminbackend/lib/Flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('adminbackend/lib/Flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('adminbackend/lib/flot-spline/jquery.flot.spline.js') }}"></script>

<!-- Text Editor JS -->
<script src="{{ asset('adminbackend/lib/medium-editor/medium-editor.js') }}"></script>
<script src="{{ asset('adminbackend/lib/summernote/summernote-bs4.min.js') }}"></script>

<script>
    $(function(){
        'use strict';

        // Inline editor
        var editor = new MediumEditor('.editable');

        // Summernote editor
        $('#summernote').summernote({
            height: 150,
            tooltip: false
        })
    });
</script>

<script src="{{ asset('adminbackend/js/starlight.js') }}"></script>
<script src="{{ asset('adminbackend/js/ResizeSensor.js') }}"></script>
<script src="{{ asset('adminbackend/js/dashboard.js') }}"></script>

<!-- Table Css -->
<script src="{{ asset('adminbackend/lib/highlightjs/highlight.pack.js') }}"></script>
<script src="{{ asset('adminbackend/lib/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('adminbackend/lib/datatables-responsive/dataTables.responsive.js') }}"></script>
<script src="{{ asset('adminbackend/lib/select2/js/select2.min.js') }}"></script>
    <script>
        $(function(){
            'use strict';

            $('#datatable1').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                }
            });

            $('#datatable2').DataTable({
                bLengthChange: false,
                searching: false,
                responsive: true
            });

            // Select2
            $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

        });
    </script>



{{--For Tostar--}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>

<script>
    @if(Session::has('message'))
    var type = "{{Session::get('alert-type','info')}}"
    switch (type){
        case 'info':
            toastr.info("{{Session::get('message')}}");
            break;

        case 'warning':
            toastr.warning("{{Session::get('message')}}");
            break;

        case 'success':
            toastr.success("{{Session::get('message')}}");
            break;

        case 'error':
            toastr.error("{{Session::get('message')}}");
    }
    @endif
</script>

<script>
    $(document).on("click", "#delete", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
            title: "Are you Want to delete?",
            text: "Once Delete, This will be Permanently Delete!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;
                } else {
                    swal("Safe Data!");
                }
            });
    });
</script>

</body>
</html>
