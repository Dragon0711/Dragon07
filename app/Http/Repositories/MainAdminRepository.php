<?php

namespace App\Http\Repositories;


use App\Http\Interfaces\MainAdminInterface;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class MainAdminRepository implements MainAdminInterface {

    private $AdminModel;

    public function __construct(Admin $admin){

        $this->AdminModel = $admin;
    }  //end Method


    public function profile()
    {
        $data = Admin::first();
        return view('admin.profile.view_profile',compact('data'));
    }  //end Method

    public function profileEdit()
    {
        $oldData = Admin::first();

        return view('admin.profile.edit_profile',compact('oldData'));
    } //end Method

    public function profileUpdate($request)
    {
        $validation = $request->validate([
            'email' => 'required|email|exists:admins',
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,gif|max:5000',
        ]);

        $data = Admin::first();

        if($request->file('image') && $data->image) {
            unlink(public_path('upload/admin_images/' . $data->image));
        }
        if($request->file('image')){
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['image'] = $filename;
         }
        $data->update([
            'email' => $request->email,
            'name' => $request->name,
            'image' => $data['image'],
        ]);
        $notificat = array(
          'message' => 'Profile updated successfully',
          'alert-type' => 'success',
        );
        return redirect()->route('admin.profile')->with($notificat);
    } // End Method

    public function changePassword()
    {
        return view('admin.profile.change_password');
    } //End Method

    public function updatePassword($request)
    {
        Validator::make($request->all(),[
            'oldpassword' =>'required',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
        ]);

        $admin = Admin::first();
        if (!Hash::check($request->oldpassword,$admin->password)){
            $notificat = array(
                'message' => 'password not match',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notificat);
        }
        $admin->password = Hash::make($request->password);
        $admin->save();
        Auth::logout();
        return redirect()->route('admin.logout');

    } // End Method

}
