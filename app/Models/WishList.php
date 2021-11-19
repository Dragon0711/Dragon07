<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory;

    protected $table = 'whishlists';

    protected $fillable = [
        'user_id',
        'product_id',
    ];

    public function UserId(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function ProductId(){
        return $this->hasMany(Product::class,'product_id','id');
    }
}
