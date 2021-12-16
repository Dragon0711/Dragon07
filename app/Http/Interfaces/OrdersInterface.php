<?php

namespace App\Http\Interfaces;


interface OrdersInterface{

public function showOrder();

public function viewOrder($request);

public function acceptPaymentOrder($request);

public function cancelOrder($request);

public function adminProgressDelivery($request);

public function adminDoneDelivery($request);




public function paymentAccept();

public function ordersCanceled();

public function progressDelivery();

public function successDelivery();


/** for user **/
    public function userCancelOrder($request);

}
