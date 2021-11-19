@extends('layout.navbar')

@section('navbar')

     <div style="padding: 25px">
       <form class="row g-3"  method="POST" action="{{ route("profile.update") }}" enctype="multipart/form-data">
         @csrf
          <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="inputEmail4" value="{{ $data->email }}">
              @error('email')
              <div class="text-danger">{{ $message }}</div>
              @enderror
        </div>
        <div class="col-6">
            <label for="name" class="form-label"> Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$data->name}}">
            @error('name')
            <div class="text-danger">{{$name}}</div>
            @enderror
        </div>

       <div class="col-6">
           <label for="formFile" class="form-label">Choose New Photo</label>
           <input class="form-control" type="file" name="image" id="formFile">
       </div>

       <div class="col-md-3">
           <label for="formFile" class="form-label">Your Old Photo</label>
           @if(!empty($data->image) )
               <img src="{{ asset("upload/user_images/".$data->image)  }}" style="width: 18rem; height: 300px">
           @else
               <img src="{{ asset("upload/no_image.jpg") }}">
           @endif
       </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
     </div>




@endsection
