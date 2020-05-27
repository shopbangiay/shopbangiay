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
Route::get('/chi-tiet-san-pham/{id}','HomeController@show_detail');
Route::get('Trang-chu','HomeController@index');
Route::post('/tim-kiem','HomeController@search');


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
Route::get('/add-product', 'ProductController@add_product');
Route::get('/all-product', 'ProductController@all_product');
Route::get('/edit-product/{id_product}', 'ProductController@edit_product');
Route::get('/delete-product/{id_product}', 'ProductController@delete_product');
Route::get('/unactive-product/{id_product}', 'ProductController@unactive_product');
Route::get('/active-product/{id_product}', 'ProductController@active_product');

Route::post('/save-product', 'ProductController@save_product');
Route::post('/update-product/{id_product}', 'ProductController@update_product');
// -------------------------------------------------------------------------

//-------------------------------CART--------------------------------------- */
Route::post('/save-cart', 'CartController@save_cart');
Route::post('/update-cart-qty', 'CartController@update_cart_qty');
Route::get('/show-cart', 'CartController@show_cart');
Route::get('/delete-cart/{rowId}', 'CartController@delete_cart');

// -------------------------------------------------------------------------

//----Đăng nhập vs Đăng xuất trước thanh toán và sau thanh toán---------- */
Route::get('/login-checkout','CheckoutController@login_checkout');
Route::get('/payment','CheckoutController@payment');
Route::get('/checkout','CheckoutController@checkout');
Route::get('/logout-checkout','CheckoutController@logout_checkout');


Route::post('/add-customer','CheckoutController@add_customer');
Route::post('/save-checkout-customer','CheckoutController@save_checkout_customer');
Route::post('/login-customer','CheckoutController@login_customer');
Route::post('/order-place','CheckoutController@order_place');
// -------------------------------------------------------------------------

//-------------------------------ĐẶT HÀNG----------------------------------- */

// -------------------------------------------------------------------------
