<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\CateModel;
use App\Brand;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index(){
        $data_cate = CateModel::select('category_id', 'category_name')->get();
        $data_brand = Brand::select('brand_id', 'brand_name')->get();
        // $all_product = DB::table('product')
        // ->join('category_product','category_product.category_id','=','product.category_id')
        // ->join('brand_product','brand_product.brand_id','=','product.brand_id')
        // ->orderby('product.product_id','desc')->get();
        $all_product = DB::table('product')->where('product_status','1')->orderby('product_id','desc')->limit(3)->get();
        return view('pages.home')->with('data_cate', $data_cate)->with('data_brand', $data_brand)->with('all_product',$all_product);
    }
    public function show_category($id){
        $data_cate = CateModel::select('category_id', 'category_name')->get();
        $data_brand = Brand::select('brand_id', 'brand_name')->get();
        $cate = CateModel::find($id);
        
    
        $cate_id = Product::join('category_product as cate', 'product.category_id', 'cate.category_id')
                            ->where('cate.category_id', $id)
                            ->select('product.product_name', 'product.product_price')
                            ->get();

        $detail_sp = DB::table('product as sp')->join('category_product as cate', 'cate.category_id', '=', 'sp.category_id')
                        ->where('sp.category_id', $id)->get();
        return view('pages.category.show_category')->with('data_cate', $data_cate)->with('data_brand', $data_brand)->with('cate', $cate)->with('cate_id', $cate_id)->with('detail_sp', $detail_sp);
    }
    public function show_dashboard(){
        return view('admin.master');
    }
    public function show_detail($id){
        
        $detail_sp = DB::table('product as sp')->join('category_product as cate', 'cate.category_id', '=', 'sp.category_id')
                        ->where('sp.category_id', $id)
                        ->select('sp.product_id' ,'sp.product_name', 'sp.product_image','sp.product_price', 'sp.product_desc', 'sp.product_content')
                        ->get();
        return view('pages.sanpham.show_details')->with('detail_sp', $detail_sp);
    }
}
