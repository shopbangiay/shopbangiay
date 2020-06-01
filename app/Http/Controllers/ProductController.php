<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CateRequest;
use App\CateModel;
use App\Product;
use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function add_product(){
        // $cate_product = DB::table('category_product')->orderby('category_id','desc')->get();
        $cate_product = CateModel::select('category_id', 'category_name')->get();
        $brand_product = Brand::select('brand_id', 'brand_name')->get();
        // $brand_product = DB::table('brand_product')->orderby('brand_id','desc')->get();
        return view('admin.product.product_add')->with('cate_product',$cate_product)->with('brand_product', $brand_product);
    }
    public function all_product(){
        $all_product = DB::table('product')
        ->join('category_product','category_product.category_id','=','product.category_id')
        ->join('brand_product','brand_product.brand_id','=','product.brand_id')
        ->orderby('product.product_id','desc')->get();
        // $cate_id = Product::join('category_product as cate', 'product.category_id', 'cate.category_id')
        //                     ->where('cate.category_id', $id)
        //                     ->select('product.product_name', 'product.product_price')
        //                     ->get();
        // $all_product = Product::join('category_product as cate', 'product.category_id', 'cate.category_id')
        //                     ->where('cate.category_id', $product_idd)
        //                     ->select('product.product_id', 'product.product_name')
        //                     ->get();
        return view('admin.product.product_list')->with('all_product', $all_product);
    }
    public function save_product(Request $request){

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_content'] = $request->product_content;
        $data['product_desc'] = $request->product_desc;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
        
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('product')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('admin/product/add-product');
        }
        $data['product_image']='';
        DB::table('product')->insert($data);
        Session::put('message','Thêm sản phẩm thành công');
        return Redirect::to('admin/product/add-product');
        // return redirect()->route('admin.cate.list')->with(['flash_level' => 'success','flash_message' => 'Thêm thành công']);
    }
    public function unactive_product($product_id){
        $unactive = Product::where('product_id', $product_id)->update(['product_status' => 0]);
        return Redirect::to('admin/product/all-product')->with(['flash_level' => 'success', 'flash_message' => 'Cập nhật trạng thái Ẩn thành công']);
    }
    public function active_product($product_id){
        $active = Product::where('product_id', $product_id)->update(['product_status' => 1]);
        return Redirect::to('admin/product/all-product')->with(['flash_level' => 'success', 'flash_message' => 'Cập nhật trạng thái Ẩn thành công']);
    }


    public function edit_product($product_id){
        $cate_product = DB::table('category_product')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('brand_product')->orderby('brand_id', 'desc')->get();

        $edit_product = DB::table('product')->where('product_id', $product_id)->get();

        $manager_product = view('admin.product.product_edit')
                            ->with('edit_product', $edit_product)
                            ->with('cate_product', $cate_product)
                            ->with('brand_product', $brand_product);


        return view('admin.master')->with('admin.product.product_edit', $manager_product);
    }

    public function update_product(Request $request ,$product_id){
        $data = array();
        $data['product_name'] = $request->product_name;
       
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
        
        if($get_image){
                    $get_name_image = $get_image->getClientOriginalName();
                    $name_image = current(explode('.',$get_name_image));
                    $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                    $get_image->move('public/uploads/product',$new_image);
                    $data['product_image'] = $new_image;
                    DB::table('product')->where('product_id',$product_id)->update($data);
                    Session::put('message','Cập nhật sản phẩm thành công');
                    return Redirect::to('admin/product/all-product');
        }
            
        DB::table('product')->where('product_id',$product_id)->update($data);
        Session::put('message','Cập nhật sản phẩm thành công');
        return Redirect::to('admin/product/all-product');
    }

    public function delete_product($product_id){
        $del_product = Product::find($product_id);
        $del_product->delete();
        return Redirect::to('admin/product/all-product')->with(['flash_level' => 'success', 'flash_message' => 'Xóa danh mục thành công']);
    }
   
}
