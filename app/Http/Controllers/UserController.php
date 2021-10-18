<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\UserInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $userInterfaceModel;

    public function __construct(UserInterface $userInterface){
        $this->userInterfaceModel = $userInterface;
    }

    public function logout(){
        return $this->userInterfaceModel->logout();
    }

    public function profile(){
        return $this->userInterfaceModel->profile();
    }

    public function changePassword(){
        return $this->userInterfaceModel->changePassword();
    }

    public function updatePassword(Request $request){
        return $this->userInterfaceModel->updatePassword($request);
    }

    public function profileEdit(){
        return $this->userInterfaceModel->profileEdit();
    }

    public function profileUpdate(Request $request)
    {
        return $this->userInterfaceModel->profileUpdate($request);
    }
}

