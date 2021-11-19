<?php


namespace App\Http\Repositories;

use App\Http\Interfaces\WishlistInterface;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class WishlistRepository implements WishlistInterface
{
    private $wishListModel;

    public function __construct(WishList $wishList)
    {
        $this->wishListModel = $wishList;
    }


    public function addWishList($request)
    {
        $userId = Auth::id();
        $check = DB::table('whishlists')->where('user_id',$userId)
            ->where('product_id',$request->id)->first();

            $data = array(
                'user_id' => $userId,
                'product_id' => $request->id,
            );


            if (Auth::Check()) {

                if ($check) {
                    $notificat = array(
                        'message' => 'Already Added before',
                        'alert-type' => 'warning',
                    );
                    return redirect()->back()->with($notificat);

                }else{

                    DB::table('whishlists')->insert($data);
                    $notificat = array(
                        'message' => 'Successfully Added',
                        'alert-type' => 'success',
                    );
                    return redirect()->back()->with($notificat);

                }


            }else{
                $notificat = array(
                    'message' => 'Go Login First ^_^',
                    'alert-type' => 'error',
                );
                return redirect(route('login'))->with($notificat);

            }


    }
}
