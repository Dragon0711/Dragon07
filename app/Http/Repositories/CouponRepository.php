<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\CouponInterface;
use App\Models\Coupon;
use Illuminate\Support\Facades\Validator;


class CouponRepository implements CouponInterface {

    private $couponModel;
    /**
     * @var Coupon
     */


    public function __construct(Coupon $coupon){

        $this->couponModel = $coupon;
    }

    public function AllCoupon()
    {
        $data =  $this->couponModel::all();
        return view('admin.coupons.coupons',compact('data'));
    } // End Method

    public function AddCoupon($request)
    {
        $validator = Validator::make($request->all(),[
            'coupon' => 'required|max:500',
            'discount' => 'required',
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $this->couponModel::create([
            'coupon' => $request->coupon,
            'discount' => $request->discount,
        ]);
        $notificat = array(
            'message' => 'Coupon Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notificat);
    } // End Method


    public function EditCoupon($request)
    {
        $value = $this->couponModel::find($request->id);
        return view('admin.coupons.edit',compact('value'));
    } // End Method


    public function UpdateCoupon($request)
    {
        $validator = Validator::make($request->all(),[
            'coupon' => 'required|max:500',
            'discount' => 'required',
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $data = $this->couponModel::find($request->id);

        $data->update([
            'coupon' => $request->coupon,
            'discount' => $request->discount,
        ]);
        $notificat = array(
            'message' => 'Coupon Updated Successfully',
            'alert-type' => 'warning',
        );
        return redirect()->route('coupon')->with($notificat);
    } // End Method


    public function deleteCoupon($request)
    {
        $this->couponModel::find($request->id)->delete();
        $notificat = array(
            'message' => 'Coupon deleted Successfully',
            'alert-type' => 'error',
        );
        return redirect()->back()->with($notificat);
    } // End Method


}
