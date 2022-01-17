@extends('admin.admin_master')

@section('admin')


    <form action="{{ URL("admin/update/$data->id") }}" method="post">
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
            <h6 class="card-body-title">Add New Admin
                <a href="{{route('all.admins')}}" class="btn btn-success btn-sm pull-right">All Admins</a>
            </h6>
            <p class="mg-b-20 mg-sm-b-30">fill all information about new Admin</p>

            <div class="form-layout">
                <div class="row mg-b-25">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">name: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="name" value="{{ old('name',$data->name) }}" >
                            @error('name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="email" name="email" value="{{old('email',$data->email)}}" >
                            @error('email')
                            {{ $message }}
                            @enderror
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="phone" value="{{old('phone',$data->phone)}}" >
                            @error('name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div><!-- col-4 -->


                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Role: <span class="tx-danger">*</span></label>
                            <select class="form-control select2" data-placeholder="Choose Role" name="role_id" >
                                <option value="">--- Select ---</option>
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}" {{ $role->id == $data->role_id ? "selected"  : '' }}>{{ $role->role_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><!-- col-4 -->


                <div class="form-layout-footer" style="margin-left: 20px;margin-top: 30px">
                    <button class="btn btn-info mg-r-5">Submit</button>
                    <button class="btn btn-secondary">Cancel</button>
                </div><!-- form-layout-footer -->
            </div><!-- form-layout -->
        </div><!-- card -->

    </form>



@endsection
