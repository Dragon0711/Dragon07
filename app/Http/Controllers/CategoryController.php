<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\CategoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categorInterfacel;

    public function __construct(CategoryInterface $categoryInterface){


        $this->categoryInterface = $categoryInterface;
    }

    public function AllCat(){
        return $this->categoryInterface->AllCat();
    }

    public function AddCat(Request $request){
        return $this->categoryInterface->AddCat($request);
    }

    public function EditCat(Request $request){
        return $this->categoryInterface->EditCat($request);
    }

    public function deleteCat(Request $request){
        return $this->categoryInterface->deleteCat($request);
    }

    public function updateCat(Request $request){
        return $this->categoryInterface->updateCat($request);
    }
}
