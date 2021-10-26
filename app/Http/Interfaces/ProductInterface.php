<?php

namespace App\Http\Interfaces;


interface ProductInterface{

public function AllProducts();

public function CreateProducts($request);

public function StoreProducts($request);

public function EditProduct($request);



}
