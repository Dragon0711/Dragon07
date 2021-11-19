
@extends('layout.navbar')

@section('navbar')

    <div class="container">
        <div class="row">
    <div class="col-4">
        <div class="card">
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
 </div>
    </div>


@endsection
