<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\MainAdminInterface;
use Illuminate\Http\Request;

class MainAdminController extends Controller
{
    private  $mainAdminInterface;

    public function __construct(MainAdminInterface $mainAdminInterface){
        $this->mainAdminInterface = $mainAdminInterface;
    }



    public function profile(){
        return $this->mainAdminInterface->profile();
    }

    public function profileEdit(){
        return $this->mainAdminInterface->profileEdit();
    }

    public function profileUpdate(Request $request){
        return $this->mainAdminInterface->profileUpdate($request);
    }

    public function changePassword(){
        return $this->mainAdminInterface->changePassword();
    }

    public function updatePassword(Request $request){
        return $this->mainAdminInterface->updatePassword($request);
    }
}
