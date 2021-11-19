@extends('admin.admin_master')

<link href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>
@section('admin')


    <form action="{{URL("admin/update/products/$product->id")}}" method="post" enctype="multipart/form-data">
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
            <h6 class="card-body-title">Edit Product
                <a href="{{route('all.products')}}" class="btn btn-success btn-sm pull-right">All Product</a>
            </h6>
            <p class="mg-b-20 mg-sm-b-30">fill all information to edit product</p>

            <div class="form-layout">
                <div class="row mg-b-25">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Firstname: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="name" value="{{$product->name}}" placeholder="Product name">
                            @error('name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="code" value="{{$product->code}}" placeholder="Product Code">
                            @error('code')
                            {{ $message }}
                            @enderror
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">discount_price: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="discount_price" value="{{$product->discount_price}}" placeholder="Enter discount_price">
                            @error('discount_price')
                            {{ $message }}
                            @enderror
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">quantity: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="quantity" value="{{$product->quantity}}" placeholder="Enter quantity">
                            @error('quantity')
                            {{ $message }}
                            @enderror
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Size: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="size" id="size" value="{{$product->size}}" data-role="tagsinput" >
                            @error('size')
                            {{ $message }}
                            @enderror
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Color: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="color" id="color"  value="{{$product->color}}" data-role="tagsinput">
                            @error('color')
                            {{ $message }}
                            @enderror
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Price: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="price" value="{{$product->price}}" placeholder="Enter Price">
                            @error('price')
                            {{ $message }}
                            @enderror
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                            <select class="form-control select2" data-placeholder="Choose Category" name="category_id">
                                <option label="Choose Category">Choose Category</option>

                                    <option value="{{$product->categoryT->id}}" selected>{{ $product->categoryT->name }}</option>

                            </select>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                            <select class="form-control select2" data-placeholder="Choose Sub-Category" name="subcategory_id">
                                <option label="Choose Sub-Category">Choose Sub-Category</option>

                                    <option value="{{$product->subCat->id}}" selected>{{$product->subCat->name}}</option>

                            </select>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Brands: <span class="tx-danger">*</span></label>
                            <select class="form-control select2" data-placeholder="Choose Brands" name="brand_id">
                                <option label="Choose Brands">Choose Brands</option>

                                    <option value="{{ $product->brandT->id }}" selected>{{ $product->brandT->name }}</option>

                            </select>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Image One(Main): <span class="tx-danger">*</span></label>
                            <label class="custom-file">
                                <input type="file" name="image_1" class="custom-file-input" onchange="readURL(this);" >
                                <img src="{{ asset("upload/product/$product->image_1") }}" width="85" class="mt-3">
                                <span class="custom-file-control custom-file-control-inverse"></span>
                            </label>
                            @error('image_1')
                            {{ $message }}
                            @enderror
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Image 2: <span class="tx-danger">*</span></label>
                            <label class="custom-file">
                                <input type="file" name="image_2" id="file" class="custom-file-input" onchange="readURL(this);" >
                                <img src="{{ asset("upload/product/$product->image_2") }}" width="85" class="mt-3">
                                <span class="custom-file-control custom-file-control-primary"></span>
                            </label>
                            @error('image_2')
                            {{ $message }}
                            @enderror
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Image 3: <span class="tx-danger">*</span></label>
                            <label class="custom-file">
                                <input type="file" name="image_3" id="file" class="custom-file-input" onchange="readURL(this);" >
                                <img src="{{ asset("upload/product/$product->image_3") }}" width="85" class="mt-3">
                                <span class="custom-file-control custom-file-control-primary"></span>
                            </label>
                            @error('image_3')
                            {{ $message }}
                            @enderror
                        </div>
                    </div><!-- col-4 -->


                    <div class="col-lg-12 mt-5">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label mt-5">Video Link: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="video" value="{{$product->video}}" placeholder="Enter Video Link">
                            @error('video')
                            <span>{{ $message }}</span>
                            @enderror
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-12">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Description: <span class="tx-danger">*</span></label>
                            <textarea class="form-control"  name="desc" id="summernote"> {{$product->desc}} </textarea>
                            @error('desc')
                            {{ $message }}
                            @enderror
                        </div>
                    </div><!-- col-4 -->
                </div><!-- row -->

                <hr>
                <br><br>

                <div class="row">
                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="main_slider" value="1">
                            <span>Main slider</span>
                        </label>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="mid_slider" value="1">
                            <span>Mid slider</span>
                        </label>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="hot_deal" value="1">
                            <span>Hot Deal</span>
                        </label>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="hot_new" value="1">
                            <span>Hot New</span>
                        </label>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="best_rate" value="1">
                            <span>Best Rate</span>
                        </label>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="trend" value="1">
                            <span>Trend Product</span>
                        </label>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <label class="ckbox">
                            <input type="checkbox" name="buyone_getone" value="1">
                            <span>buyone_getone</span>
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

    <script type="text/javascript">
        function readURL(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#one')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
