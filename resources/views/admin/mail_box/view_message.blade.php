@extends('admin.admin_master')

@section('admin')

    <!-- ########## START: MAIN PANEL ########## -->

    <div class="sl-mainpanel" style="margin-left: 7px">
        <div class="sl-pagebody">

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Message Details</h6>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header"><strong>Message</strong> Details</div>
                            <div class="body">
                                <table class="table">
                                    <tr>
                                        <th>Name :</th>
                                        <th>{{$message->name}}</th>
                                    </tr>
                                    <tr>
                                        <th>Phone :</th>
                                        <th>{{$message->phone}}</th>
                                    </tr>
                                    <tr>
                                        <th>E-mail :</th>
                                        <th>{{$message->email}}</th>
                                    </tr>
                                    <tr>
                                        <th>Message:</th>
                                        <th>{{$message->message}}</th>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                    <!! end of div row !!>
                </div>

            </div>
        </div>
@endsection
