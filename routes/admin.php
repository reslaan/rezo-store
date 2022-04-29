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
    Route::get('logout','LoginController@logout')->name('admin.logout');

    Route::get('profile','ProfileController@profile')->name('profile');
    Route::put('profile','ProfileController@updateProfile');



    ///////////////// Categories ///////////////////////

        Route::get('{type}/all','CategoryController@index')->name('admin.categories');
        Route::get('new/{type}','CategoryController@create')->name('admin.new-category');
        Route::post('new/{type}','CategoryController@store');
        Route::get('edit/{type}/{id}','CategoryController@edit')->name('admin.edit-category');
        Route::put('update/{type}/{id}','CategoryController@update')->name('admin.update-category');
        Route::delete('delete/{type}/{id}','CategoryController@destroy')->name('admin.delete-category');


    ////////////////// end categories /////////////////

    ///////////////// Brands ///////////////////////
    Route::group(['prefix' => 'brands'],function(){
        Route::get('/','BrandController@index')->name('admin.brands');
        Route::get('new','BrandController@create')->name('admin.new-brand');
        Route::post('new','BrandController@store');
        Route::get('/edit/{id}','BrandController@edit')->name('admin.edit-brand');
        Route::put('/update/{id}','BrandController@update')->name('admin.update-brand');
        Route::delete('delete/{id}','BrandController@destroy')->name('admin.delete-brand');
    });
    ////////////////// end Brands /////////////////


    ///////////////// resources ///////////////////////
    Route::name('admin.')->group(function (){
        Route::resources([
            'tags' => 'TagController',
            'products' => 'ProductController',
            'attributes' => 'AttributeController',
            'options' => 'OptionController',
        ]);
        Route::get('test','ProductController@test');
        Route::post('product/images/','ProductController@saveImages')->name('product.images.save');
        Route::post('product/images/show','ProductController@showImages')->name('product.images.show');
        Route::post('product/images/delete','ProductController@deleteImage')->name('image.delete');
    });

    ////////////////// end resources /////////////////

    Route::group(['prefix'=>'settings'],function (){
     Route::get('shipping-methods/{type}','SettingController@editShippingMethods')->name('edit.shipping.methods');
     Route::put('shipping-methods','SettingController@updateShippingMethods')->name('update.shipping.methods');

    });
});



});
