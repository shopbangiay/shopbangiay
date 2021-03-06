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
Route::get('/team-info','HomeController@team_info');
Route::get('/danh-muc-san-pham/{id}', 'HomeController@show_category');
Route::get('/danh-muc-san-pham/{brand_id}', 'BrandProduct@show_brand');
Route::get('/dashboard', 'HomeController@show_dashboard');

Route::get('/Thuong-Hieu/{brand_id}', 'HomeController@show_brand');

Route::get('/chi-tiet-san-pham/{id}','HomeController@show_detail');
Route::get('Trang-chu','HomeController@index');
Route::post('/tim-kiem','HomeController@search');

Route::get('admin/login', 'AdminController@getDangnhapadmin');
Route::post('admin/login', 'AdminController@postDangnhapadmin');

Route::post('admin/dashboard', 'AdminController@dashboard');
Route::get('/logout', 'AdminController@logout');



//-------------------------------USER------------------------- */

// -------------------------------------------------------------------------


Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'cate'], function () {
        Route::get('/add-category', 'CateController@add_category');
        Route::get('/all-category', 'CateController@all_category');
        Route::get('/edit-category/{id_cate}', 'CateController@edit_category');
        Route::get('/delete-category/{id_cate}', 'CateController@delete_category');
        Route::get('/unactive-category/{id_cate}', 'CateController@unactive_category');
        Route::get('/active-category/{id_cate}', 'CateController@active_category');

        Route::post('/save-category', 'CateController@save_category');
        Route::post('/update-category/{id_cate}', 'CateController@update_category');
    });
    Route::group(['prefix' => 'brand'], function () {
        Route::get('/add-brand', 'BrandController@add_brand');
        Route::get('/all-brand', 'BrandController@all_brand');
        Route::get('/edit-brand/{id_brand}', 'BrandController@edit_brand');
        Route::get('/delete-brand/{id_brand}', 'BrandController@delete_brand');
        Route::get('/unactive-brand/{id_brand}', 'BrandController@unactive_brand');
        Route::get('/active-brand/{id_brand}', 'BrandController@active_brand');

        Route::post('/save-brand', 'BrandController@save_brand');
        Route::post('/update-brand/{id_brand}', 'BrandController@update_brand');
    });
    Route::group(['prefix' => 'product'], function () {
        Route::get('/add-product', 'ProductController@add_product');
        Route::get('/all-product', 'ProductController@all_product');
        Route::get('/edit-product/{id_product}', 'ProductController@edit_product');
        Route::get('/delete-product/{id_product}', 'ProductController@delete_product');
        Route::get('/unactive-product/{id_product}', 'ProductController@unactive_product');
        Route::get('/active-product/{id_product}', 'ProductController@active_product');

        Route::post('/save-product', 'ProductController@save_product');
        Route::post('/update-product/{id_product}', 'ProductController@update_product');
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('/all-user', 'AdminController@all_user');
		Route::get('/add-user', 'AdminController@add_user');
		Route::get('/delete-user/{admin_id}','AdminController@delete_user');
		Route::get('/edit-user/{admin_id}','AdminController@edit_user');
		Route::post('/save-user', 'AdminController@save_user');
		Route::post('/update-user/{admin_id}', 'AdminController@update_user');
    });
});
// ----------------------------------------------------------------------------

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
Route::get('/print-order/{checkout_code}','CheckoutController@print_order');
Route::get('/manage-order','CheckoutController@manage_order');
Route::get('/view-order/{order_code}','CheckoutController@view_order');
// -------------------------------------------------------------------------
