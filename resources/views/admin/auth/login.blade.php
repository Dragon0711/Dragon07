@extends('admin.auth.auth_master')

@section('auth-layout')

 <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

     <form method="POST" action="{{ route('admin.store') }}">

         @if (Session::has('Success'))
             <h5><span class="badge rounded-pill bg-success">
              {{Session::get('Success')}}
            </span>
             </h5>
         @endif

         @if (Session::has('fail'))
             <h5><span class="badge rounded-pill bg-danger">
              {{Session::get('fail')}}
            </span>
             </h5>
         @endif

             @csrf
             @method('POST')

        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
            <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Admin <span class="tx-info tx-normal">Login</span></div>
            <div class="tx-center mg-b-60">Ecommerce Site</div>

            <div class="form-group">
                <input id="email" class="form-control @error('email') is-invild @enderror" type="email" name="email" :value="old('email')" required autofocus />
                   @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
            </div><!-- form-group -->
            <div class="form-group">
                <input id="password" class="form-control @error('password') is-invild @enderror" type="password" name="password" required autocomplete="current-password" />
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                <a href="{{ route('password.request') }}" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
            </div><!-- form-group -->
            <button type="submit" class="btn btn-info btn-block">Sign In</button>

{{--            <div class="mg-t-60 tx-center">Not yet a member? <a href="{{ Route('register') }}" class="tx-info">Sign Up</a></div>--}}
        </div><!-- login-wrapper -->
     </form>
 </div><!-- d-flex -->

@endsection
