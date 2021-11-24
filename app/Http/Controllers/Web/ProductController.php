<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Web\ProductInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productInterface;

    public function __construct(ProductInterface $productInterface)
    {
        return $this->productInterface = $productInterface;
    }

    public function viewProduct(Request $request)
    {
        return $this->productInterface->viewProduct($request);
    }


}
