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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// join
Route::get('join', 'MemberController@getIndex')->name('join');
Route::post('join', 'MemberController@postIndex')->name('join');
Route::get('join/check', 'MemberController@check')->name('join.check');
Route::post('join/store', 'MemberController@store')->name('join.store');
Route::get('join/complete', 'MemberController@complete')->name('join.complete');
