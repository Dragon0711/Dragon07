<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\CouponInterface;
use Illuminate\Http\Request;


class CouponController extends Controller
{



    private $couponInterface;

    public function __construct(CouponInterface $couponInterface){

        $this->couponInterface = $couponInterface;

    }


    public function AllCoupon()
    {
        return $this->couponInterface->AllCoupon();
    }

    public function AddCoupon(Request $request)
    {
        return $this->couponInterface->AddCoupon($request);
    }

    public function EditCoupon(Request $request)
    {
        return $this->couponInterface->EditCoupon($request);
    }

    public function UpdateCoupon(Request $request)
    {
        return $this->couponInterface->UpdateCoupon($request);
    }


    public function deleteCoupon(Request $request)
    {
        return $this->couponInterface->deleteCoupon($request);
    }



}
