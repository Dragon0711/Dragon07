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

    public function addProduct(Request $request)
    {
        return $this->productInterface->addProduct($request);
    }

    public function deleteCart($rowId)
    {
        return $this->productInterface->deleteCart($rowId);
    }

    public function updateQytCart(Request $request)
    {
        return $this->productInterface->updateQytCart($request);
    }

    public function showCatsProducts(Request $request)
    {
        return $this->productInterface->showCatsProducts($request);
    }

    public function showSubCatsProducts(Request $request)
    {
        return $this->productInterface->showSubCatsProducts($request);
    }
}
