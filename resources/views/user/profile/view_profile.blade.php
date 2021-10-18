@extends('user.user_master')
@section('user')

    <div class="card" style="width: 18rem;">
{{--        <img src="{{ (!empty($user->image))? url('upload/user_images/'--}}
{{--            .$user->image):url('upload/no_image.jpg') }}" class="card-img-top" alt="...">--}}

           @if(!empty($user->image) )
                <img src="{{ asset("upload/user_images/".$user->image)  }}">
           @else
               <img src="{{ asset("upload/".'no_image.jpg') }}">
           @endif
        <div class="card-body">
            <h5 class="card-title">Name: {{ $user->name }}</h5>
            <p class="card-text"> Email: {{ $user->email }}</p>
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
        </div>
    </div>


@endsection
