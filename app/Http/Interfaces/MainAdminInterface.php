<?php

namespace App\Http\Interfaces;


interface MainAdminInterface{



    public function profile();

    public function profileEdit();

    public function profileUpdate($request);

    public function changePassword();

    public function updatePassword($request);



}
