<?php

namespace App\Http\Interfaces;


interface CouponInterface{

public function AllCoupon();

public function AddCoupon($request);

public function EditCoupon($request);

public function UpdateCoupon($request);

public function deleteCoupon($request);





}
