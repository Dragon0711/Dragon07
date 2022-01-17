@extends('admin.admin_master')

@section('admin')

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Orders Reports Search</h5>
        </div>
        <!-- sl-page-title -->

<div class="card pd-20 pd-sm-40" >
    <h6 class="card-body-title">Orders report search</h6>

    <div class="container" >
        <div class="row">
                <div class="col-lg-4">
                    <form method="get" action="{{url('admin/search/orders/day')}}" >
                        @csrf
                            <div class="row justify-content-center" ><br>
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Search by Day</h4>
                                        <div class="card-body">
                                            <div class="col-md-4">
                                                <input type="date" name="day" value="" class="form-control" style="width: 200px">
                                            </div><br>
                                            <button type="submit" style="float: right" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>

                 <div class="col-lg-4">
                     <form method="get" action="{{url('admin/search/orders/month')}}" >
                         @csrf
                         <div class="row justify-content-center" ><br>
                             <div class="card" style="margin-top: 7px">
                                 <div class="card-header">
                                     <h4>Search by Month</h4>
                                     <div class="card-body">
                                         <div class="col-md-4">
                                            <select class="form-control" name="month"  style="width: 175px">
                                                <option value="january">January</option>
                                                <option value="february">February</option>
                                                <option value="march">March</option>
                                                <option value="april">April</option>
                                                <option value="may">May</option>
                                                <option value="june">June</option>
                                                <option value="july">July</option>
                                                <option value="august">August</option>
                                                <option value="september">September</option>
                                                <option value="october">October</option>
                                                <option value="november">November</option>
                                                <option value="december">December</option>
                                            </select>
                                         </div><br>
                                         <button type="submit" style="float: right" class="btn btn-primary">Search</button>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </form>
                 </div>

                 <div class="col-lg-4">
                     <form method="get" action="{{url('admin/search/orders/year')}}">
                         @csrf
                         <div class="row justify-content-center" ><br>
                             <div class="card" style="margin-top: 7px">
                                 <div class="card-header">
                                     <h4>Search by Year</h4>
                                     <div class="card-body">
                                         <div class="col-md-4">
                                             <select class="form-control" name="year"  style="width: 175px">
                                                 <option value="2022">2022</option>
                                                 <option value="2021">2021</option>
                                                 <option value="2020">2020</option>
                                                 <option value="2019">2019</option>
                                                 <option value="2018">2018</option>
                                                 <option value="2017">2017</option>
                                             </select>
                                         </div><br>
                                         <button type="submit" style="float: right" class="btn btn-primary">Search</button>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </form>
                  </div>
               </div>
            </div>
        </div>
    </div>

@endsection



