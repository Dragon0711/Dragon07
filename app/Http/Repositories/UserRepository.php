<?php

namespace App\Http\Repositories;


use App\Http\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;




class UserRepository implements UserInterface {

    private $userModel;

    public function __construct(User $user){

        $this->userModel = $user;
    }  //end Method


    public function logout()
    {
        Auth::logout();

        $notificat = array(
            'message' => 'successfully logout',
            'alert-type' => 'success'
        );
        return redirect()->route('login')->with($notificat);
//        return view('auth.login',['guard' => 'user']);
    }  //end Method

    public function profile()
    {
        $id = auth::user()->id;
        $user = $this->userModel::find($id);

        return view('user.profile.view_profile',compact('user'));
    }  //end Method

    public function profileEdit()
    {
        $id = auth::user()->id;
        $data = $this->userModel::find($id);

        return view('user.profile.edit_profile',compact('data'));
    }  //end Method


    public function changePassword(){
        return view('user.profile.change_password');
    } //end Method

    public function updatePassword($request){
        $validation = $request->validate([
            'oldpassword' =>'required',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
        ]);

            $user = Auth::user();
        if (!Hash::check($request->oldpassword,$user->password)){
            $notificat = array(
                'message' => 'password not match',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notificat);
        }
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login');


    } //end Method


    public function profileUpdate($request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'image' => 'mimes:jpg,png,gif|image|max:5000',
        ]);

        $data = $this->userModel::find(Auth::user()->id);

//        $path = $data->image;
//        if ($request->hasFile('image')){
//            Storage::delete($path);
//            $path = Storage::putFile('upload/user_images',$request->File('image'));
//        }

          /** check if old image exists delete before add new */
        if($request->file('image') && $data->image) {
            unlink(public_path('upload/user_images/' . $data->image));
        }

        if ($request->file('image')){
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['image'] = $filename;
        }

        $data->update([
            'name' => $request->name,
            'image' => $data['image'],
//            'image' => $path,

        ]);
        $notificat = array(
            'message' => 'profile updated successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('user.profile')->with($notificat);
    } //end Method
}
