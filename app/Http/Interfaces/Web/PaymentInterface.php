<?php

namespace App\Http\Interfaces\Web;


Interface PaymentInterface {


public function PaymentInf();


public function PaymentProcess($request);


public function PaymentCharge($request);


public function PaymentCache($request);



}
