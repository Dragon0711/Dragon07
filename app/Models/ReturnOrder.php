<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payment_type',
        'payment_id',
        'paying_amount',
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





    protected $hidden = ['created_at','updated_at'];
}
