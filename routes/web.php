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
Route::get('/','HomeController@index');
Route::get('/danh-muc-san-pham/{id}', 'HomeController@show_category');
// Route::get('/danh-muc-san-pham/{brand_id}', 'BrandProduct@show_brand');
Route::get('/dashboard', 'HomeController@show_dashboard');
Route::get('/Thuong-Hieu/{brand_id}', 'HomeController@show_brand');


//-------------------------------DANH MỤC SẢN PHẨM------------------------- */
Route::get('/add-category', 'CateController@add_category');
Route::get('/all-category', 'CateController@all_category');
Route::get('/edit-category/{id_cate}', 'CateController@edit_category');
Route::get('/delete-category/{id_cate}', 'CateController@delete_category');
Route::get('/unactive-category/{id_cate}', 'CateController@unactive_category');
Route::get('/active-category/{id_cate}', 'CateController@active_category');

Route::post('/save-category', 'CateController@save_category');
Route::post('/update-category/{id_cate}', 'CateController@update_category');
// -------------------------------------------------------------------------

//-------------------------------THƯƠNG HIỆU SẢN PHẨM----------------------- */
Route::get('/add-brand', 'BrandController@add_brand');
Route::get('/all-brand', 'BrandController@all_brand');
Route::get('/edit-brand/{id_brand}', 'BrandController@edit_brand');
Route::get('/delete-brand/{id_brand}', 'BrandController@delete_brand');
Route::get('/unactive-brand/{id_brand}', 'BrandController@unactive_brand');
Route::get('/active-brand/{id_brand}', 'BrandController@active_brand');

Route::post('/save-brand', 'BrandController@save_brand');
Route::post('/update-brand/{id_brand}', 'BrandController@update_brand');
// -------------------------------------------------------------------------

//-------------------------------SẢN PHẨM----------------------------------- */

// -------------------------------------------------------------------------

//-------------------------------CART--------------------------------------- */

// -------------------------------------------------------------------------

//-------------------------------THANH TOÁN--------------------------------- */

// -------------------------------------------------------------------------

//-------------------------------ĐẶT HÀNG----------------------------------- */

// -------------------------------------------------------------------------
