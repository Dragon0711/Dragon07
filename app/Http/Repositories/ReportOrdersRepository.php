<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\ReportOrdersInterface;
use App\Models\Order;
use Illuminate\Support\Facades\DB;


class ReportOrdersRepository implements ReportOrdersInterface{


    private $orderModel;

    public function __construct(Order $order){
    $this->orderModel = $order;

    }


    public function reportOrders($request)
    {
        return view('admin.reports.search_page');
    }

    public function searchByMonth($request)
    {
        $month = $request->month;

        $totalMonth = DB::table('orders')->where('month',$month)->where('status', 3)->sum('total');

        $reportMonth = DB::table('orders')->where('month',$month)->where('status', 3)->get();

        return view('admin.reports.report_month',compact('reportMonth','totalMonth'));

    }

    public function searchByYear($request)
    {
        $year = $request->year;

        $totalYear = DB::table('orders')->where('year',$year)->where('status', 3)->sum('total');

        $reportYear = DB::table('orders')->where('year',$year)->where('status', 3)->get();

        return view('admin.reports.report_year',compact('reportYear','totalYear'));
    }

    public function searchByDay($request)
    {
        $day = $request->day;
//        dd($day);
            /*** here change format date to be like in datatable  ***/
        $newFormatDate = date('d-m-y',strtotime($day));
//        dd($newFormatDate);

        $totalDay = DB::table('orders')->where('day',$newFormatDate)->where('status', 3)->sum('total');

        $reportDay = DB::table('orders')->where('day',$newFormatDate)->where('status', 3)->get();

        return view('admin.reports.report_day',compact('totalDay','reportDay'));

    }
}
