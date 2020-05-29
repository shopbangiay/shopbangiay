<?php

namespace App\Http\Controllers;

use App\Brand;
use App\CateModel;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function save_cart(Request $request){
       
        $product_id = $request->productid_hidden;
        $quantity = $request->qty;

        $product_info = DB::table('product')->where('product_id', $product_id)->first();

        // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        // Cart::destroy();

        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = '123';
        $data['options']['image'] = $product_info->product_image;
        Cart::add($data);
        return Redirect::to('/show-cart');
        
       
    }
    
    public function show_cart(){
        $data_cate = CateModel::select('category_id', 'category_name')->get();
        $data_brand = Brand::select('brand_id', 'brand_name')->get();

        return view('pages.cart.show_cart')
        ->with('data_cate', $data_cate)
        ->with('data_brand', $data_brand);
    }

    public function delete_cart($rowId){
        Cart::update($rowId, 0);
        return Redirect::to('/show-cart');
    }

    public function update_cart_qty(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->quantity_cart;
        Cart::update($rowId, $qty);
        return Redirect::to('/show-cart');
    }
}
