<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    public function productBrand()
    {
        return $this->hasMany(Product::class,'product_id','id');
    }

    protected $fillable = ['name','logo'];

    protected $hidden = ['created_at','updated_at'];

}
