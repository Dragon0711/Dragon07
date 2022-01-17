<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\NewsLaterController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportOrdersController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubCategoryController;
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

Route::group(['prefix'=>'admin','middleware' => ['guest:admin','noBack']],function (){
    Route::get('login',[AdminController::class,'loginForm'])->name('admin.login');
    Route::POST('store',[AdminController::class,'loginStore'])->name('admin.store');
});



Route::group(['prefix'=>'admin','middleware' => ['auth:admin','noBack']], function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');


    Route::get('logout',[AdminController::class,'destroy'])->name('admin.logout');
    Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::get('profile/edit',[AdminController::class,'profileEdit'])->name('admin.profile.edit');
    Route::POST('profile/update',[AdminController::class,'profileUpdate'])->name('admin.profile.update');
    Route::get('change-password',[AdminController::class,'changePassword'])->name('admin.change-password');
    Route::POST('update-password',[AdminController::class,'updatePassword'])->name('admin.update.password');




    /********** Add Admins && Roles ***********/

    Route::get('all/admins', [RoleController::class, 'AllAdmins'])->name('all.admins');
    Route::get('add/admin', [RoleController::class, 'AddAdmin'])->name('add.admin');
    Route::POST('store/admin', [RoleController::class, 'storeAdmin'])->name('store.admin');
    Route::get('edit/{id}', [RoleController::class, 'editAdmin']);
    Route::POST('update/{id}', [RoleController::class, 'updateAdmin'])->name('update.admin');
    Route::get('delete/{id}', [RoleController::class, 'deleteAdmin']);
    Route::get('add/role', [RoleController::class, 'addRole'])->name('add.role');
    Route::POST('create/role', [RoleController::class, 'createRole'])->name('create.role');



    /** Admin Category Section */
    Route::get('categories', [CategoryController::class, 'AllCat'])->name('categories');
    Route::POST('add/categories', [CategoryController::class, 'AddCat'])->name('add.category');
    Route::get('edit/categories/{id}', [CategoryController::class, 'EditCat']);
    Route::POST('update/categories/{id}', [CategoryController::class, 'updateCat'])->name('updateCat');
    Route::get('delete/categories/{id}', [CategoryController::class, 'deleteCat']);


    /** Sub-Category Section  **/
    Route::get('subcat', [SubCategoryController::class, 'AllSubCat'])->name('SubCat');
    Route::POST('add/subcat', [SubCategoryController::class, 'AddSubCat'])->name('add.SubCat');
    Route::get('edit/subcat/{id}', [SubCategoryController::class, 'EditSubCat']);
    Route::POST('update/subcat/{id}', [SubCategoryController::class, 'UpdateSubCat']);
    Route::get('delete/subcat/{id}', [SubCategoryController::class, 'deleteSubCat']);


    /** Coupon Section */
    Route::get('coupon', [CouponController::class, 'AllCoupon'])->name('coupon');
    Route::POST('add/coupon', [CouponController::class, 'AddCoupon'])->name('add.coupon');
    Route::get('edit/coupon/{id}', [CouponController::class, 'EditCoupon']);
    Route::POST('update/coupon/{id}', [CouponController::class, 'UpdateCoupon']);
    Route::get('delete/coupon/{id}', [CouponController::class, 'deleteCoupon']);


    /** NewsLater Section */
    Route::get('newslater', [NewsLaterController::class, 'AllnewsLater'])->name('all.NewsLaters');
    Route::get('delete/newslater/{id}', [NewsLaterController::class, 'deletenewsLater']);
    Route::delete('delete/all', [NewsLaterController::class, 'deleteAll'])->name('deleteAll');


    /**  Brands Section */

    Route::get('brands', [BrandsController::class, 'AllBrand'])->name('brands');
    Route::POST('add/brands', [BrandsController::class, 'addBrand'])->name('add.brand');
    Route::get('edit/brands/{id}', [BrandsController::class, 'editBrand']);
    Route::POST('update/brands/{id}', [BrandsController::class, 'updateBrand']);
    Route::get('delete/brands/{id}', [BrandsController::class, 'deleteBrand']);

    /** PRODUCT SECTION ***/

    Route::get('all/products', [ProductController::class, 'AllProducts'])->name('all.products');
    Route::get('create/products', [ProductController::class, 'CreateProducts'])->name('create.product');
    Route::post('store/products', [ProductController::class, 'StoreProducts'])->name('store.product');
    Route::get('edit/products/{id}', [ProductController::class, 'EditProduct']);
    Route::post('update/products/{id}', [ProductController::class, 'UpdateProduct'])->name('update.product');
    Route::get('delete/products/{id}', [ProductController::class, 'DeleteProduct']);


    Route::get('product/active/{id}', [ProductController::class, 'Active']);
    Route::get('product/disable/{id}', [ProductController::class, 'Disable']);


    /** ORDERS SECTION ***/

    Route::get('oroder/new', [OrdersController::class, 'showOrder'])->name('showNewOrder');
    Route::get('view/order/{id}', [OrdersController::class, 'viewOrder']);
    Route::get('accept/order/payment/{id}', [OrdersController::class, 'acceptPaymentOrder']);
    Route::get('cancel/order/{id}', [OrdersController::class, 'cancelOrder']);
    Route::get('progress/delivery/{id}', [OrdersController::class, 'adminProgressDelivery']);
    Route::get('done/delivery/{id}', [OrdersController::class, 'adminDoneDelivery']);


    /** for view side menu **/
    Route::get('orders/accept/payment', [OrdersController::class, 'paymentAccept'])->name('acceptPayment');
    Route::get('orders/canceled', [OrdersController::class, 'ordersCanceled'])->name('ordersCanceled');
    Route::get('progress/delivery', [OrdersController::class, 'progressDelivery'])->name('progressDelivery');
    Route::get('success/delivery', [OrdersController::class, 'successDelivery'])->name('successDelivery');


    Route::get('view/returned/orders', [OrdersController::class, 'returnedOrder'])->name('returned.order');


    /*** Reports Orders  ***/
    Route::get('orders/report', [ReportOrdersController::class, 'reportOrders'])->name('orders.report');
    Route::get('search/orders/month', [ReportOrdersController::class, 'searchByMonth']);
    Route::get('search/orders/year', [ReportOrdersController::class, 'searchByYear']);
    Route::get('search/orders/day', [ReportOrdersController::class, 'searchByDay']);


    /*********** Contact Page *************/
    Route::get('mailbox', [ContactController::class, 'mailBox'])->name('admin.mailbox');
    Route::get('view/message/{id}', [ContactController::class, 'viewMessage']);

});






