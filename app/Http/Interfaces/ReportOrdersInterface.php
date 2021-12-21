<?php

namespace App\Http\Interfaces;


Interface ReportOrdersInterface{


public function reportOrders($request);

public function searchByMonth($request);

public function searchByYear($request);

public function searchByDay($request);



}
