@extends('admin.admin_master')

@section('admin')


    <!-- ########## START: MAIN PANEL ########## -->

<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Sub-Category list</h5>
    </div>
    <!-- sl-page-title -->

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Sub-Category Table
            <a href="" class="btn btn-sm btn-success" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Add New</a>
        </h6>

        <div class="table-wrapper">
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
                        <th class="wd-15p">Sub-Category name</th>
                        <th class="wd-15p">Category name</th>
                        <th class="wd-20p">Action</th>

                    </tr>
                    </thead>
                     <tbody>
                        @foreach($subCat as $key=> $category)
                    <tr role="row" class="odd">
                        <td tabindex="0" class="sorting_1">{{ $key+1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->category->name }}</td>
                        <td>
                            <a href="{{ URL("admin/edit/subcat/$category->id") }}" class="btn btn-sm btn-info edit-btn">edit</a>

                            <a href="{{ URL("admin/delete/subcat/$category->id") }}" class="btn btn-sm btn-danger" id="delete">delete</a>
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

    <!-- LARGE MODAL -->
    <div id="modaldemo3" class="modal fade">
        <div class="modal-dialog modal-lg" style="width: 500px;" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add New Category</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-20">
                    <form class="row g-3 row justify-content-center"  method="POST" action="{{ route("add.SubCat") }}">
                        @csrf
                        <div class="col-md-8">
                            <label for="cat_name" class="form-label">Sub-Category Name</label>
                            <input type="text" class="form-control" name="name"  id="cat_name" placeholder="Sub-Category">
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-8">
                            <label for="cat_name" class="form-label">Category Name</label>
                          <select class="form-control" name="category_id" id="category_id">
                              @foreach($cats as $cat)
                              <option name="category_id"  value="{{ $cat->id }}">{{ $cat->name }}</option>
                              @endforeach
                          </select>
                        </div>

                        </div><!-- modal-body -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info pd-x-20">Save</button>
                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->

@endsection



