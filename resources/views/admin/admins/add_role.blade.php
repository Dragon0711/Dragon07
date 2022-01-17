@extends('admin.admin_master')

@section('admin')


    <form action="{{ route('create.role') }}" method="post" >
        @csrf
        <div class="container">
            <div class="row">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="col-lg-4">
                            <li class="alert alert-warning " role="alert">{{ $error }}</li>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Add New Role
                <a href="{{route('all.admins')}}" class="btn btn-success btn-sm pull-right">All Admins</a>
            </h6>
            <p class="mg-b-20 mg-sm-b-30">fill all information about new Role</p>

            <div class="form-layout">
                <div class="row mg-b-25">

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Role Name: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="role_name" placeholder="Role Name">
                            @error('name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-12"><h5 style="color:Green">Chose Permission For This Role</h5></div>
                <div class="row col-lg-12" style="margin-left: 8px; margin-top:15px">

                    @forelse($permissions as $permission)
                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="id[]" value="{{$permission->id}}">
                            <span>{{$permission->title}}</span>
                        </label>
                    </div><!-- col-4 -->

                    @empty
                        <span class="alert-danger"> No Data</span>
                    @endforelse
                </div><!-- row -->


                <div class="form-layout-footer" style="margin-left: 7px;margin-top: 15px">
                    <button class="btn btn-info mg-r-5">Submit</button>
                    <button class="btn btn-secondary">Cancel</button>
                </div><!-- form-layout-footer -->
            </div><!-- form-layout -->
        </div><!-- card -->

    </form>




@endsection
