<?php

namespace App\Http\Repositories;


use App\Http\Interfaces\AdminInterface;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AdminRepository implements AdminInterface {


        private $admin;


    public function __construct(Admin $admin){

         $this->admin = $admin;
    }


    public function AllAdmins()
    {
//        $admins = DB::table('admins')->where('role_id', '!=' ,1)->get();
//        return view('admin.admins.view_all_admins',compact('admins'));

        $admins = DB::table('admins')
            ->join('permission','admins.role_id','permission.role_id')
            ->select('permission.*','admins.*')
            ->get();

        return view('admin.admins.view_all_admins',compact('admins'));
    } // END METHOD

    public function AddAdmin($request)
    {
        $roles = DB::table('roles')->get();

        return view('admin.admins.add_admin',compact('roles'));
    } // END METHOD


    public function StoreAdmin($request)
    {
        $validaion = validator::make($request->all(),[
            'name' => 'required|max:255',
            'email' => 'required|unique',
            'password' => 'required|min:6',
            'role_id' =>'required',
        ]);
        if ($validaion->failed()){
            return redirect()->back()->withErrors($validaion)->withInput($request->all());
        }

        $admin = new Admin;
        $admin['name'] = $request->name;
        $admin['email'] = $request->email;
        $admin['password'] = Hash::make($request->password);
        $admin['role_id'] = $request->role_id;
        $admin->save();
//        DB::table('admins')->insert($admin);

        // Insert to Permission
        $role = array();
        $role['role_id'] = $request->role_id;
        $role['brands'] = $request->brands;
        $role['categories'] = $request->categories;
        $role['subcategories'] = $request->subcategories;
        $role['coupons'] = $request->coupons;
        $role['news_laters'] = $request->news_laters;
        $role['orders'] = $request->orders;
        $role['products'] = $request->products;

        DB::table('permission')->insert($role);

        $notificat = array(
            'message' => 'admin added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.admins')->with($notificat);

    } // END METHOD

    public function DeleteAdmin($request)
    {
        $deleteAdmin = DB::table('admins')
            ->join('permission','admins.role_id','permission.role_id')
            ->where('admins.role_id','permission.role_id',$request->role_id)->delete();



        $notificat = array(
            'message' => 'admin Deleted',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notificat);
    }
}
