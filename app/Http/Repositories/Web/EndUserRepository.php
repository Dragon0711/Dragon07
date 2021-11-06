<?php


namespace App\Http\Repositories\Web;


use App\Http\Interfaces\Web\EndUserInterface;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;

class EndUserRepository implements EndUserInterface
{

    private $brandModel;
    private $productModel;
    private $categoryModel;
    private $subcategoryModel;

    public function __construct(Brand $brand,Product $product,Category $category,SubCategory $subCategory){

        $this->brandModel = $brand;
        $this->productModel = $product;
        $this->categoryModel = $category;
        $this->subcategoryModel = $subCategory;

    }

    public function index()
    {

        $products = $this->productModel::all();

        $featured = DB::table('products')->where('status',1)
            ->orderBy('id','DESC')->limit(8)->get();

        $trend = DB::table('products')->where('status',1)
            ->where('trend',1)->orderBy('id','DESC')
            ->limit(8)->get();

        $best =DB::table('products')->where('status',1)
            ->where('best_rate',1)->orderBy('id','DESC')
            ->limit(8)->get();



       /* $mount = $this->productModel::all();
        $product = $mount->price - $mount->discount_price;
        $discount = ($product->discount_price / $product->price * 100);*/




        $slider = DB::table('products')
            ->join('brands','products.brand_id','brands.id')
            ->select('products.*','brands.name as brand_name')
            ->where('main_slider',1)->orderBy('id','DESC')->first();

//        we can use this models relation  and send data like array and make foreach there on data
//        $slider = $this->productModel::get()->where('main_slider',1);

        return view('layout.index',compact('slider' , 'featured' ,'products','trend','best'));
//        return view('layout.index',['slider' => $slider]);
    }


}
