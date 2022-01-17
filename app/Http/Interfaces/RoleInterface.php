<?php

namespace App\Http\Interfaces;


interface RoleInterface{



public function AllAdmins();

public function AddAdmin();

public function storeAdmin($request);

public function editAdmin($request);

public function updateAdmin($request);

public function deleteAdmin($request);

public function addRole();

public function createRole($request);

}
