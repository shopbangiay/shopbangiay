<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\CateModel;
use App\Brand;
use App\Product;
// use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index(){
        $data_cate = CateModel::select('category_id', 'category_name')->get();
        $data_brand = Brand::select('brand_id', 'brand_name')->get();
        $all_product = DB::table('product')
         ->join('category_product','category_product.category_id','=','product.category_id')
        ->join('brand_product','brand_product.brand_id','=','product.brand_id')
        ->orderby('product.product_id','desc')->get();
        $all_product = DB::table('product')->where('product_status','1')->orderby('product_id','desc')->limit(3)->get();
        return view('pages.home')->with('data_cate', $data_cate)->with('data_brand', $data_brand)->with('all_product',$all_product);
    }
    public function show_category($id){
        $data_cate = CateModel::select('category_id', 'category_name')->get();
        $data_brand = Brand::select('brand_id', 'brand_name')->get();
        $cate = CateModel::find($id);
        
    
        $cate_id = Product::join('category_product as cate', 'product.category_id', 'cate.category_id')
                            ->join('brand_product as brand', 'brand.brand_id', 'product.brand_id')
                            ->where('cate.category_id', $id)
                            ->select('cate.category_id' ,'product.product_id' ,'product.product_name', 'product.product_image','product.product_price', 'product.product_desc', 'product.product_content', 'cate.category_name', 'brand.brand_name')

<<<<<<< HEAD
                            ->get();
        return view('pages.category.show_category')
                ->with('data_cate', $data_cate)
                ->with('data_brand', $data_brand)
                ->with('cate', $cate)
                ->with('cate_id', $cate_id)

=======
>>>>>>> 7e56df48fb4250164d1da88b1dcf973efc444b6b
                            ->get();
        return view('pages.category.show_category')
                ->with('data_cate', $data_cate)
                ->with('data_brand', $data_brand)
                ->with('cate', $cate)
                ->with('cate_id', $cate_id);
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
<<<<<<< HEAD

=======
>>>>>>> 7e56df48fb4250164d1da88b1dcf973efc444b6b
    }
    
    public function show_dashboard(){
        return view('admin.master');
    }
    public function show_detail($id){
        $data_cate = CateModel::select('category_id', 'category_name')->get();
        $data_brand = Brand::select('brand_id', 'brand_name')->get();
        $detail_sp = DB::table('product as sp')
                        ->join('category_product as cate', 'cate.category_id', '=', 'sp.category_id')
                        ->join('brand_product as brand', 'brand.brand_id', '=', 'sp.brand_id')
                        ->where('sp.product_id', $id)
                        ->select('cate.category_id' ,'sp.product_id' ,'sp.product_name', 'sp.product_image','sp.product_price', 'sp.product_desc', 'sp.product_content', 'cate.category_name', 'brand.brand_name')
                        ->get();
        
        foreach($detail_sp as $key => $value){
            $get_cate_id = $value->category_id;
        }

        $sp_lienquan = DB::table('product as sp')
                        ->join('category_product as cate', 'cate.category_id', '=', 'sp.category_id')
                        ->join('brand_product as brand', 'brand.brand_id', '=', 'sp.brand_id')
                        ->where('cate.category_id', $get_cate_id)
                        ->whereNotIn('sp.product_id', [$id])
                        ->get();
        
        return view('pages.sanpham.show_details')
                ->with('detail_sp', $detail_sp)
                ->with('data_cate', $data_cate)
                ->with('data_brand', $data_brand)
                ->with('relate', $sp_lienquan);
    }
    public function search(Request $request){
         $keywords = $request->keywords_submit;
             $data_cate = CateModel::select('category_id', 'category_name')->get();
             $data_brand = Brand::select('brand_id', 'brand_name')->get();
              $search_product = DB::table('product')->where('product_name','like','%'.$keywords.'%')->get();
        return view('pages.sanpham.search')->with('data_cate',$data_cate)->with('data_brand',$data_brand)->with('search_product',$search_product);

    }
}
