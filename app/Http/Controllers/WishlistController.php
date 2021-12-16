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

    public function viewWishList()
    {
        return $this->wishListInterFace->viewWishList();
    }

    public function deleteWishList(Request $request)
    {
        return $this->wishListInterFace->deleteWishList($request);
    }
}
