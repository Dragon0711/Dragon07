<?php

namespace App\Http\Repositories\Web;


use App\Http\Interfaces\web\UserOrdersInterface;
use App\Models\Order;
use Illuminate\Support\Facades\DB;


class UserOrdersRepository implements UserOrdersInterface
{

    private $orderModel;

    public function __construct(Order $order){
    $this->orderModel = $order;

    }





}
