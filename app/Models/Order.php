<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
//    use HasFactory;

    protected $table = 'orders';

protected $fillable = [
    'user_id',
    'payment_type',
    'payment_id',
    'payment_amount',
    'balance_transaction',
    'strip_order_id',
    'subtotal',
    'total',
    'shipping',
    'vat',
    'status',
    'month',
    'day',
    'year',
    ];

   public function orderUser(){

           return $this->belongsTo(User::class,'id','user_id');
   }




    protected $hidden = ['created_at','updated_at'];
}
