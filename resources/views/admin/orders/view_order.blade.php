@extends('admin.admin_master')

@section('admin')

    <!-- ########## START: MAIN PANEL ########## -->

    <div class="sl-mainpanel" style="margin-left: 7px">
        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Order Details</h6>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header"><strong>Order</strong> Details</div>
                            <div class="body">
                                <table class="table">
                                    <tr>
                                        <th>Name :</th>
                                        <th>{{$order->name}}</th>
                                    </tr>
                                    <tr>
                                        <th>Phone :</th>
                                        <th>{{$order->phone}}</th>
                                    </tr>
                                    <tr>
                                        <th>Payment Type :</th>
                                        <th>{{$order->payment_type}}</th>
                                    </tr>
                                    <tr>
                                        <th>Payment Id :</th>
                                        <th>{{$order->payment_id}}</th>
                                    </tr>
                                    <tr>
                                        <th>Total :</th>
                                        <th>{{$order->total}} $</th>
                                    </tr>
                                    <tr>
                                        <th>Day :</th>
                                        <th>{{$order->day}}</th>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header"><strong>Order</strong> Shipping</div>
                            <div class="body">
                                <table class="table">
                                    <tr>
                                        <th>Name :</th>
                                        <th>{{$shipping->ship_name}}</th>
                                    </tr>
                                    <tr>
                                        <th>Phone :</th>
                                        <th>{{$shipping->ship_phone}}</th>
                                    </tr>
                                    <tr>
                                        <th>E-mail :</th>
                                        <th>{{$shipping->ship_email}}</th>
                                    </tr>
                                    <tr>
                                        <th>Address :</th>
                                        <th>{{$shipping->ship_address}}</th>
                                    </tr>
                                    <tr>
                                        <th>City :</th>
                                        <th>{{$shipping->ship_city}}</th>
                                    </tr>
                                    <tr>
                                        <th>Status :</th>
                                        <th>
                                            @if($order->status == 0)
                                                <span class="badge badge-dark">pending</span>
                                            @elseif($order->status == 1)
                                                <span class="badge badge-success">Payment Accepted</span>
                                            @elseif($order->status == 2)
                                                <span class="badge badge-warning">Progress</span>
                                            @elseif($order->status == 3)
                                                <span class="badge badge-info">Delivered</span>
                                            @else
                                                <span class="badge badge-danger">Canceled</span>
                                            @endif
                                        </th>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>

                 <!! end of div row !!>
                </div>

                <div class="row">
                    <div class="card pd-20 pd-sm-40 col-lg-12">
                        <div class="table-wrapper">
                            <table class="table table-dark">
                                <thead>
                                <tr>
                                    <th scope="col">Order Id</th>
                                    <th scope="col">Order Photo</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Size</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Total Price</th>
                                </tr>
                                </thead>
                                @foreach($detalis as $value)
                                <tbody style="font-weight: 500;">

                                <tr>
                                    <td style="color: black"><strong>{{$value->order_id}}</strong></td>

                                    <td ><img src="{{asset('upload/product/'.$value->image_1)}}" style="width: 120px;height: 100px"></td>

                                    <td style="color: black">{{$value->product_name}}</td>

                                   <td style="color: black">{{$value->size}}</td>

                                    <td style="color: black">{{$value->color}}</td>

                                        <td style="color: black">{{$value->total_price}} $</td>
                                    </tr>

                                </tbody>
                                @endforeach
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                @if($order->status == 0)
                                <a href="{{ URL("admin/accept/order/payment/$order->id") }}" class="btn btn-lg btn-success edit-btn">Payment Accepted</a>
                                <a href="{{ URL("admin/cancel/order/$order->id") }}" class="btn btn-lg btn-danger edit-btn" style="float: right">Cancel Order</a>
                                @elseif($order->status == 1)
                                    <a href="{{ URL("admin/progress/delivery/$value->id") }}" class="btn btn-sm btn-dark edit-btn">Send To Delivery ?</a>
                                @elseif($order->status == 2)
                                    <a href="{{ URL("admin/done/delivery/$value->id") }}" class="btn btn-sm btn-success edit-btn">Delivery Done..</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
@endsection
