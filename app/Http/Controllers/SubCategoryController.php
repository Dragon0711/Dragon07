<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\SubCategoryInterface;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    private $subCatInterface;

    public function __construct(SubCategoryInterface $subCatInterface){

//        $this->middleware('auth:admin');

        $this->subCatInterface = $subCatInterface;

    }

    public function AllSubCat()
    {
        $this->authorize('viewAll',SubCategory::class);

        return $this->subCatInterface->AllSubCat();
    }

    public function AddSubCat(Request $request)
    {
        $this->authorize('create',SubCategory::class);


        return $this->subCatInterface->AddSubCat($request);
    }

    public function EditSubCat(Request $request)
    {
        $this->authorize('edit',SubCategory::class);

        return $this->subCatInterface->EditSubCat($request);
    }

    public function UpdateSubCat(Request $request)
    {
        $this->authorize('update',SubCategory::class);

        return $this->subCatInterface->UpdateSubCat($request);
    }

    public function deleteSubCat(Request $request)
    {
        $this->authorize('delete',SubCategory::class);

        return $this->subCatInterface->deleteSubCat($request);
    }
}
