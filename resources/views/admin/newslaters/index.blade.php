@extends('admin.admin_master')

@section('admin')

    <!-- ########## START: MAIN PANEL ########## -->

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>NewsLaters list</h5>
        </div>
        <!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">NewsLater Table
            </h6>
       <form method="post">
           @csrf
           @method('DELETE')
            <div class="table-wrapper">
                <button type="submit" formaction="{{ route('deleteAll') }}" class="btn btn-sm btn-danger" style="float: right;margin-bottom: 5px; color: whitesmoke" >Delete All</button>
                <div id="datatable1_wrapper" class="dataTables_wrapper no-footer"><div class="dataTables_length" id="datatable1_length">
                        <label><select name="datatable1_length" aria-controls="datatable1" class="select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                <option value="10">10</option><option value="25">25</option><option value="50">50</option>
                                <option value="100">100</option></select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 48px;">
                            <span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-datatable1_length-qg-container">
                            <span class="select2-selection__rendered" id="select2-datatable1_length-qg-container" title="10">10</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span>
                            <span class="dropdown-wrapper" aria-hidden="true"></span></span> items/page</label></div><div id="datatable1_filter" class="dataTables_filter"><label><input type="search" class="" placeholder="Search..." aria-controls="datatable1"></label></div>
                    <table id="datatable1" class="table display responsive nowrap dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable1_info" style="width: 987px;">
                        <thead>
                        <tr>
                            <th class="wd-15p">ID</th>
                            <th class="wd-15p">NewsLater</th>
                            <th class="wd-15p">Created At</th>
                            <th class="wd-20p">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key=> $value)
                            <tr role="row" class="odd">
                                <td tabindex="0" class="sorting_1"><input type="checkbox" name="ids[]" value="{{$value->id}}"> {{ $key+1 }} </td>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->created_at }}</td>
                                <td>
                                    <a href="{{ URL("admin/delete/newslater/$value->id") }}" class="btn btn-sm btn-danger" id="delete">delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="dataTables_info" id="datatable1_info" role="status" aria-live="polite"></div>
                    <div class="dataTables_paginate paging_simple_numbers" id="datatable1_paginate">
                        <a class="paginate_button previous disabled" aria-controls="datatable1" data-dt-idx="0" tabindex="0" id="datatable1_previous">Previous</a>
                        <span><a class="paginate_button current" aria-controls="datatable1" data-dt-idx="1" tabindex="0">1</a></span>
                        <a class="paginate_button next" aria-controls="datatable1" data-dt-idx="7" tabindex="0" id="datatable1_next">Next</a>
                    </div>
                </div>
            </div><!-- table-wrapper -->
        </div>
        <!-- card -->
        <!-- ########## END: MAIN PANEL ########## -->
      </form>


@endsection



