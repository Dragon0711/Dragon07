
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
<form method="POST" action="{{ url("admin/update/brands/$value->id") }}" enctype="multipart/form-data">
    @csrf
    <div class="container" >
        <div class="row justify-content-center" ><br>
            <div class="card">
                <div class="card-header" style="width: 1000px;">
                    <h3>Change Brand name</h3>
                    <div class="card-body">
    <div class="col-md-12 mb-3">
        <input type="text" name="name" value="{{ $value->name }}" class="form-control" >
    </div>
    <div class="col-md-6 mb-3">
        <label for="logo-id" class="form-label">Brand logo</label>
        <input type="file" class="form-control" name="logo" id="logo-id">
    </div>
    <div class="col-md- mb-3">
        <td><img src="{{ asset("upload/brands/".$value->logo) }}" height="80px" width="150px"></td>
    </div>
    <button type="submit" style="float: right" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection


