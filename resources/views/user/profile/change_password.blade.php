@extends('user.user_master')
@section('user')



    <div style="padding: 30px">
        <h3>Change Password</h3>
        <div class="row" style="padding: 30px">
        <form class="row g-3"  method="POST" action="{{ route("update.password") }}">
            @csrf

            <div class="col-md-8">
                    <label for="current_password" class="form-label">Current Password</label>
                    <input type="password" class="form-control" name="oldpassword"  id="current_password">
                    @error('oldpassword')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
            </div>

            <div class="col-md-8">
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" class="form-control" name="password"  id="password">
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
            </div>

            <div class="col-md-8">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation"  id="password_confirmation">
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
       </div>
    </div>




@endsection
