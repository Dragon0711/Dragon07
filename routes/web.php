<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\MainAdminController;
use App\Http\Controllers\NewsLaterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    return view('layout.index');
});


Route::group(['prefix'=>'admin','middleware'=>['admin:admin']],function (){
    Route::get('/login',[AdminController::class,'loginForm']);
    Route::POST('/login',[AdminController::class,'store'])->name('admin.login');
});
Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard');

Route::get('admin/logout',[AdminController::class,'destroy'])->name('admin.logout');
Route::get('admin/profile',[MainAdminController::class,'profile'])->name('admin.profile');
Route::get('admin/profile/edit',[MainAdminController::class,'profileEdit'])->name('admin.profile.edit');
Route::POST('admin/profile/update',[MainAdminController::class,'profileUpdate'])->name('admin.profile.update');
Route::get('admin/change-password',[MainAdminController::class,'changePassword'])->name('admin.change-password');
Route::POST('admin/update-password',[MainAdminController::class,'updatePassword'])->name('admin.update.password');

/** Admin Category Section */

Route::get('admin/categories',[CategoryController::class,'AllCat'])->name('categories');
Route::POST('admin/add/categories',[CategoryController::class,'AddCat'])->name('add.category');
Route::get('admin/edit/categories/{id}',[CategoryController::class,'EditCat']);
Route::POST('admin/update/categories/{id}',[CategoryController::class,'updateCat'])->name('updateCat');
Route::get('admin/delete/categories/{id}',[CategoryController::class,'deleteCat']);


/** Sub-Category Section  **/
Route::get('admin/subcat',[SubCategoryController::class,'AllSubCat'])->name('SubCat');
Route::POST('admin/add/subcat',[SubCategoryController::class,'AddSubCat'])->name('add.SubCat');
Route::get('admin/edit/subcat/{id}',[SubCategoryController::class,'EditSubCat']);
Route::POST('admin/update/subcat/{id}',[SubCategoryController::class,'UpdateSubCat']);
Route::get('admin/delete/subcat/{id}',[SubCategoryController::class,'deleteSubCat']);


/** Coupon Section */
Route::get('admin/coupon',[CouponController::class,'AllCoupon'])->name('coupon');
Route::POST('admin/add/coupon',[CouponController::class,'AddCoupon'])->name('add.coupon');
Route::get('admin/edit/coupon/{id}',[CouponController::class,'EditCoupon']);
Route::POST('admin/update/coupon/{id}',[CouponController::class,'UpdateCoupon']);
Route::get('admin/delete/coupon/{id}',[CouponController::class,'deleteCoupon']);

/** NewsLater Section */
Route::get('admin/newslater',[NewsLaterController::class,'AllnewsLater'])->name('all.NewsLaters');
Route::get('admin/delete/newslater/{id}',[NewsLaterController::class,'deletenewsLater']);


/**  Brands Section */

Route::get('admin/brands',[BrandsController::class,'AllBrand'])->name('brands');
Route::POST('admin/add/brands',[BrandsController::class,'addBrand'])->name('add.brand');
Route::get('admin/edit/brands/{id}',[BrandsController::class,'editBrand']);
Route::POST('admin/update/brands/{id}',[BrandsController::class,'updateBrand']);
Route::get('admin/delete/brands/{id}',[BrandsController::class,'deleteBrand']);

/** PRODUCT SECTION ***/

Route::get('admin/all/products',[ProductController::class,'AllProducts'])->name('all.products');
Route::get('admin/create/products',[ProductController::class,'CreateProducts'])->name('create.product');
Route::post('admin/store/products',[ProductController::class,'StoreProducts'])->name('store.product');
Route::get('admin/edit/products/{id}',[ProductController::class,'EditProduct']);
Route::post('admin/update/products/{id}',[ProductController::class,'UpdateProduct'])->name('update.product');
Route::get('admin/delete/products/{id}',[ProductController::class,'DeleteProduct']);

Route::get('admin/product/active/{id}',[ProductController::class,'Active']);
Route::get('admin/product/disable/{id}',[ProductController::class,'Disable']);

  /**** User Route Section *****/

Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {

    return view('user.index');
})->name('dashboard');

    Route::get('user/logout',[UserController::class,'logout'])->name('user.logout');
    Route::get('user/profile',[UserController::class,'profile'])->name('user.profile');
    Route::get('user/change-password',[UserController::class,'changePassword'])->name('change_password');
    Route::POST('user/update-password',[UserController::class,'updatePassword'])->name('update.password');
    Route::get('user/profile/edit',[UserController::class,'profileEdit'])->name('profile.edit');
    Route::POST('user/update', [UserController::class, 'profileUpdate'])->name('profile.update');



/**  ------FRONTEND SECTION------ **/
Route::POST('add/newslater',[NewsLaterController::class,'subscriber']);



