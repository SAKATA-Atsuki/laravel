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

// mypage
Route::get('mypage', 'MypageController@index')->name('mypage');
Route::get('mypage/confirm', 'MypageController@confirm')->name('mypage.confirm');
Route::get('mypage/delete', 'MypageController@delete')->name('mypage.delete');

// mypage.edit
Route::get('mypage/edit/information', 'MypageController@information')->name('mypage.edit.information');
Route::post('mypage/edit/information/check', 'MypageController@informationCheck')->name('mypage.edit.information.check');
Route::post('mypage/edit/information/store', 'MypageController@informationStore')->name('mypage.edit.information.store');
Route::get('mypage/edit/password', 'MypageController@password')->name('mypage.edit.password');
Route::post('mypage/edit/password/store', 'MypageController@passwordStore')->name('mypage.edit.password.store');
Route::get('mypage/edit/email', 'MypageController@email')->name('mypage.edit.email');
Route::post('mypage/edit/email/auth', 'MypageController@emailAuth')->name('mypage.edit.email.auth');
Route::get('mypage/edit/email/auth', 'MypageController@emailAuth2')->name('mypage.edit.email.auth');
Route::post('mypage/edit/email/store', 'MypageController@emailStore')->name('mypage.edit.email.store');

// mypage.review
Route::get('mypage/review/list', 'MypageController@reviewList')->name('mypage.review.list');
Route::get('mypage/review/edit', 'MypageController@reviewEdit')->name('mypage.review.edit');
Route::post('mypage/review/check', 'MypageController@reviewCheck')->name('mypage.review.check');
Route::post('mypage/review/store', 'MypageController@reviewStore')->name('mypage.review.store');
Route::get('mypage/review/delete', 'MypageController@reviewDeleteCheck')->name('mypage.review.delete');
Route::post('mypage/review/delete', 'MypageController@reviewDelete')->name('mypage.review.delete');

// admin
Route::get('admin', 'AdminController@index')->name('admin')->middleware('auth:administer');

// admin.member
Route::get('admin/member', 'Admin\AdminMemberController@memberIndex')->name('admin.member')->middleware('auth:administer');
Route::post('admin/member', 'Admin\AdminMemberController@memberIndex')->name('admin.member')->middleware('auth:administer');

Route::get('admin/member/register', 'Admin\AdminMemberController@getMemberRegister')->name('admin.member.register')->middleware('auth:administer');
Route::post('admin/member/register', 'Admin\AdminMemberController@postMemberRegister')->name('admin.member.register')->middleware('auth:administer');
Route::get('admin/member/register/check', 'Admin\AdminMemberController@memberRegisterCheck')->name('admin.member.register.check')->middleware('auth:administer');
Route::post('admin/member/register/store', 'Admin\AdminMemberController@memberRegisterStore')->name('admin.member.register.store')->middleware('auth:administer');

Route::get('admin/member/edit', 'Admin\AdminMemberController@getMemberEdit')->name('admin.member.edit')->middleware('auth:administer');
Route::post('admin/member/edit', 'Admin\AdminMemberController@postMemberEdit')->name('admin.member.edit')->middleware('auth:administer');
Route::get('admin/member/edit/check', 'Admin\AdminMemberController@memberEditCheck')->name('admin.member.edit.check')->middleware('auth:administer');
Route::post('admin/member/edit/store', 'Admin\AdminMemberController@memberEditStore')->name('admin.member.edit.store')->middleware('auth:administer');

Route::get('admin/member/detail', 'Admin\AdminMemberController@memberDetail')->name('admin.member.detail')->middleware('auth:administer');
Route::get('admin/member/detail/delete', 'Admin\AdminMemberController@memberDetailDelete')->name('admin.member.detail.delete')->middleware('auth:administer');

// admin.category
Route::get('admin/category', 'Admin\AdminCategoryController@categoryIndex')->name('admin.category')->middleware('auth:administer');
Route::post('admin/category', 'Admin\AdminCategoryController@categoryIndex')->name('admin.category')->middleware('auth:administer');

Route::get('admin/category/register', 'Admin\AdminCategoryController@getCategoryRegister')->name('admin.category.register')->middleware('auth:administer');
Route::post('admin/category/register', 'Admin\AdminCategoryController@postCategoryRegister')->name('admin.category.register')->middleware('auth:administer');
Route::get('admin/category/register/check', 'Admin\AdminCategoryController@categoryRegisterCheck')->name('admin.category.register.check')->middleware('auth:administer');
Route::post('admin/category/register/store', 'Admin\AdminCategoryController@categoryRegisterStore')->name('admin.category.register.store')->middleware('auth:administer');

Route::get('admin/category/edit', 'Admin\AdminCategoryController@getCategoryEdit')->name('admin.category.edit')->middleware('auth:administer');
Route::post('admin/category/edit', 'Admin\AdminCategoryController@postCategoryEdit')->name('admin.category.edit')->middleware('auth:administer');
Route::get('admin/category/edit/check', 'Admin\AdminCategoryController@categoryEditCheck')->name('admin.category.edit.check')->middleware('auth:administer');
Route::post('admin/category/edit/store', 'Admin\AdminCategoryController@categoryEditStore')->name('admin.category.edit.store')->middleware('auth:administer');

Route::get('admin/category/detail', 'Admin\AdminCategoryController@categoryDetail')->name('admin.category.detail')->middleware('auth:administer');
Route::get('admin/category/detail/delete', 'Admin\AdminCategoryController@categoryDetailDelete')->name('admin.category.detail.delete')->middleware('auth:administer');
