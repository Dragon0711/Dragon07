<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\BrandInterface;
use Illuminate\Http\Request;

class BrandsController extends Controller
{



    private $brandInterface;

    public function __construct(BrandInterface $brandInterface){

        $this->brandInterface = $brandInterface;
        $this->middleware('auth:admin');
    }

    public function AllBrand()
    {
        return $this->brandInterface->AllBrand();
    }

    public function addBrand(Request $request)
    {
        return $this->brandInterface->addBrand($request);
    }

    public function editBrand(Request $request)
    {
        return $this->brandInterface->editBrand($request);
    }

    public function updateBrand(Request $request)
    {
        return $this->brandInterface->updateBrand($request);
    }

    public function deleteBrand(Request $request)
    {
        return $this->brandInterface->deleteBrand($request);
    }
}
