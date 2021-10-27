<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\CategoryInterface;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;


class CategoryRepository implements CategoryInterface{

    private $categoryModel;

    public function __construct(Category $category){

        $this->categoryModel = $category;
    }


    public function AllCat(){

       $categories = $this->categoryModel::all();
        return view('admin.category.category',compact('categories'));
    } // End Method


    public function AddCat($request)
    {
        $validation = Validator::make($request->all(),[
            'name' => 'required|unique:categories|max:500',
        ]);
        if ($validation->fails()){
            $notificat = array(
                'message' => 'already added before',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validation)->withInput($request->all())->with($notificat);
        }

        $this->categoryModel::create([
            'name' => $request->name,
            'created_at' => Carbon::now(),
        ]);
        $notificat = array(
            'message' => 'Category added Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notificat);
    } // End Method

    public function EditCat($request){
       $value = $this->categoryModel::where('id',$request->id)->first();

        return view('admin.category.edit',compact('value'));
    }

    public function updateCat($request){
        $validator = Validator::make($request->all(),[
//            'id' => 'required|exists:categories,id',
            'name' => 'required|unique:categories|max:500',

        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $olddata = $this->categoryModel::find($request->id);
        $olddata->update([
            'name' => $request->name,
        ]);

        $notificat = array(
            'message' => 'Category edited Successfully',
            'alert-type' => 'success'
        );
        return redirect(route('categories'))->with($notificat);
    }


    public function deleteCat($request){

        $this->categoryModel::Where('id',$request->id)->delete();

        $notificat = array(
            'message' => 'Category deleted Successfully',
            'alert-type' => 'warning'
        );

       return redirect()->back()->with($notificat);
    } //End Method
}
