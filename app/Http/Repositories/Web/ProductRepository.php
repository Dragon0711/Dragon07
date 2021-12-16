<?php


namespace App\Http\Repositories\Web;


use App\Http\Interfaces\Web\ProductInterface;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\recentlyView;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Cart;

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


    public function addProduct($request)
    {
        $product = DB::table('products')->where('id',$request->id)->first();

        $data = array();

        if ($product->discount_price == null){

            $data['id'] = $product->id;
            $data['name'] = $product->name;
            $data['qty'] = $request->qty;
            $data['price'] = $product->price;
            $data['weight'] =$request->qty;
            $data['options']['image'] = $product->image_1;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            cart::add($data);
            $notificat = array(
                'message' => 'product added successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notificat);
        }else{
            $data['id'] = $product->id;
            $data['name'] = $product->name;
            $data['qty'] = $request->qty;
            $data['price'] = $product->discount_price;
            $data['weight'] =1;
            $data['options']['image'] = $product->image_1;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            cart::add($data);
            $notificat = array(
                'message' => 'product added successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notificat);
        }

    }// END METHOD

    public function deleteCart($rowId)
    {

        Cart::remove($rowId);
        $notificat = array(
            'message' => 'Product deleted to your cart successfully',
            'alert-type' => 'warning'
        );
        return Redirect()->back()->with($notificat);

    }// END METHOD

    public function updateQytCart($request)
    {
        $rowId = $request->productId;
        $qty = $request->qty;
        Cart::update($rowId , $qty);

        $notificat = array(
            'message' => 'quantity updated successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notificat);
    }//END METHOD


    public function showCatsProducts($request)
    {
        $catsProducts = DB::table('products')->where('category_id',$request->id)->paginate(10);

        // For Get All Brands  Of Product
        $brandId = $catsProducts->pluck('brand_id');
        $brandProduct = Brand::whereIN('id',$brandId)->get();

        $cats = $this->categoryModel::get();

        //for title page
        $catName = $this->categoryModel::where('id',$request->id)->first();


        return view('layout.show_Cats_products',compact('catsProducts','brandProduct','cats','catName'));
    }


    public function showSubCatsProducts($request)
    {
        $subCatsProduct = DB::table('products')->where('subcategory_id',$request->id)->paginate(10);


        // For Get All Brands  Of Product
        $brandIds = $subCatsProduct->pluck('brand_id');
        $brandProduct = Brand::whereIn('id', $brandIds)->get();

        //for title page
        $subCat = $this->subcategoryModel::where('id',$request->id)->first();

        $cats = $this->categoryModel::get();

        return view('layout.show_subCats_products',compact('subCatsProduct','brandProduct','subCat','cats'));
    }


}
