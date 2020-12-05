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
Route::post('product/register/fetch', 'ProductController@fetch')->name('product.register.fetch');
Route::post('product/check', 'ProductController@check')->name('product.check');
