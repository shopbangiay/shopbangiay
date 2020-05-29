<?php

namespace App\Http\Controllers;

use App\CateModel;
use App\Brand;
use App\Product;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data_cate = CateModel::select('category_id', 'category_name')->get();
        $data_brand = Brand::select('brand_id', 'brand_name')->get();
        return view('pages.home')->with('data_cate', $data_cate)->with('data_brand', $data_brand);
    }
    public function show_category($id){
        $data_cate = CateModel::select('category_id', 'category_name')->get();
        $data_brand = Brand::select('brand_id', 'brand_name')->get();
        $cate = CateModel::find($id);
        
    
        $cate_id = Product::join('category_product as cate', 'product.category_id', 'cate.category_id')
                            ->where('cate.category_id', $id)
                            ->select('product.product_name', 'product.product_price')
                            ->get();
        return view('pages.category.show_category')->with('data_cate', $data_cate)->with('data_brand', $data_brand)->with('cate', $cate)->with('cate_id', $cate_id);
    }
    public function show_brand($brand_id){
         $data_cate = CateModel::select('category_id', 'category_name')->get();
        $data_brand = Brand::select('brand_id', 'brand_name')->get();
        $brand = Brand::find($brand_id);
    
        $brand_by_id = Product::join('brand_product as brand', 'product.brand_id', 'brand.brand_id')
                            ->where('brand.brand_id', $brand_id)
                            ->select('product.product_name', 'product.product_price')
                            ->get();



                return view('pages.brand.show_brand')->with('data_cate', $data_cate)->with('data_brand', $data_brand)->with('brand', $brand)->with('brand_by_id', $brand_by_id);
    }
    
    public function show_dashboard(){
        return view('admin.master');
    }
}
