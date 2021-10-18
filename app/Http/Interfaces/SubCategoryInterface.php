<?php

namespace App\Http\Interfaces;


interface SubCategoryInterface{

public function AllSubCat();

public function AddSubCat($request);

public function EditSubCat($request);

public function UpdateSubCat($request);

public function deleteSubCat($request);

}
