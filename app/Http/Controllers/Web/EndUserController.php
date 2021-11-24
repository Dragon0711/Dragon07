<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Web\EndUserInterface;

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






}
