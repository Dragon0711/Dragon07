<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\NewsLaterInterface;
use Illuminate\Http\Request;


class NewsLaterController extends Controller
{



    private $newslaterInterface;

    public function __construct(NewsLaterInterface $newslaterInterface){

        $this->newslaterInterface = $newslaterInterface;
//        $this->middleware('auth:admin');
    }


    public function AllnewsLater()
    {
        return $this->newslaterInterface->AllnewsLater();
    }

    public function deletenewsLater(Request $request)
    {
        return $this->newslaterInterface->deletenewsLater($request);
    }

    public function deleteAll(Request $request){

        return $this->newslaterInterface->deleteAll($request);
    }


    /** FRONTEND SECTION */
    public function subscriber(Request $request)
    {
        return $this->newslaterInterface->subscriber($request);
    }



}
