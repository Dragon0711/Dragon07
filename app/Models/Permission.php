<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    public function role(){
        return $this->belongsTo(Role::class,'role_id','id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    protected $fillable = [
        'brands',
        'categories',
        'subcategories',
        'coupons',
        'news_laters',
        'orders',
        'products',



    ];
}
