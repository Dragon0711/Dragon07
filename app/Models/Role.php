<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
//    public const ADMIN_ROLE = 1;
//    public const USER_ROLE = 2;

    public $table = 'roles';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',

    ];

    public function getTitleAttribute()
    {
        return $this->name;
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

//    public function usersCount()
//    {
//        return DB::table("role_user")->where("role_id", $this->id)->count();
//    }

}
