<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\WishlistInterface;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    private $wishListInterFace;

    public function __construct(WishlistInterface $wishListInterFace)
    {
        $this->wishListInterFace = $wishListInterFace;
    }

    public function addWishList(Request $request)
    {
       return  $this->wishListInterFace->addWishList($request);
    }
}
