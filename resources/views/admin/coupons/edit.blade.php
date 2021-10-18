
@extends('admin.admin_master')

@section('admin')
    <br><br>
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p> {{ $error }} </P>
            @endforeach
        </div>
    @endif
    <form method="POST" action="{{ url("admin/update/coupon/$value->id") }}">
        @csrf
        <div class="container" >
            <div class="row justify-content-center" ><br>
                <div class="card">
                    <div class="card-header" style="width: 1000px;">
                        <h3>Change Coupon Details</h3>
                        <div class="card-body">
                            <div class="col-md-12 mb-3">
                                <label for="coupon" class="form-label">Coupon Name</label>
                                <input type="text" class="form-control" name="coupon" value="{{ $value->coupon }}"   id="coupon" placeholder="Enter Coupon Name">
                                    @error('discount')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>

                            <div class="col-md-8">
                                <label for="coupon-discount" class="form-label">Discount %</label>                                <input type="text" class="form-control" name="discount" value="{{ $value->discount }}"  id="coupon-discount" placeholder="Enter discount %">
                                    @error('discount')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>

                            <button type="submit" style="float: right" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection


