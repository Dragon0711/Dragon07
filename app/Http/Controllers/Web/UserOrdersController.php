<?php

namespace App\Http\Controllers\web;


use App\Http\Controllers\Controller;
use App\Http\Interfaces\web\UserOrdersInterface;
use Illuminate\Http\Request;


class UserOrdersController extends Controller
{

    private $userOrdersInterface;

    public function __construct(UserOrdersInterface $userOrdersInterface){


        $this->userOrdersInterface = $userOrdersInterface;
    }




}
