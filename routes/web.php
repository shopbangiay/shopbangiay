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
Route::get('/dashboard', 'HomeController@show_dashboard');


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

// -------------------------------------------------------------------------

//-------------------------------SẢN PHẨM----------------------------------- */

// -------------------------------------------------------------------------

//-------------------------------CART--------------------------------------- */

// -------------------------------------------------------------------------

//-------------------------------THANH TOÁN--------------------------------- */

// -------------------------------------------------------------------------

//-------------------------------ĐẶT HÀNG----------------------------------- */

// -------------------------------------------------------------------------
