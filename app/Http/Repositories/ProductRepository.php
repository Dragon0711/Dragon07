<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\ProductInterface;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;
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

        return view('admin.products.create',compact('cats','brands'));
    } // End Method


    public function storeProducts($request){
        $data['name'] = $request->name;
        $data['code'] = $request->code;
        $data['discount_price'] = $request->discount_price;
        $data['quantity'] = $request->quantity;
        $data['size'] = $request->size;
        $data['color'] = $request->color;
        $data['price'] = $request->price;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['brand_id'] = $request->brand_id;
        $data['video'] = $request->video;
        $data['desc'] = $request->desc;
        $data['main_slider'] = $request->main_slider;
        $data['mid_slider'] = $request->mid_slider;
        $data['hot_deal'] = $request->hot_deal;
        $data['hot_new']  = $request->hot_new;
        $data['best_rate']  = $request->best_rate;
        $data['trend']  = $request->trend;
        $data['status']  = 1;
        $image_1  = $request->image_1;
        $image_2  = $request->image_2;
        $image_3  =  $request->image_3;

      //  return response()->json($data);

        if ($image_1 && $image_2 && $image_3){
            $image_one_name = hexdec(uniqid()).'.'.$image_1->getClientOriginalExtension();
            Image::make($image_1)->resize(300,300)->save('public/upload/product/'.$image_one_name);
            $data[$image_1] = 'public/upload/product/'.$image_one_name;

            $image_two_name = hexdec(uniqid()).'.'.$image_2->getClientOriginalExtension();
            Image::make($image_2)->resize(300,300)->save('public/upload/product/'.$image_two_name);
            $data[$image_2] = 'public/upload/product'.$image_two_name;

            $image_three_name = hexdec(uniqid()).'.'.$image_3->getClientOriginalExtension();
            Image::make($image_3)->resize(300,300)->save('public/upload/product/'.$image_three_name);
            $data[$image_3] = 'public/upload/product'.$image_three_name;


            $product = DB::table('products')->insert($data);

            $notificat = array(
                'message' => 'product added Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notificat);
        }





    }

}
