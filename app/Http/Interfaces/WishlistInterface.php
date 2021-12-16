<?php

namespace App\Http\Interfaces;



interface WishlistInterface
{

public function addWishList($request);

public function viewWishList();

public function deleteWishList($request);


}
