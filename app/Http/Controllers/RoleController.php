<?php

namespace App\Http\Controllers;


use App\Http\Interfaces\RoleInterface;
use Illuminate\Http\Request;


class RoleController extends Controller
{



    private $roleInterface;

    public function __construct(RoleInterface $roleInterface){

        $this->roleInterface = $roleInterface;

//        $this->middleware('auth:admin');
    }


    public function AllAdmins()
    {
        return $this->roleInterface->AllAdmins();
    }

    public function AddAdmin()
    {
        return $this->roleInterface->AddAdmin();
    }



}
