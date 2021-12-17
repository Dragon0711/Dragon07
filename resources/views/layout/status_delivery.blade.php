@extends('layout.navbar')


@section('navbar')

@if($status->status == 0)
<div class="col-lg-8" style="margin: 75px">
    <div class="progress">
        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 25%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
</div>

    <div style="margin: 75px">
        <h4><strong>Status :</strong> your order under review </h4>
    </div>

@elseif($status->status == 1)

    <div class="col-lg-8" style="margin: 75px">
        <div class="progress">
            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 50%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>

    <div style="margin: 75px">
        <h4><strong>Status :</strong> Payment under Process </h4>
    </div>

@elseif($status->status == 2)

    <div class="col-lg-8" style="margin: 75px">
        <div class="progress">
            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 75%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>

    <div style="margin: 75px">
        <h4 style="color: orangered"><strong>Status :</strong> In Road For Delivery </h4>
    </div>

@elseif($status->status == 3)

    <div class="col-lg-8" style="margin: 75px">
        <div class="progress">
            <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>

    <div style="margin: 100px">
        <h4 style="color: green"><strong>Status :</strong> Delivery Success</h4>
    </div>

@elseif($status->status == 4)

    <div class="col-lg-8" style="margin: 75px">
        <div class="progress">
            <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>

    <div style="margin: 100px">
        <h4 style="color: red"><strong>Status :</strong> Order Cancelled</h4>
    </div>


@endif










@endsection
