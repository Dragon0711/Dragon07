<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\RoleInterface;
use App\Models\Admin;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class RoleRepository implements RoleInterface {


    private $roleModel;
    private $adminModel;

    public function __construct(Role $role , Admin $admin){

        $this->roleModel = $role;

        $this->adminModel = $admin;
    }

    public function AllAdmins()
    {


        $admins = $this->adminModel::where('role_id' ,'!=', 0)->get();
//        $admins = DB::table('users')
//            ->join('roles','users.role_id','roles.id')
//            ->select('users.*','roles.name as roleName')
//            ->where('role_id' , '!=', 0)->get();
//        dd($admins);

        return view('admin.admins.view_all_admins',compact('admins'));
    } // END METHOD


    public function AddAdmin()
    {
        $permissions = Permission::all();
        $roles = DB::table('roles')->get();

        return view('admin.admins.add_admin',compact('roles','permissions'));
    } // END METHOD

    public function storeAdmin($request)
    {
         $data = $request->all();

         $validator = Validator::Make($request->all(),[
             'name' => 'required|max:255',
             'email' => 'required|unique:users|email',
             'phone' => 'required',
             'password' => 'required|min:5|max:15',
             'role_id' => 'required|exists:roles,id',
         ]);

         if ($validator->fails()){
             return redirect()->back()->withErrors($validator)->withInput($request->all());
         }

          $admin = new Admin();
          $admin['name'] = $request->name;
          $admin['email'] = $request->email;
          $admin['phone'] = $request->phone;
          $admin['password'] = Hash::make($request->password);
          $admin['role_id'] = $request->role_id;
          $admin->save();

            $notificat = array(
                'message' => 'Role added Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notificat);

    } //END METHOD


    public function editAdmin($request)
    {

        $data =  $this->adminModel::findOrFail($request->id);
        $roles = $this->roleModel::all();
        return view('admin.admins.edit_admin',compact('data','roles'));
    } //END METHOD


    public function updateAdmin($request)
    {

        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required',
//            'password' => 'min:5|max:255',
            'role_id' => 'required|exists:roles,id',
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $upadmin = $this->adminModel::findOrFail($request->id);

        $upadmin->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
//            'password' => $request->password,
            'role_id' => $request->role_id,
            'user_type' => 1,

        ]);
        $notificat = array(
            'message' => 'Admin updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.admins')->with($notificat);
    } // END METHOD



    public function deleteAdmin($request)
    {

       $this->userModel::findOrFail($request->id)->delete();

        $notificat = array(
            'message' => 'Admin deleted Successfully',
            'alert-type' => 'warning'
        );
        return redirect()->route('all.admins')->with($notificat);
    } // END METHOD


    public function addRole()
    {
        $permissions = Permission::all();
        return view('admin.admins.add_role',compact('permissions'));

    } // END METHOD

    public function createRole($request)
    {
      $permission   = $request->id;
        //dd($permission);

        $validator = Validator::make($request->all(),[
            'role_name' => 'required|unique:roles|max:255',
            'id' => 'required|exists:permissions',
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $role = new Role();
        $role['role_name'] = $request->role_name;
        $role->save();

        $role->permissions()->attach($permission);

        $notificat = array(
            'message' => 'Role added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notificat);

    } // END METHOD


}
