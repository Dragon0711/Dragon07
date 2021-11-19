<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\ProductInterface;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use function React\Promise\all;


class ProductRepository implements ProductInterface {

    private $productModel;
    private $categoryModel;
    private $brandModel;
    private $subCat;
    /**
     * @var SubCategory
     */
    private $subCatModel;

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

        $product = $this->productModel::all();

        return view('admin.products.index',['product'=>$product ]);
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


    public function StoreProducts($request){


        $validator = Validator::make($request->all(),[
        'name' => 'required|unique:products|max:500',
        'code' => 'required|numeric',
//        'discount_price' => 'numeric',
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
        $products['buyone_getone']  = $request->buyone_getone;
        $products['status']  = 1;

        $image_1  = $request->image_1;
        $image_2  = $request->image_2;
        $image_3  =  $request->image_3;




            if ($request->file('image_1')){
                $file = $request->file('image_1');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                Image::make(request()->file('image_1'))->resize(300, 200)->save("upload/product/$filename");
                $file->move(public_path('upload/product'), $filename);
                $products['image_1'] = $filename;

                $file = $request->file('image_2');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                Image::make(request()->file('image_2'))->resize(300, 200)->save("upload/product/$filename");
                $file->move(public_path('upload/product'), $filename);
                $products['image_2'] = $filename;

                $file = $request->file('image_3');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                Image::make(request()->file('image_3'))->resize(300, 200)->save("upload/product/$filename");
                $file->move(public_path('upload/product'), $filename);
                $products['image_3'] = $filename;

            }

            $products->save();

            $notificat = array(
                'message' => 'product added Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notificat);
    }//End Method


    public function EditProduct($request)
    {
        $product = $this->productModel::findOrFail($request->id);

        return view('admin.products.edit',compact('product'));

    }//End Method



    public function UpdateProduct($request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:500',
            'code' => 'required|numeric',
//            'discount_price' => 'numeric',
            'quantity' => 'required|numeric',
            'size' => 'required|numeric',
            'color' => 'required',
            'price' => 'required|numeric',
            'video' => 'required|url',
            'desc' => 'required|max:5000',
            'image_1' => 'mimes:jpg,jpeg,png|max:4096',
            'image_2' => 'mimes:jpg,jpeg,png|max:4096',
            'image_3' => 'mimes:jpg,jpeg,png|max:4096',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        };

        $products = $this->productModel::find($request->id);

            $image1 = $products->image_1;
            $image2 = $products->image_2;
            $image3 = $products->image_3;

            if ($request->hasFile($image1 && $image2 && $image3)) {
            unlink("upload/product/$image1");
            unlink("upload/product/$image2");
            unlink("upload/product/$image3");

        }

        $image_1  = $request->image_1;
        $image_2  = $request->image_2;
        $image_3  =  $request->image_3;

        if ($request->file('image_1')){
            $file = $request->file('image_1');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            Image::make(request()->file('image_1'))->resize(300, 200)->save("upload/product/$filename");
            $file->move(public_path('upload/product'), $filename);
            $products['image_1'] = $filename;

            $file = $request->file('image_2');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            Image::make(request()->file('image_2'))->resize(300, 200)->save("upload/product/$filename");
            $file->move(public_path('upload/product'), $filename);
            $products['image_2'] = $filename;

            $file = $request->file('image_3');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            Image::make(request()->file('image_3'))->resize(300, 200)->save("upload/product/$filename");
            $file->move(public_path('upload/product'), $filename);
            $products['image_3'] = $filename;

        }

        $products->update([
        'name' => $request->name,
        'code' => $request->code,
        'discount_price' => $request->discount_price,
        'quantity' => $request->quantity,
        'size' => $request->size,
        'color' => $request->color,
        'price' => $request->price,
        'category_id' => $request->category_id,
        'subcategory_id' => $request->subcategory_id,
        'brand_id' => $request->brand_id,
        'video' => $request->video,
        'desc' => $request->desc,
        'main_slider' => $request->main_slider,
        'mid_slider' => $request->mid_slider,
        'hot_deal' => $request->hot_deal,
        'hot_new'  => $request->hot_new,
        'best_rate'  => $request->best_rate,
        'trend'  => $request->trend,
        'buyone_getone'  => $request->buyone_getone,
        'status'  => 1,
        ]);

        $notificat = array(
            'message' => 'product Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect(route('all.products'))->with($notificat);
    } //End Method



    public function DeleteProduct($request)
    {
        $product = $this->productModel::where('id',$request->id)->first();

        $image1 = $product->image_1;
        $image2 = $product->image_2;
        $image3 = $product->image_3;
        unlink("upload/product/$image1");
        unlink("upload/product/$image2");
        unlink("upload/product/$image3");

        $this->productModel::where('id',$request->id)->delete();

        $notificat = array(
            'message' => 'product added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notificat);
    }



    public function Active($request)
    {
        $this->productModel::where('id',$request->id)->update([
            'status' => 1,
        ]);
        $notificat = array(
            'message' => 'product active Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notificat);
    }

    public function Disable($request)
    {
        $this->productModel::where('id',$request->id)->update([
            'status' => 0,
        ]);
        $notificat = array(
            'message' => 'product Disable',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notificat);
    }


}


