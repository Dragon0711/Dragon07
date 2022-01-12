<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\ContactInterface;
use App\Models\Contact;
use App\Models\Coupon;
use Illuminate\Support\Facades\Validator;


class ContactRepository implements ContactInterface {


    private $contactModel;

    public function __construct(Contact $contact){

        $this->contactModel = $contact;

    }


    public function contact()
    {
        return view('layout.contact');
    }// END METHOD

    public function ContactForm($request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|regex:/(01)[0-9]{11}/',
            'message' => 'required|min:7|max:1500',
        ]);
        if ($validator->failed()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $contact = new Contact;
        $contact['name'] = $request->name;
        $contact['email'] = $request->email;
        $contact['phone'] = $request->phone;
        $contact['message'] = $request->message;
        $contact->save();

        $notificat = array(
            'message' => 'Your Message Send Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notificat);
    }// END METHOD


    /*****
    * For Admin
     ******/

    public function mailBox(){

        $allMessage = $this->contactModel->all();
        return view('admin.mail_box.all_messages',compact('allMessage'));

    }

    public function viewMessage($request)
    {
        $message = $this->contactModel::where('id',$request->id)->first();

        return view('admin.mail_box.view_message',compact('message'));
    }
}
