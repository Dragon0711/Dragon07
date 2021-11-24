<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecentlyView extends Model
{
    use HasFactory;

    protected $table = 'recently_views';

    protected $fillable = [

        'user_id',
        'product_id',
    ];

    public function UserView(){
        return $this->belongsTo(User::class,'user_id','id');
    }

//    ده ربط بين جدولين الريسنتلى و المنتجات من خلال الاى دى . الفورين كى ف جدول الريسنتلي برودكات اى دى بيرجع لجدول البروداكت همود الايدى
    public function ProductView(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
