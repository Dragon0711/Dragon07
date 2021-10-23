<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\SubCategoryInterface;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Validator;


class SubCategoryRepository implements SubCategoryInterface {

    private $subcCategoryModel;
    private $category;

    public function __construct(SubCategory $subCategory , Category $category){

        $this->subcCategoryModel = $subCategory;
        $this->category = $category;
    }

    public function AllSubCat()
    {
       $subCat = $this->subcCategoryModel::all();
       $cats = $this->category::get();

       return view('admin.subcat.subcat',compact('subCat','cats'));

    } // End Method

    public function AddSubCat($request)
    {

        $validator = Validator::make($request->all(),[
            'name' => 'required|max:500|unique:subcategories',
            //'category_id' => 'required|exists:categories',
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        $this->subcCategoryModel->create([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);
        $notificat = array(
            'message' => 'Sub-Category Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notificat);
    } //End Method


    public function EditSubCat($request)
    {
        $value = $this->subcCategoryModel::find($request->id);
        $cats = $this->category::get();


        return view('admin.subcat.edit',compact('value' ,'cats'));
    } //End Method

    public function UpdateSubCat($request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:500',
            'category_id' => 'required:exists:subcategories,id',
        ]);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $data = $this->subcCategoryModel::find($request->id);

        $data->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);
        $notificat = array(
            'message' => 'Sub-Category Updated Successfully',
            'alert-type' => 'warning'
        );
        return redirect(route('SubCat'))->with($notificat);
    } // End Method

    public function deleteSubCat($request)
    {
        $this->subcCategoryModel::find($request->id)->delete();

        $notificat = array(
            'message' => 'Sub-Category deleted Successfully',
            'alert-type' => 'error',
        );
        return redirect()->back()->with($notificat);
    } // End Method

}
