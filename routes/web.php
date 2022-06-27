<?php

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

Route::get('/', function () {

    return view('welcome');

});
Route::group(['middleware' => 'auth'],function (){
    Route::group(['middleware' => 'isVerified'],function (){
        Route::get('/home', function (){
            return view('home');
        })->name('home');
    });



    Route::get('/verify','web\verificationCodeController@verifyForm')->name('auth.verifyCode');
    Route::post('/verify','web\verificationCodeController@verify')->name('auth.verify');
    Route::get('/resend-otp','web\verificationCodeController@resendOtpCode')->name('auth.resendOtp');
});


Auth::routes();


});


