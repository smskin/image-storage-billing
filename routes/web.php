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

Route::get('/', 'Web\\WelcomeController@index');

Route::group(['prefix'=>'auth'],function(){
    Route::get('login','Web\\Auth\\LoginController@showLoginForm')->name('login');
    Route::post('login','Web\\Auth\\LoginController@login');
    Route::post('logout','Web\\Auth\\LoginController@logout')->name('logout');
//    Route::get('register', 'Web\\Auth\\RegisterController@showRegistrationForm')->name('register');
//    Route::post('register', 'Web\\Auth\\RegisterController@register');
//    Route::get('password/reset', 'Web\\Auth\\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//    Route::post('password/email', 'Web\\Auth\\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//    Route::get('password/reset/{token}', 'Web\\Auth\\ResetPasswordController@showResetForm')->name('password.reset');
//    Route::post('password/reset', 'Web\\Auth\\ResetPasswordController@reset')->name('password.update');
//    Route::get('password/confirm', 'Web\\Auth\\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
//    Route::post('password/confirm', 'Web\\Auth\\ConfirmPasswordController@confirm');
//    Route::get('email/verify', 'Web\\Auth\\VerificationController@show')->name('verification.notice');
//    Route::get('email/verify/{id}/{hash}', 'Web\\Auth\\VerificationController@verify')->name('verification.verify');
//    Route::post('email/resend', 'Web\\Auth\\VerificationController@resend')->name('verification.resend');
});

Route::get('home', 'Web\\HomeController@index')->name('home');

Route::group(['prefix'=>'settings'],function(){
    Route::get('account','Web\\SettingsController@index')->name('settings');
    Route::get('billing','Web\\SettingsController@billing');
    Route::get('security','Web\\SettingsController@security');
});

Route::group(['prefix'=>'projects'],function(){
    Route::get('/','Web\\ProjectController@index');
    Route::get('/create','Web\\ProjectController@create');
    Route::get('{project}','Web\\ProjectController@show');
    Route::get('{project}/edit','Web\\ProjectController@edit');
    Route::get('{project}/file-manager','Web\\ProjectController@fileManager');
    Route::get('{project}/security','Web\\ProjectController@security');
    Route::get('{project}/statistic','Web\\ProjectController@statistic');
});
