@extends('admin.admin_master')

@section('admin')


    <form action="{{route('admin.storeAdmin')}}" method="post" enctype="multipart/form-data">
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
            <p class="mg-b-20 mg-sm-b-30">fill all information about new product</p>

            <div class="form-layout">
                <div class="row mg-b-25">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">name: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="name" value="" placeholder="name">
                            @error('name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="email" name="email" value="" placeholder="Email">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Password: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="password" name="password" value="" placeholder="password">
                            @error('password')
                            {{ $message }}
                            @enderror
                        </div>
                    </div><!-- col-4 -->


                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Role: <span class="tx-danger">*</span></label>
                            <select class="form-control select2" data-placeholder="Choose Role" name="role_id">
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><!-- col-4 -->


{{--                    <div class="col-lg-4">--}}
{{--                        <div class="form-group mg-b-10-force">--}}
{{--                            <label class="form-control-label">Image One(Main): <span class="tx-danger">*</span></label>--}}
{{--                            <label class="custom-file">--}}
{{--                                <input type="file" name="image_1" class="custom-file-input" onchange="readURL(this);" >--}}
{{--                                <span class="custom-file-control custom-file-control-inverse"></span>--}}
{{--                                <img src="#" id="one">--}}
{{--                            </label>--}}
{{--                            @error('image_1')--}}
{{--                            {{ $message }}--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div><!-- col-4 -->--}}


                <div class="row">
                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="brands" value="1">
                            <span>brands</span>
                        </label>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="categories" value="1">
                            <span>categories</span>
                        </label>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="subcategories" value="1">
                            <span>subcategories</span>
                        </label>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="coupons" value="1">
                            <span>coupons</span>
                        </label>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="news_laters" value="1">
                            <span>News laters</span>
                        </label>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="orders" value="1">
                            <span>orders</span>
                        </label>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="products" value="1">
                            <span>products</span>
                        </label>
                    </div><!-- col-4 -->

                </div><!-- row -->
                <br>


                <div class="form-layout-footer">
                    <button class="btn btn-info mg-r-5">Submit</button>
                    <button class="btn btn-secondary">Cancel</button>
                </div><!-- form-layout-footer -->
            </div><!-- form-layout -->
        </div><!-- card -->

    </form>




@endsection
