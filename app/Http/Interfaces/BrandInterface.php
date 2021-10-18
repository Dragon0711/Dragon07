<?php

namespace App\Http\Interfaces;


interface BrandInterface{

    public function AllBrand();

    public function addBrand($request);

    public function editBrand($request);

    public function updateBrand($request);

    public function deleteBrand($request);



}
