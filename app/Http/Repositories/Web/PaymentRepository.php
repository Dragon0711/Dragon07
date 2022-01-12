<?php


namespace App\Http\Repositories\Web;



use App\Http\Interfaces\Web\PaymentInterface;
use App\Mail\InvoiceMail;
use Illuminate\Support\Facades\Auth;
use Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
Use Session;

class PaymentRepository implements PaymentInterface
{



    public function __construct()
    {


    }


    public function PaymentInf()
    {
        return view('layout.payment');
    }

    public function PaymentProcess($request)
    {

        $data[] = array();

        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['payment'] = $request->payment;

        //dd($data);
        if ($request->payment == 'visa')
        {
            return view('layout.payment.visa',compact('data'));

        }elseif ($request->payment == 'paypal')
        {

        }elseif ($request->payment == 'cache')
        {
            return view('layout.payment.cache',compact('data'));

        }else
        {
            echo 'will pay Cash';
        }



    }// END METHOD



    public function PaymentCharge($request)
    {
        $total = $request->total;
        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/apikeys
        \Stripe\Stripe::setApiKey('sk_test_51K4oh8HOkTRiT4zhEV6iYY8vxL5xIwxrpCJJYiyXWbnZRVuEwg7gYCbCjIh1klKxtXPM3eq0aMXhVoxvGBVaoGHN00g4LlrUDy');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => $total*100,
            'currency' => 'usd',
            'description' => 'dehsa magazin ',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);
//        dd($charge);

        /*************  Insert into Orders Table *************/
        $data = array();
        $data['user_id'] = Auth::id();
        $data['payment_id'] = $charge->payment_method;
        $data['paying_amount'] = $charge->amount;
        $data['balance_transaction'] = $charge->balance_transaction;
        $data['strip_order_id'] = $charge->metadata->order_id;
        $data['total'] = $request->total;
        $data['status_code'] = mt_rand(100000,999999);
        $data['payment_type'] = $request->payment_type;

        if (Session::has('coupon')){
            $data['subtotal'] = Session::get('coupon')['balance'];
        }else
            $data['subtotal'] = Cart::subtotal();

        $data['status'] = 0;
        $data['day'] = date('d-m-y');
        $data['month'] = date('F');
        $data['year'] = date('Y');

        $order_id = DB::table('orders')->insertGetId($data);

        /*************  SEND  info Mail to USER *************/

        $email = Auth::user()->email;

            Mail::to($email)->send(new InvoiceMail($data));



        /********  insert into shipping  *******/
        $shipping = array();
        $shipping['order_id'] = $order_id;
        $shipping['ship_name'] = $request->ship_name;
        $shipping['ship_phone'] = $request->ship_phone;
        $shipping['ship_email'] = $request->ship_email;
        $shipping['ship_address'] = $request->ship_address;
        $shipping['ship_city'] = $request->ship_city;
        DB::table('shipping')->insert($shipping);


        //insert into order_details table
        $content = Cart::content();

        $details = array();
        foreach ($content as $row){
        $details['order_id'] = $order_id;
        $details['product_id']  = $row->id;
        $details['product_name']  = $row->name;
        $details['color']  = $row->options->color;
        $details['size']  = $row->options->size;
        $details['quantity']  = $row->qty;
        $details['single_price']  = $row->price;
        $details['total_price']  = $row->qty*$row->price;

        DB::table('order_details')->insert($details);
        }

            Cart::destroy();

            if (session::has('coupon')){
                session::forget('coupon');
            }
        $notificat = array(
            'message' => 'order successfully done',
            'alert-type' => 'success'
        );
        return Redirect('/')->with($notificat);


    } /***** End Method ******/


    public function PaymentCache($request)
    {


        /*************  Insert into Orders Table *************/
        $data = array();
        $data['user_id'] = Auth::id();
        $data['total'] = $request->total;
        $data['status_code'] = mt_rand(100000,999999);
        $data['payment_type'] = $request->payment_type;

        if (Session::has('coupon')){
            $data['subtotal'] = Session::get('coupon')['balance'];
        }else
            $data['subtotal'] = Cart::subtotal();

        $data['status'] = 0;
        $data['day'] = date('d-m-y');
        $data['month'] = date('F');
        $data['year'] = date('Y');

        $order_id = DB::table('orders')->insertGetId($data);


        /********  insert into shipping  *******/
        $shipping = array();
        $shipping['order_id'] = $order_id;
        $shipping['ship_name'] = $request->ship_name;
        $shipping['ship_phone'] = $request->ship_phone;
        $shipping['ship_email'] = $request->ship_email;
        $shipping['ship_address'] = $request->ship_address;
        $shipping['ship_city'] = $request->ship_city;
        DB::table('shipping')->insert($shipping);


        //insert into order_details table
        $content = Cart::content();

        $details = array();
        foreach ($content as $row){
            $details['order_id'] = $order_id;
            $details['product_id']  = $row->id;
            $details['product_name']  = $row->name;
            $details['color']  = $row->options->color;
            $details['size']  = $row->options->size;
            $details['quantity']  = $row->qty;
            $details['single_price']  = $row->price;
            $details['total_price']  = $row->qty*$row->price;

            DB::table('order_details')->insert($details);
        }

        Cart::destroy();

        if (session::has('coupon')){
            session::forget('coupon');
        }
        $notificat = array(
            'message' => 'order successfully done',
            'alert-type' => 'success'
        );
        return Redirect('/')->with($notificat);
    }
}
