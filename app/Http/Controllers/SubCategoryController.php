<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\SubCategoryInterface;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    private $subCatInterface;

    public function __construct(SubCategoryInterface $subCatInterface){

        $this->middleware('auth:admin');

        $this->subCatInterface = $subCatInterface;

    }

    public function AllSubCat()
    {
        return $this->subCatInterface->AllSubCat();
    }

    public function AddSubCat(Request $request)
    {
        return $this->subCatInterface->AddSubCat($request);
    }

    public function EditSubCat(Request $request)
    {
        return $this->subCatInterface->EditSubCat($request);
    }

    public function UpdateSubCat(Request $request)
    {
        return $this->subCatInterface->UpdateSubCat($request);
    }

    public function deleteSubCat(Request $request)
    {
        return $this->subCatInterface->deleteSubCat($request);
    }
}
