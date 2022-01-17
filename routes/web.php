<?php

use App\Http\Controllers\FacebookSocialiteController;
use App\Http\Controllers\GoogleSocialiteController;

use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsLaterController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Web\EndUserController;
use App\Http\Controllers\web\PaymentController;
use App\Http\Controllers\Web\ProductController as FrontProductController;
use App\Http\Controllers\WishlistController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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





Route::get('/', [EndUserController::class, 'index']);


Route::group(['prefix'=>'user','middleware' => ['guest:web','noBack']], function (){
    Route::get('login', [UserController::class, 'login'])->name('login');
    Route::POST('store', [UserController::class, 'UserStore'])->name('user.store');
});

     Route::middleware(['auth:web', 'verified','noBack'])->get('/dashboard', function () {
        return view('user.index');
        })->name('dashboard');


    //Route::get('user/register', [UserController::class, 'formRegister'])->name('register');
    Route::POST('user/create', [UserController::class, 'create'])->name('register');
    Route::get('forget/password', [UserController::class, 'ForgetPassword'])->name('password.request');
    Route::POST('user/logout',[UserController::class,'logout'])->name('user.logout');
    Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('user/change-password', [UserController::class, 'changePassword'])->name('change_password');
    Route::POST('user/update-password', [UserController::class, 'updatePassword'])->name('update.password');
    Route::get('user/profile/edit', [UserController::class, 'profileEdit'])->name('profile.edit');
    Route::POST('user/update', [UserController::class, 'profileUpdate'])->name('profile.update');



/*************  ------FRONTEND SECTION------ *****************/

    Route::POST('add/newslater', [NewsLaterController::class, 'subscriber']);

    // ADD TO WISHLIST
    Route::get('add/wishlist/{id}', [WishlistController::class, 'addWishList']);
    Route::get('wishlist/', [WishlistController::class, 'viewWishList'])->name('wishlist');
    Route::get('wishlist/delete/{id}', [WishlistController::class, 'deleteWishList']);

    //ADD TO CART
    Route::get('add/cart/{id}', [CartController::class, 'addCart']);
    Route::get('check/cart/', [CartController::class, 'checkCart'])->name("check.cart");
    Route::get('checkout/', [CartController::class, 'checkOut'])->name("checkout");


    // PRODUCT DETAILS
    Route::get('product/details/{product_name}/{id}', [FrontProductController::class, 'viewProduct']);
    Route::post('product/add/cart/{id}', [FrontProductController::class, 'addProduct']);
    Route::get('delete/from/cart/{rowId}', [FrontProductController::class, 'deleteCart']);
    Route::POST('update/qyt/cart/', [FrontProductController::class, 'updateQytCart']);

    Route::get('show/cats/products/{id}', [FrontProductController::class, 'showCatsProducts']);
    Route::get('show/subcats/products/{id}', [FrontProductController::class, 'showSubCatsProducts']);


    //User Coupon
    Route::POST('apply/coupon', [EndUserController::class, 'applyCoupon'])->name('apply.coupon');

    //PAYMENT
    Route::get('payment/page', [PaymentController::class, 'PaymentInf'])->name('Payment.Page');
    Route::POST('payment/process', [PaymentController::class, 'PaymentProcess'])->name('payment.process');
    Route::POST('payment/charge', [PaymentController::class, 'PaymentCharge'])->name('visa.charge');
    Route::POST('payment/cache', [PaymentController::class, 'PaymentCache'])->name('cache.charge');

    /**  User Orders    **/
    Route::get('user/cancel/order/{id}', [OrdersController::class, 'userCancelOrder']);
    Route::get('user/track/order/{id}', [OrdersController::class, 'userTrackOrder']);
    Route::get('user/return/order/{id}', [OrdersController::class, 'userReturnOrder']);

    /**** contact Form ****/
    Route::get('contact/page', [ContactController::class, 'contact'])->name('contact');
    Route::post('sent/message', [ContactController::class, 'ContactForm'])->name('contact.form');

    /******** FOR Search **********/
    Route::post('product/search', [ProductController::class, 'search'])->name('product.search');






    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->middleware('auth')->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect('/');
    })->middleware(['auth', 'signed'])->name('verification.verify');

    Route::POST('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');


    Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle']);
    Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback']);

    Route::get('auth/facebook', [FacebookSocialiteController::class, 'redirectToFB']);
    Route::get('callback/facebook', [FacebookSocialiteController::class, 'handleCallback']);






