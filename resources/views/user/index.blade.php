
@extends('layout.navbar')

@section('navbar')
    @php
       // DB::table('order_details')->where('id',Auth::id())->get();
        $orders = DB::table('order_details')
                         ->join('products','order_details.product_id','products.id')
                         ->join('orders','order_details.order_id','=','orders.id')
                         ->select('order_details.*','products.name','products.code','products.image_1','orders.status_code')
                         ->where('orders.user_id',Auth::id())
                         ->where('orders.status','!=', 4)
                         ->get();
    @endphp
    <div class="container col-lg-13" style="width: 1200px;margin-right: 55px">
        <div class="row">
            <div class="col-lg-8">
                <h4 class="card-title text-center">Your Orders</h4>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Order Id</th>
                        <th scope="col">Order photo</td>
                        <th scope="col">Product Name</th>
                        <th scope="col">Color</th>
                        <th scope="col">Size</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                    <tr>
{{--                        <th scope="row">1</th>--}}
                        <td>{{$order->order_id}}</td>
                        <td> <img src="{{asset("upload/product/".$order->image_1)}}" style="height: 100px;width: 125px"> </td>
                        <td>{{$order->product_name}}</td>
                        <td>{{$order->color}}</td>
                        <td>{{$order->size}}</td>
                        <td>{{$order->total_price}} $</td>
                        <td>
                            <a href="{{ URL("user/cancel/order/$order->order_id") }}" class="btn btn-sm btn-danger edit-btn" style="float: right">Cancel Order</a><br><br>
                            <a href="{{ URL("user/track/order/$order->status_code") }}" class="btn btn-sm btn-primary edit-btn" style="float: right">track</a>

                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


            <div class="col-lg-4">
                <div class="card">
                        <img src="{{ asset('userbackend/panel/assets/images/desha.png') }}" class="card-img-top" style="height: 90px; width: 90px; margin-left: 34%; border-radius: 90px">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ Auth::user()->name }}</h5>

                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"> <a href="{{ route('change_password') }}">Change Password</a>  </li>
                            <li class="list-group-item"> <a href="{{ route('profile.edit') }}">Edit your Profile</a>  </li>

                        </ul>
                        <div class="card-body">
                            <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                        </div>
                </div>
            </div>
        </div>


@endsection
