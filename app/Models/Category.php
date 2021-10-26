<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    protected $fillable = ['name'];


    protected $hidden = ['created_at','updated_at'];

    public function productCat()
    {
        return $this->hasMany(Product::class,'product_id','id');
    }


    public function subCats(){
        return $this->hasMany(SubCategory::class,'category_id','id');
    }
}
