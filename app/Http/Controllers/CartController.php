<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\CartInterface;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $CartInterface;

    public function __construct(CartInterface $cartInterface)
    {
         $this->CartInterface = $cartInterface;
    }

    public function addCart(Request $request)
    {
        return $this->CartInterface->addCart($request);
    }

    public function checkCart()
    {
        return $this->CartInterface->checkCart();
    }

    public function checkOut()
    {
        return $this->CartInterface->checkOut();
    }
}
