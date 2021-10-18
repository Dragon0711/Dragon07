<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\NewsLaterInterface;
use App\Models\Coupon;
use App\Models\NewsLater;
use Illuminate\Support\Facades\Validator;


class NewsLaterRepository implements NewsLaterInterface {

    private $newsLaterModel;
    /**
     * @var Coupon
     */


    public function __construct(NewsLater $newsLater){

        $this->newsLaterModel = $newsLater;
    }

    public function AllnewsLater()
    {
        $data =  $this->newsLaterModel::all();
        return view('admin.newslaters.index',compact('data'));
    } // End Method

    public function deletenewsLater($request)
    {
        $this->newsLaterModel::find($request->id)->delete();
            $notificat = array(
                'message' => 'this Email Successfully deleted',
                'alert-type' => 'error',
            );
        return redirect()->back()->with($notificat);
    }




    /** FRONTEND SECTION */

    public function subscriber($request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|unique:news_laters|max:100',
        ]);
        if ($validator->fails()){
            $notificat = array(
                'message' => 'this Email already Subscribe',
                'alert-type' => 'error',
            );
            return redirect()->back()->withErrors($validator)->withInput($request->all())->with($notificat);
        }
        $this->newsLaterModel->create([
            'email' => $request->email,
        ]);
        $notificat = array(
            'message' => 'Email send Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notificat);
    } // End Method



}
