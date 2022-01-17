<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\AdminInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    private  $adminInterface;

    public function __construct(AdminInterface $adminInterface){

//        $this->middleware('guest:admin')->except('logout');

        $this->adminInterface = $adminInterface;
    }


    public function loginForm(){
        return view('admin.auth.login');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function loginStore(Request $request)
    {
        $request->validate([
            'email' => 'required|string|exists:admins,email',
            'password' => 'required|string|min:5|max:30',
        ]);
        $admin = $request->only('email' , 'password');
        if (Auth::guard('admin')->attempt($admin)){
            return redirect()->route('admin.dashboard')->with('success' , 'Successfully');
        }else{
            return  redirect()->back()->with('fail' , 'incorrect Username Or Password');
        }


    }



    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();
//        return redirect()->route('admin.login');
//        Auth::guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notificat = array(
            'message' => 'successfully logout',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.login')->with($notificat);
    } // END METHOD




    public function profile(){
        return $this->adminInterface->profile();
    }

    public function profileEdit(){
        return $this->adminInterface->profileEdit();
    }

    public function profileUpdate(Request $request){
        return $this->adminInterface->profileUpdate($request);
    }

    public function changePassword(){
        return $this->adminInterface->changePassword();
    }

    public function updatePassword(Request $request){
        return $this->adminInterface->updatePassword($request);
    }

}
