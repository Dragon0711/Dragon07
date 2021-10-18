@extends('admin.admin_master')
@section('admin')

    <div class="card" style="width: 18rem; padding: 10px;margin: 20px;">
        {{--        <img src="{{ (!empty($data->image))? url('upload/admin_images/'--}}
        {{--            .$data->image):url('upload/no_image.jpg') }}" class="card-img-top" alt="...">--}}

        @if(!empty($data->image) )
            <img src="{{ asset("upload/admin_images/".$data->image)  }}">
        @else
            <img src="{{ asset("upload/".'no_image.jpg') }}">
        @endif
        <div class="card-body">
            <h5 class="card-title">Name: {{ $data->name }}</h5>
            <p class="card-text"> Email: {{ $data->email }}</p>
            <a href="{{ route('admin.profile.edit') }}" class="btn btn-primary">Edit Profile</a>
        </div>
    </div>


@endsection
