<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\BrandInterface;
use App\Models\Brand;
use Illuminate\Support\Facades\Validator;


class BrandRepository implements BrandInterface {

    private $brandModel;
    /**
     * @var Brand
     */


    public function __construct(Brand $brand){

        $this->brandModel = $brand;
    }


    public function AllBrand(){

       $brands = $this->brandModel::all();
        return view('admin.brands.brands',compact('brands'));
    } // End Method


    public function addBrand($request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:brands|max:500',
            'logo' => 'required|mimes:jpg,jpeg,png|max:4096',
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        if ($request->file('logo')){
            $file = $request->file('logo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/brands'),$filename);
            $logo['logo'] = $filename;
        }

        $this->brandModel::create([
            'name' => $request->name,
            'logo' => $logo['logo'],
        ]);
        $notificat = array(
            'message' => 'Brand Added Successfully',
            'alert-type' => 'success',
            );
        return redirect()->back()->with($notificat);
    } //End Method

    public function editBrand($request){
        $value = $this->brandModel::find($request->id);

        return view('admin.brands.edit',compact('value'));
    } //End Method

    public function updateBrand($request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:brands|max:500',
            'logo' => 'required|mimes:jpg,jpeg,png|max:4096',
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $data = $this->brandModel::find($request->id);
        if($request->file('logo') && $data->logo){
            unlink(public_path('upload/brands/'.$data->logo));
        }
        if ($request->file('logo')){
            $file = $request->file('logo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/brands'),$filename);
            $logo['logo'] = $filename;
        }

        $data->update([
            'name' => $request->name,
            'logo' => $logo['logo'],
        ]);
        $notificat = array(
            'message' => 'Brand Added Successfully',
            'alert-type' => 'success',
        );
        return redirect('admin/brands')->with($notificat);

    }

    public function deleteBrand($request){

        $deletelogo = $this->brandModel::where('id',$request->id)->first();

        $path = public_path("upload/brands/$deletelogo->logo");
        if (is_file($path)){
        unlink($path);
        }

        $deletelogo->delete();
        $notificat = array(
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notificat);
    } //End Method

}
