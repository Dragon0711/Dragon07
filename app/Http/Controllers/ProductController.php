<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ProductInterface;
use Illuminate\Http\Request;


class ProductController extends Controller
{



    private $productInterface;

    public function __construct(ProductInterface $productInterface){

        $this->productInterface = $productInterface;
        $this->middleware('auth:admin');
    }


    public function AllProducts()
    {
        return $this->productInterface->AllProducts();
    }

    public function CreateProducts(Request $request)
    {
        return $this->productInterface->CreateProducts($request);
    }

    public function StoreProducts(Request $request)
    {
        return $this->productInterface->storeProducts($request);
    }

    public function EditProduct(Request $request)
    {
        return $this->productInterface->EditProduct($request);
    }


}