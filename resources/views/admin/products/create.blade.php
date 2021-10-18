@extends('admin.admin_master')

<link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>
@section('admin')


  <form method="POST" action="{{route('store.product')}}" enctype="multipart/form-data">
      @csrf
    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Add New Product
        <a href="{{route('all.products')}}" class="btn btn-success btn-sm pull-right">All Product</a>
        </h6>
        <p class="mg-b-20 mg-sm-b-30">fill all information about new product</p>

        <div class="form-layout">
            <div class="row mg-b-25">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Firstname: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="name" value="" placeholder="Product name">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="code" value="" placeholder="Product Code">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-control-label">discount_price: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="discount_price" value="" placeholder="Enter discount_price">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">quantity: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="quantity" value="" placeholder="Enter quantity">
                    </div>
                </div><!-- col-4 -->

            <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Size: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="size" id="size" data-role="tagsinput" >
                </div>
            </div><!-- col-4 -->

                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Color: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="color" id="color" data-role="tagsinput">
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Price: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="price" value="" placeholder="Enter Price">
                    </div>
                </div><!-- col-4 -->
{{--                <div class="col-lg-4">--}}
{{--                    <div class="form-group mg-b-10-force">--}}
{{--                        <label class="form-control-label">quantity: <span class="tx-danger">*</span></label>--}}
{{--                        <input class="form-control" type="text" name="quantity" value="" placeholder="Enter quantity">--}}
{{--                    </div>--}}
{{--                </div><!-- col-4 -->--}}

                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                        <select class="form-control select2" data-placeholder="Choose Category" name="category_id">
                            <option label="Choose Category"></option>
                            @foreach($cats as $cat)
                                <option value="{{$cat->id}}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                        <select class="form-control select2" data-placeholder="Choose Sub-Category" name="subcategory_id">
                            <option label="Choose Sub-Category"></option>
                        </select>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Brands: <span class="tx-danger">*</span></label>
                        <select class="form-control select2" data-placeholder="Choose Brands" name="brand_id">
                            <option label="Choose Brands"></option>
                            @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                           @endforeach
                        </select>
                    </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Image One(Main): <span class="tx-danger">*</span></label>
                        <label class="custom-file">
                            <input type="file" class="custom-file-input" required="">
                            <span class="custom-file-control custom-file-control-inverse"></span>
                        </label>
                    </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Image 2: <span class="tx-danger">*</span></label>
                        <label class="custom-file">
                            <input type="file" name="image_2" id="file" class="custom-file-input" required="">
                            <span class="custom-file-control custom-file-control-primary"></span>
                        </label>
                    </div>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Image 3: <span class="tx-danger">*</span></label>
                        <label class="custom-file">
                            <input type="file" name="image_3" id="file" class="custom-file-input" required="">
                            <span class="custom-file-control custom-file-control-primary"></span>
                        </label>
                    </div>
                </div><!-- col-4 -->


            <div class="col-lg-12">
                <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Video Link: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="video" value="" placeholder="Enter Video Link">
                </div>
            </div><!-- col-4 -->

            <div class="col-lg-12">
                <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Description: <span class="tx-danger">*</span></label>
                    <textarea class="form-control"  name="desc" id="summernote"> </textarea>
                </div>
            </div><!-- col-4 -->
        </div><!-- row -->

            <hr>
            <br><br>

            <div class="row">
                <div class="col-lg-4">
                    <label class="ckbox">
                        <input type="checkbox" name="main_slider">
                        <span>Main slider</span>
                    </label>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    <label class="ckbox">
                        <input type="checkbox" name="mid_slider">
                        <span>Mid slider</span>
                    </label>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    <label class="ckbox">
                        <input type="checkbox" name="hot_deal">
                        <span>Hot Deal</span>
                    </label>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    <label class="ckbox">
                        <input type="checkbox" name="hot_new">
                        <span>Hot New</span>
                    </label>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    <label class="ckbox">
                        <input type="checkbox" name="best_rate">
                        <span>Best Rate</span>
                    </label>
                </div><!-- col-4 -->

                <div class="col-lg-4">
                    <label class="ckbox">
                        <input type="checkbox" name="trend">
                        <span>Trend Product</span>
                    </label>
                </div><!-- col-4 -->
            </div><!-- row -->
            <br>


            <div class="form-layout-footer">
                <button class="btn btn-info mg-r-5">Submit Form</button>
                <button class="btn btn-secondary">Cancel</button>
            </div><!-- form-layout-footer -->
        </div><!-- form-layout -->
    </div><!-- card -->

  </form>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>


@endsection
