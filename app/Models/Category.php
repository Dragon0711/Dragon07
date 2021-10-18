<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    protected $fillable = ['name'];


    protected $hidden = ['created_at','updated_at'];

    public function subCats(){
        return $this->hasMany(SubCategory::class,'id','category_id');
    }
}
