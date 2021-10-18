<?php

namespace App\Http\Interfaces;


interface UserInterface{

    public function logout();

    public function profile();

    public function changePassword();

    public function updatePassword($request);

    public function profileEdit();

    public function profileUpdate($request);


}
