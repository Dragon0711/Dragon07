<?php


namespace App\Http\Repositories;

use App\Http\Interfaces\CartInterface;

use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;


class CartRepository implements CartInterface
{
    private $CartModel;

    public function __construct(Cart $cart)
    {
        $this->CartModel = $cart;
    }

    public function addCart($request)
    {

        $product = DB::table('products')->where('id',$request->id)->first();

        $data = array();

        if ($product->discount_price == null){

            $data['id'] = $product->id;
            $data['name'] = $product->name;
            $data['qty'] = 1;
            $data['price'] = $product->price;
            $data['weight'] =1;
            $data['options']['image'] = $product->image_1;
            $data['options']['color'] = $product->color;
            $data['options']['size'] = $product->size;
            cart::add($data);
            return response::json(['success' => 'Product added to your cart successfully']);
        }else{
            $data['id'] = $product->id;
            $data['name'] = $product->name;
            $data['qty'] = 1;
            $data['price'] = $product->discount_price;
            $data['weight'] =1;
            $data['options']['image'] = $product->image_1;
            $data['options']['color'] = $product->color;
            $data['options']['size'] = $product->size;
            cart::add($data);
            return response::json(['success' => 'Product added to your cart successfully']);
        }

    } //End Method


    public function checkCart()
    {
        $content = Cart::content();


        return view('layout.show_cart',compact('content'));
    } // End Method


    public function checkOut()
    {
      if (Auth::check()){

          $content = Cart::content();
          return view('layout.checkout',compact('content'));

      }else{
          $notificat = array(
              'message' => 'First should login ',
              'alert-type' => 'warning'
          );
          return redirect('login')->with($notificat);
      }
    }


}
