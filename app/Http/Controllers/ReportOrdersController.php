<?php

namespace App\Http\Controllers;


use App\Http\Interfaces\OrdersInterface;
use App\Http\Interfaces\ReportOrdersInterface;
use Illuminate\Http\Request;


class ReportOrdersController extends Controller
{
    private $reportordersInterface;

    public function __construct(ReportOrdersInterface $reportordersInterface){


        $this->reportordersInterface = $reportordersInterface;
    }


    public function reportOrders(Request $request)
    {
        return $this->reportordersInterface->reportOrders($request);
    }

    public function searchByMonth(Request $request)
    {
        return $this->reportordersInterface->searchByMonth($request);
    }

    public function searchByYear(Request $request)
    {
        return $this->reportordersInterface->searchByYear($request);
    }

    public function searchByDay(Request $request)
    {
        return $this->reportordersInterface->searchByDay($request);
    }

}
