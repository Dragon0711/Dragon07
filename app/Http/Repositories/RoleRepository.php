<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\RoleInterface;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class RoleRepository implements RoleInterface {


    private $rolelModel;

    public function __construct(Role $role , User $user){

        $this->rolelModel = $role;
    }

    public function AllAdmins()
    {

        $admins = DB::table('users')
            ->join('permission','users.role_id','permission.role_id')
            ->select('permission.*')
            ->get();

        return view('admin.admins.view_all_admins',compact('admins'));
    } // END METHOD


    public function AddAdmin()
    {
        $roles = DB::table('roles')->get();

        return view('admin.admins.add_admin',compact('roles'));
    } // END METHOD

}
