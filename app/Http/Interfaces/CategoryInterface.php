<?php

namespace App\Http\Interfaces;


interface CategoryInterface{

    public function AllCat();

    public function AddCat($request);

    public function EditCat($request);

    public function updateCat($request);

    public function deleteCat($request);

}
