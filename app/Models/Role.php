<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function Admins(){
        return $this->hasMany(Admin::class,'id','role_id');
    }

    public function Permissions(){
        return $this->hasMany(Permission::class,'id','role_id');
    }

    protected $fillable = [
        'name',
        'description',
    ];
    protected $hidden = ['created_at','updated_at'];

}
