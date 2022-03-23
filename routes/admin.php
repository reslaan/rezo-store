<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|all prefix admin
*/

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function (){



// auth
Route::group(['namespace'=>'Admin','middleware'=> 'guest:admin','prefix'=>'admin'],function (){
    Route::get('login','LoginController@loginForm')->name('admin.login');
    Route::post('login','LoginController@login')->name('admin.login');
});




Route::group(['namespace' => 'Admin', 'middleware' => 'auth:admin', 'prefix'=> 'admin'], function (){
    Route::get('/','DashboardController@index')->name('admin.dashboard');

    Route::group(['prefix'=>'settings'],function (){
     Route::get('shipping-methods/{type}','SettingController@editShippingMethods')->name('edit.shipping.methods');
    });
});



});
