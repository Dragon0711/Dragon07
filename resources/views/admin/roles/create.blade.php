
@extends('admin.admin_master')

@section('admin')
    <br><br>
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p> {{ $error }} </P>
            @endforeach
        </div>
    @endif
    <form method="POST" action="{{ url("admin/roles") }}">
        @csrf
        <div class="container" >
            <div class="row justify-content-center" ><br>
                <div class="card">
                    <div class="card-header" style="width: 1000px;">
                        <h3>Change Category name</h3>
                        <div class="card-body">
                            <div class="col-md-12 mb-3">
                                <input type="text" name="name" value="" class="form-control" >
                            </div>

                            <div id="checkbBoxes">
                                <div class="form-group">
                                    <br>
                                    <label class="required" for="permissions">{{ __('language.permissions') }}</label>
                                    <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all"
                                      style="border-radius: 0">{{ __('language.select_all') }}</span>
                                        <span class="btn btn-info btn-xs deselect-all"
                                              style="border-radius: 0">{{ __('language.deselect_all') }}</span>
                                    </div>

                                        <div class="checkbox-inline">
                                            @foreach($permissions as $permission)

                                                <label class="checkbox" for="ch_{{$permission->id}}">
                                                    <input id="ch_{{$permission->id}}" type="checkbox" name="permissions[]"
                                                           value="{{$permission->id}}"
                                                           class="rolecheckbox ">
                                                    <span></span>{{$permission->name ? $permission->name : $permission->title}}
                                                </label>

                                            @endforeach

                                            @if($errors->has('permissions'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('permissions') }}
                                                </div>
                                            @endif
                                        </div>
                                </div>

                            </div>


                            <button type="submit" style="float: right" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


@endsection


