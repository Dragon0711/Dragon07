<?php

namespace App\Http\Repositories;


use App\Http\Interfaces\UserInterface;
use App\Models\User;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserRepository implements UserInterface {

    private $userModel;

    public function __construct(User $user){

        $this->userModel = $user;
    }  //end Method



    public function create($request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'phone' => 'required', 'regex:/(01)[0-9]{11}/',
            'password' => 'required', 'string', 'min:8', 'confirmed',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $user = new User();

            $user['name'] = $request->name;
            $user['email'] = $request->email;
            $user['phone'] = $request->phon;
            $user['role_id'] = 0;
            $user['user_type'] = 0;
            $user['password'] = Hash::make($request->password);
        $user->save();

        Auth::logout();
        $notificat = array(
            'message' => 'login to your new account',
            'alert-type' => 'success'
        );
        return redirect()->route('login')->with($notificat);
    }




    public function login()
    {
        return view('auth.login');
    }

    public function UserStore($request){

        if(Auth::guard()->attempt(['email' =>$request->email,'password' =>$request->password]))
        {

            return redirect()->route('dashboard');
        }
        else{
            return redirect()->back();
        }
    }




    public function logout($request)
    {
        Auth::logout();
//        Auth::guard()->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notificat = array(
            'message' => 'successfully logout',
            'alert-type' => 'success'
        );
        return redirect()->route('login')->with($notificat);

    }  //end Method


    public function profile()
    {
        //check if still login or session finished . if try go to profile nd session finished will give error
        if (Auth::user()){
            $id = auth::user()->id;

        $user = $this->userModel::findOrFail($id);

        return view('user.profile.view_profile',compact('user'));
        }
        else{
            return redirect('login');
        }
    }  //end Method

    public function profileEdit()
    {
        if (Auth::user()){
        $id = Auth::user()->id;
        $data = $this->userModel::find($id);

        return view('user.profile.edit_profile',compact('data'));
        }
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
