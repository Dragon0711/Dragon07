<?php

namespace App\Http\Interfaces;


interface UserInterface{


    public function create($request);

    public function login();

    public function UserStore($request);

    public function logout($request);

    public function profile();

    public function changePassword();

    public function updatePassword($request);

    public function profileEdit();

    public function profileUpdate($request);


}
