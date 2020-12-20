<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'TopController@index')->name('top');

// product
Route::get('product/register', 'ProductController@register')->name('product.register');
Route::get('product/register2', 'ProductController@register2')->name('product.register2');
Route::post('product/register/category', 'ProductController@category')->name('product.register.category');
Route::post('product/register/image1', 'ProductController@image1')->name('product.register.image1');
Route::post('product/register/image2', 'ProductController@image2')->name('product.register.image2');
Route::post('product/register/image3', 'ProductController@image3')->name('product.register.image3');
Route::post('product/register/image4', 'ProductController@image4')->name('product.register.image4');
Route::post('product/check', 'ProductController@check')->name('product.check');
Route::post('product/store', 'ProductController@store')->name('product.store');
Route::get('product/list', 'ProductController@list')->name('product.list');
Route::post('product/search', 'ProductController@search')->name('product.search');
Route::get('product/detail/{page}/{id}', 'ProductController@detail')->name('product.detail');

// review
Route::get('review/register/{page}/{id}', 'ReviewController@register')->name('review.register');
Route::post('review/check', 'ReviewController@check')->name('review.check');
Route::post('review/store', 'ReviewController@store')->name('review.store');
Route::get('review/complete', 'ReviewController@complete')->name('review.complete');
Route::get('review/list/{pg}/{id}', 'ReviewController@list')->name('review.list');
