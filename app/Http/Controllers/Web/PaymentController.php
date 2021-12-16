<?php

namespace App\Http\Controllers\web;



use App\Http\Controllers\Controller;
use App\Http\Interfaces\Web\PaymentInterface;
use Illuminate\Http\Request;


class PaymentController extends Controller
{

    private $paymentInterface;

    public function __construct(PaymentInterface $paymentInterface)
    {
        return $this->paymentInterface = $paymentInterface;
    }



    public function PaymentInf()
    {
        return $this->paymentInterface->PaymentInf();
    }

    public function PaymentProcess(Request $request)
    {
        return $this->paymentInterface->PaymentProcess($request);
    }
    public function PaymentCharge(Request $request)
    {
        return $this->paymentInterface->PaymentCharge($request);
    }


}
