<?php


namespace App\Http\Repositories\Web;


use App\Http\Interfaces\Web\ProductInterface;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\recentlyView;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductInterface
{

    private $brandModel;
    private $productModel;
    private $categoryModel;
    private $subcategoryModel;
    private $RecentlyViewModel;

    public function __construct(Brand $brand, Product $product, Category $category, SubCategory $subCategory, RecentlyView $recently_view)
    {

        $this->brandModel = $brand;
        $this->productModel = $product;
        $this->categoryModel = $category;
        $this->subcategoryModel = $subCategory;
        $this->RecentlyViewModel = $recently_view;

    }


    public function viewProduct($request)
    {
        $product = $this->productModel::where('id', $request->id)->first();
//        $product = DB::table('products')->where('id',$request->id)->first();

        $product_size = $product->size;
        $size = explode(',', $product_size);

        $product_color = $product->color;
        $color = explode(',', $product_color);


        // ADD To Recently View ..
        if (Auth::check()) {
            // remove product IF Exists ...
            RecentlyView::where("user_id", Auth::id())->where("product_id", $product->id)->delete();
            // add new product ...
            recentlyView::create([
                "user_id" => Auth::id(),
                "product_id" => $product->id,
            ]);
        }

            //         من خلال الموديل
//        $recentView = Auth::user()->recentViewProducts()->get();

        $recentViewIds = $this->RecentlyViewModel::where('user_id',Auth::id())->orderBy('created_at','DESC')->limit(6)
            ->pluck("product_id")->unique();
        $recentView = Product::whereIn("id",$recentViewIds)->get();

        return view('layout.show_product', compact('product', 'size', 'color', 'recentView'));
    }


}
