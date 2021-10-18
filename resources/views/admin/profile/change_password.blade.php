@extends('admin.admin_master')
@section('admin')
    <br><br>
    <div class="container" >
     <div class="row justify-content-center"><br>
         <div class="card">
           <div class="card-header"><h3>Change Password</h3>
               <div class="card-body">
                <form class="row g-3"  method="POST" action="{{ route("admin.update.password") }}">
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

                    <div class="col-md-12" style="margin-top: 15px;">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
               </div>
             </div>
         </div>
      </div>
    </div>



@endsection
