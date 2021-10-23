<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\ProductInterface;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class ProductRepository implements ProductInterface {

    private $productModel;
    private $categoryModel;
    private $brandModel;
    private $subCat;
    /**
     * @var Product
     */


    public function __construct(Product $product , Category $category,SubCategory $subCat, Brand $brand){

        $this->productModel = $product;
        $this->categoryModel = $category;
        $this->subCatModel = $subCat;
        $this->brandModel = $brand;
    }

    public function AllProducts()
    {
        $data = $this->productModel::all();

        return view('admin.products.index');
    } // End Method

    public function CreateProducts($request){
        $cats =  $this->categoryModel::all();
        $brands = $this->brandModel::all();
        $subCat = $this->subCatModel::all();

        return view('admin.products.create',compact('cats','brands','subCat'));

        /* return view('admin.products.create', [
            'cats'=>$cats,
            'brands'=>$brands]);*/

    } // End Method


    public function storeProducts($request){


        $validator = Validator::make($request->all(),[
        'name' => 'required|unique:products|max:500',
        'code' => 'required|numeric',
        'discount_price' => 'required|numeric',
        'quantity' => 'required|numeric',
        'size' => 'required|numeric',
        'color' => 'required',
        'price' => 'required|numeric',
        'video' => 'required|url',
        'desc' => 'required|max:5000',
        'image_1' => 'required|mimes:jpg,jpeg,png|max:4096',
        'image_2' => 'required|mimes:jpg,jpeg,png|max:4096',
        'image_3' => 'required|mimes:jpg,jpeg,png|max:4096',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        };

        $products = new Product();

        $products['name'] = $request->name;
        $products['code'] = $request->code;
        $products['discount_price'] = $request->discount_price;
        $products['quantity'] = $request->quantity;
        $products['size'] = $request->size;
        $products['color'] = $request->color;
        $products['price'] = $request->price;
        $products['category_id'] = $request->category_id;
        $products['subcategory_id'] = $request->subcategory_id;
        $products['brand_id'] = $request->brand_id;
        $products['video'] = $request->video;
        $products['desc'] = $request->desc;
        $products['main_slider'] = $request->main_slider;
        $products['mid_slider'] = $request->mid_slider;
        $products['hot_deal'] = $request->hot_deal;
        $products['hot_new']  = $request->hot_new;
        $products['best_rate']  = $request->best_rate;
        $products['trend']  = $request->trend;
        $products['status']  = 1;

        $image_1  = $request->image_1;
        $image_2  = $request->image_2;
        $image_3  =  $request->image_3;




            if ($request->file('image_1')){
                $file = $request->file('image_1');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                Image::make(request()->file('image_1'))->resize(300, 200)->save('upload/product'.$filename);
                $file->move(public_path('upload/product'), $filename);
                $products['image_1'] = $filename;

                $file = $request->file('image_2');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                Image::make(request()->file('image_2'))->resize(300, 200)->save('upload/product'.$filename);
                $file->move(public_path('upload/product'), $filename);
                $products['image_2'] = $filename;

                $file = $request->file('image_3');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                Image::make(request()->file('image_3'))->resize(300, 200)->save('upload/product'.$filename);
                $file->move(public_path('upload/product'), $filename);
                $products['image_3'] = $filename;

            }

            $products->save();

            $notificat = array(
                'message' => 'product added Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notificat);
        }

    private function validate($request, array $array)
    {
    }


}


