<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Web\EndUserInterface;
use Illuminate\Http\Request;

class EndUserController extends Controller
{

    private $EndUserInterface;

    public function __construct(EndUserInterface $EndUserInterface){

         $this->EndUserInterface = $EndUserInterface;

    }

    public function index()
    {
        return $this->EndUserInterface->index();
    }

    public function applyCoupon(Request $request)
    {
        return $this->EndUserInterface->applyCoupon($request);
    }





}
