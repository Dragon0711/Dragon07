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

    public function create(Request $request){
        return $this->userInterfaceModel->create($request);
    }

    public function login(){
        return $this->userInterfaceModel->login();
    }

    public function UserStore(Request $request){
        return $this->userInterfaceModel->UserStore($request);
    }

    public function logout(Request $request){
        return $this->userInterfaceModel->logout($request);
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

