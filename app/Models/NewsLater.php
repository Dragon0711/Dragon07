<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsLater extends Model
{
    use HasFactory;

    protected $table = 'news_laters';

    protected $fillable = ['email'];


    public function getCreatedAtAttribute()
    {
        return Carbon::createFromTimestamp(strtotime($this->attributes['created_at']) )->diffForHumans();
    }

    protected $hidden = ['updated_at'];
}
