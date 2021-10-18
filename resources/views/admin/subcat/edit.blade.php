
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
<form method="POST" action="{{ url("admin/update/subcat/$value->id") }}">
    @csrf
    <div class="container" >
        <div class="row justify-content-center" ><br>
            <div class="card">
                <div class="card-header" style="width: 1000px;">
                    <h3>Change Category name</h3>
                    <div class="card-body">
    <div class="col-md-12 mb-3">
        <input type="text" name="name" value="{{ $value->name }}" class="form-control" >
    </div>

    <div class="col-md-8">
        <label for="cat_name" class="form-label">Category Name</label>
        <select class="form-control" name="category_id">
            @foreach($cats as $cat)
                          {{-- Second way -->   @if($cat->id  ==  $value->category_id) selected  @endif      --}}
                <option  value="{{ $cat->id }}" {{ $cat->id  ==  $value->category_id  ? 'selected' : '' }}>{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" style="float: right" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection


