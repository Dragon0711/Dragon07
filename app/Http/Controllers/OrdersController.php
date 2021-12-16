<?php

namespace App\Http\Controllers;


use App\Http\Interfaces\OrdersInterface;
use Illuminate\Http\Request;


class OrdersController extends Controller
{
    private $ordersInterface;

    public function __construct(OrdersInterface $ordersInterface){


        $this->ordersInterface = $ordersInterface;
    }

    public function showOrder(){
        return $this->ordersInterface->showOrder();
    }

    public function viewOrder(Request $request)
    {
        return $this->ordersInterface->viewOrder($request);
    }

    public function acceptPaymentOrder(Request $request)
    {
        return $this->ordersInterface->acceptPaymentOrder($request);
    }

    public function cancelOrder(Request $request)
    {
        return $this->ordersInterface->cancelOrder($request);
    }

    public function adminProgressDelivery(Request $request)
    {
        return $this->ordersInterface->adminProgressDelivery($request);
    }

    public function adminDoneDelivery(Request $request)
    {
        return $this->ordersInterface->adminDoneDelivery($request);
    }




    public function paymentAccept()
    {
        return $this->ordersInterface->paymentAccept();
    }

    public function ordersCanceled()
    {
        return $this->ordersInterface->ordersCanceled();
    }

    public function progressDelivery()
    {
        return $this->ordersInterface->progressDelivery();
    }

    public function successDelivery()
    {
        return $this->ordersInterface->successDelivery();
    }

    /** for user **/

    public function userCancelOrder(Request $request){

        return $this->ordersInterface->userCancelOrder($request);
    }


}
