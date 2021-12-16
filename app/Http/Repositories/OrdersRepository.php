<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\OrdersInterface;
use App\Models\Order;
use Illuminate\Support\Facades\DB;


class OrdersRepository implements OrdersInterface{


    private $orderModel;

    public function __construct(Order $order){
    $this->orderModel = $order;

    }


    public function showOrder()
    {
        $orders = DB::table('orders')->where('status',0)->get();

        return view('admin.orders.all_orders',compact('orders'));
    }

    public function viewOrder($request)
    {
        $order = DB::table('orders')
            ->join('users','orders.user_id','users.id')
            ->select('orders.*','users.name','users.phone')
            ->where('orders.id',$request->id)
            ->first();
//        dd($order);

        $shipping = DB::table('shipping')->where('order_id',$request->id)->first();
//        dd($shipping);

        $detalis = DB::table('order_details')
                 ->join('products','order_details.product_id','products.id')
                 ->select('order_details.*','products.name','products.code','products.image_1')
                 ->where('order_details.order_id',$request->id)
                 ->get();
//        dd($detalis);

        return view('admin.orders.view_order',compact('order','shipping','detalis'));
    }

    public function acceptPaymentOrder($request)
    {
        $this->orderModel::where('id',$request->id)->update(['status'=>1]);

        $notificat = array(
            'message' => 'Payment Accepted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('showNewOrder')->with($notificat);
    }

    public function cancelOrder($request)
    {
        $this->orderModel::where('id',$request->id)->update(['status'=>4]);

        $notificat = array(
            'message' => 'Order Cancelled',
            'alert-type' => 'error'
        );
        return redirect()->route('showNewOrder')->with($notificat);
    }

    public function adminProgressDelivery($request)
    {
        $this->orderModel::where('id',$request->id)->update(['status'=>2]);

        $notificat = array(
            'message' => 'Order Send To Delivery',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notificat);
    }

    public function adminDoneDelivery($request)
    {
        $this->orderModel::where('id',$request->id)->update(['status'=>3]);

        $notificat = array(
            'message' => 'Delivery Done',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notificat);
    }





    public function paymentAccept()
    {
      $acceptPayment =  DB::table('orders')->where('status',1)->get();

        return view('admin.orders.orders_payment_accepted',compact('acceptPayment'));
    }


    public function ordersCanceled()
    {
      $ordersCanceled =  DB::table('orders')->where('status',4)->get();

        return view('admin.orders.orders_canceled',compact('ordersCanceled'));
    }

    public function progressDelivery()
    {
        $progressDelivery =  DB::table('orders')->where('status',2)->get();

        return view('admin.orders.progress_delivery',compact('progressDelivery'));
    }

    public function successDelivery()
    {
        $successDelivery =  DB::table('orders')->where('status',3)->get();

        return view('admin.orders.success_delivery',compact('successDelivery'));
    }

    /** for user cancel order**/

    public function userCancelOrder($request)
    {

        //if want cancel one product but should send product_id first from blade
//       $prodId =  DB::table('order_details')
//           ->select('order_details.*')
//            ->where('order_details.product_id','=',$request->id)->delete();



        DB::table('orders')->where('id',$request->id)->update(['status'=>4]);

        $notificat = array(
            'message' => 'Order Canceled',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notificat);
    }

}
