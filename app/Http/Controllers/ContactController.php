<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ContactInterface;
use Illuminate\Http\Request;


class ContactController extends Controller
{



    private $contactInterface;

    public function __construct(ContactInterface $contactInterface){

        $this->contactInterface = $contactInterface;


    }


    public function contact()
    {
        return $this->contactInterface->contact();
    }

    public function ContactForm(Request $request)
    {
        return $this->contactInterface->ContactForm($request);
    }

    /*****
    * For Admin
     *******/

    public function mailBox()
    {
        return $this->contactInterface->mailBox();
    }

    public function viewMessage(Request $request)
    {
        return $this->contactInterface->viewMessage($request);
    }


}
