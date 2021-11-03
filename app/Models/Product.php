<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;



    public function categoryT(){

        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function brandT(){

        return $this->belongsTo(Brand::class,'brand_id','id');
    }

    public function subCat(){
        return $this->belongsTo(subCategory::class,'subcategory_id','id');
    }

    protected $fillable = [
        'name',
        'code',
        'price',
        'discount_price',
        'quantity',
        'desc',
        'color',
        'size',
        'video',
        'image_1','image_2','image_3',
        'main_slider','mid_slider',
        'hot_deal','best_rate',
        'trend','status',
        'category_id',
        'subcategory_id',
        'brand_id'];

    protected $hidden = ['created_at','updated_at'];
}
