<?php

namespace App\Http\Interfaces;


Interface AdminInterface{


public function profile();

public function profileEdit();

public function profileUpdate($request);

public function changePassword();

public function updatePassword($request);






}
