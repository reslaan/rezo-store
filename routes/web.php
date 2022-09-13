<?php

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\SettingController;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
Route::get('/clear', function(){
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";

});

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    Auth::routes();
    Route::get('logout', 'Auth\LoginController@logout')->name('logout')->middleware('auth');


    Route::group(['namespace' => 'Web'], function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('/product/{slug}', 'HomeController@product')->name('product.show');
        Route::get('/category/{slug}', 'HomeController@category')->name('category.show');


        Route::group(['middleware' => 'auth'], function () {


            Route::get('/settings',[SettingController::class,'index'])->name('settings');
            Route::get('/settings/order/{id}',[SettingController::class,'orderItems'])->name('order.items');
            Route::get('/cart', 'CartController@index')->name('cart');
            Route::post('/add/cart', 'CartController@addToCart')->name('cart.add');
            Route::post('/update/cart', 'CartController@updateQuantity')->name('quantity.update');
            Route::post('/delete/cart/{id}', 'CartController@delete')->name('cart.delete');

            Route::get('/checkout', 'CheckoutController@index')->name('checkout');
            Route::post('/checkout/order', 'CheckoutController@placeOrder')->name('checkout.place.order');
        });
    });

    //    Route::get('/','Admin\LoginController@loginForm')->name('admin.login');
    //
    //    Route::group(['middleware' => 'auth'],function (){
    //
    //
    //
    //    Route::group(['middleware' => 'isVerified'],function (){
    //        Route::get('/home', function (){
    //            return view('home');
    //        })->name('home');
    //    });
    //
    //
    //
    //    Route::get('/verify','web\verificationCodeController@verifyForm')->name('auth.verifyCode');
    //    Route::post('/verify','web\verificationCodeController@verify')->name('auth.verify');
    //    Route::get('/resend-otp','web\verificationCodeController@resendOtpCode')->name('auth.resendOtp');
    //});
    //
    //

});
