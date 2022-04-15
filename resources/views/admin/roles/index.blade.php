@extends('admin.admin_master')

@section('admin')

    <!-- ########## START: MAIN PANEL ########## -->

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Roles list</h5>
        </div>
        <!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Roles Table
                <a href="{{url("/admin/add/role")}}" class="btn btn-sm btn-success" style="float: right;"
                  >Add New</a>
            </h6>

            <div class="table-wrapper">
                <div id="datatable1_wrapper" class="dataTables_wrapper no-footer">
                    <table id="datatable1" class="table display responsive nowrap dataTable no-footer dtr-inline"
                           role="grid" aria-describedby="datatable1_info" style="width: 987px;">
                        <thead>
                        <tr>
                            <th class="wd-15p">ID</th>
                            <th class="wd-15p">Name</th>
                            <th class="wd-20p">Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $value)
                            <tr role="row" class="odd">
                                <td tabindex="0" class="sorting_1">{{ $loop->iteration}}</td>
                                <td>{{ $value->name }}</td>
                                <td>
                                    <a href="{{ URL("admin/edit/$value->id") }}"
                                       class="btn btn-sm btn-info edit-btn">edit</a>

                                    <a href="{{ URL("admin/delete/$value->id") }}" class="btn btn-sm btn-danger"
                                       id="delete">delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="dataTables_info" id="datatable1_info" role="status" aria-live="polite"></div>
                    <div class="dataTables_paginate paging_simple_numbers" id="datatable1_paginate">
                        <a class="paginate_button previous disabled" aria-controls="datatable1" data-dt-idx="0"
                           tabindex="0" id="datatable1_previous">Previous</a>
                        <span><a class="paginate_button current" aria-controls="datatable1" data-dt-idx="1"
                                 tabindex="0">1</a></span>
                        <a class="paginate_button next" aria-controls="datatable1" data-dt-idx="7" tabindex="0"
                           id="datatable1_next">Next</a>
                    </div>
                </div>
            </div><!-- table-wrapper -->
        </div>


@endsection



