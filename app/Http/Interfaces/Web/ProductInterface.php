<?php

namespace App\Http\Interfaces\Web;


Interface ProductInterface {


public function viewProduct($request);

public function addProduct($request);

public function deleteCart($rowId);

public function updateQytCart($request);

public function showCatsProducts($request);

public function showSubCatsProducts($request);

}
