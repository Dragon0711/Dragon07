<?php

namespace App\Http\Interfaces;



interface CartInterface
{

public function addCart($request);

public function checkCart();

public function checkOut();


}
