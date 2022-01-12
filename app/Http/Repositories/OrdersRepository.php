<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\OrdersInterface;
use App\Models\Order;
use App\Models\ReturnOrder;
use Illuminate\Support\Facades\DB;


class OrdersRepository implements OrdersInterface{


    private $orderModel;

    public function __construct(Order $order){
    $this->orderModel = $order;

    }//END METHOD


    public function showOrder()
    {
        $orders = DB::table('orders')->where('status',0)->get();

        return view('admin.orders.all_orders',compact('orders'));
    }//END METHOD

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
    }//END METHOD

    public function cancelOrder($request)
    {
        $this->orderModel::where('id',$request->id)->update(['status'=>4]);

        $notificat = array(
            'message' => 'Order Cancelled',
            'alert-type' => 'error'
        );
        return redirect()->route('showNewOrder')->with($notificat);
    }//END METHOD

    public function adminProgressDelivery($request)
    {
        $this->orderModel::where('id',$request->id)->update(['status'=>2]);

        $notificat = array(
            'message' => 'Order Send To Delivery',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notificat);
    }//END METHOD

    public function adminDoneDelivery($request)
    {
        /***** 1- another way to calculate quantity use anyone u like ******/
        $orderDetailId = DB::table('order_details')
            ->join('products','order_details.product_id','products.id')
            ->where('order_id',$request->id)
            ->update(['products.quantity'=> DB::raw('products.quantity-' . 'order_details.quantity')]);


        /***** 2- another way to calculate quantity use anyone u like ******/
//      $orderDetailId = DB::table('order_details')->where('order_id',$request->id)->get();
//      foreach ($orderDetailId as $row){
//          DB::table('products')->where('id',$row->product_id)
//              ->update(['quantity' => DB::raw('quantity-'.$row->quantity)]);
//      }


        $this->orderModel::where('id',$request->id)->update(['status'=>3]);

        $notificat = array(
            'message' => 'Delivery Done',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notificat);
    }//END METHOD





    public function paymentAccept()
    {
      $acceptPayment =  DB::table('orders')->where('status',1)->get();

        return view('admin.orders.orders_payment_accepted',compact('acceptPayment'));
    }//END METHOD


    public function ordersCanceled()
    {
      $ordersCanceled =  DB::table('orders')->where('status',4)->get();

        return view('admin.orders.orders_canceled',compact('ordersCanceled'));
    }//END METHOD

    public function progressDelivery()
    {
        $progressDelivery =  DB::table('orders')->where('status',2)->get();

        return view('admin.orders.progress_delivery',compact('progressDelivery'));
    }//END METHOD

    public function successDelivery()
    {

        $successDelivery =  DB::table('orders')->where('status',3)->get();

        return view('admin.orders.success_delivery',compact('successDelivery'));
    }//END METHOD



    public function returnedOrder()
    {
        $orderReturned = DB::table('return_orders')
        ->join('users','return_orders.user_id','users.id')
            ->select('return_orders.*','users.name')
            ->get();

        return view('admin.returnOrders.all_order',compact('orderReturned'));
    }




    /************* for user cancel order *************/

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
    }//END METHOD

    public function userTrackOrder($request)
    {
        $statusNumber = $request->id;
//        dd($statusNumber);

       $status = DB::table('orders')->where('status_code',$statusNumber)->first();
//        dd($status);

        return view('layout.status_delivery',compact('status'));
    }//END METHOD

    public function userReturnOrder($request)
    {
        $returnOrder = DB::table('orders')->where('id',$request->id)->get();
//        dd($returnOrder);


        foreach($returnOrder as $value)
        {
            ReturnOrder::create([
                'user_id' => $value->user_id,
                'payment_type' => $value->payment_type,
                'payment_id' => $value->payment_id,
                'paying_amount' => $value->paying_amount,
                'balance_transaction' => $value->balance_transaction,
                'strip_order_id' => $value->strip_order_id,
                'subtotal' => $value->subtotal,
                'total' => $value->total,
                'shipping' => $value->shipping,
                'vat' => $value->vat,
                'status' => 'returned',
                'day' => date('d-m-y'),
                'month' => date('F'),
                'year' => date('Y'),
            ]);
        }

        DB::table('orders')->where('id',$request->id)->delete();


        $notificat = array(
            'message' => 'Order returned',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notificat);

    }

}
