<?php

namespace App\Http\Interfaces;


interface ProductInterface{

public function AllProducts();

public function CreateProducts($request);

public function StoreProducts($request);

public function EditProduct($request);

public function UpdateProduct($request);

public function DeleteProduct($request);

public function Active($request);

public function Disable($request);


public function search($request);



}
