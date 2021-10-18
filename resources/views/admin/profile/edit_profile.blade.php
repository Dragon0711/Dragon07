@extends('admin.admin_master')
@section('admin')



    <div class="row" style="padding: 20px; margin: 20px;">
        <div class="col-md-6">
        <form  method="POST" action="{{ route("admin.profile.update") }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="inputEmail4" value="{{ $oldData->email }}">
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="name" class="form-label"> Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$oldData->name}}">
                @error('name')
                <div class="text-danger">{{$name}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Choose New Photo</label>
                <input class="form-control" type="file" name="image" id="formFile">
            </div>


            {{--           <div class="card" style="width: 18rem;"> Your Old Photo--}}
            {{--           <img src="{{ (!empty($oldData->image))? url('upload/admin_images/'--}}
            {{--            .$oldData->image):url('upload/no_image.jpg') }}" class="card-img-top" alt="...">--}}
            {{--           </div>--}}

            <div class="col-md-6">
                <label for="formFile" class="form-label">Your Old Photo</label>
                @if(!empty($oldData->image) )
                    <img src="{{ asset("upload/admin_images/".$oldData->image)  }}" style="width: 18rem; height: 300px">
                @else
                    <img src="{{ asset("upload/no_image.jpg") }}">
                @endif
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
        </div>
    </div>




@endsection
