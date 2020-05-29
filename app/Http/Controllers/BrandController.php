<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Illuminate\Support\Facades\Redirect;

class BrandController extends Controller
{
    public function add_brand(){
    	return view('admin.brand.brand_add');
    }
    public function all_brand(){
    	$data_brand = Brand::all();
    	return view('admin.brand.brand_list')->with('data_brand', $data_brand);
    }
    public function save_brand(Request $request){
    	$brand = new Brand();
        $brand->brand_name = $request->txtBrandName;
        $brand->brand_desc = $request->txtDescription;
        $brand->brand_status = $request->txtStatus;

        $brand->save();
        return Redirect::to('all-brand')->with(['flash_level' => 'success','flash_message' => 'Thêm thành công']);
    }
    public function unactive_brand($brand_id){
        $unactive = Brand::where('brand_id', $brand_id)->update(['brand_status' => 0]);
        return Redirect::to('all-brand')->with(['flash_level' => 'success', 'flash_message' => 'Cập nhật trạng thái Ẩn thành công']);
    }
    public function active_brand($brand_id){
        $active = Brand::where('brand_id', $brand_id)->update(['brand_status' => 1]);
        return Redirect::to('all-brand')->with(['flash_level' => 'success', 'flash_message' => 'Cập nhật trạng thái Hiện thành công']);
    }
    public function edit_brand($brand_id){
        $edit_brand = Brand::find($brand_id);
        return view('admin.brand.brand_edit')->with('edit_brand', $edit_brand);
    }

    public function update_brand(Request $request ,$brand_id){
        $update_brand = Brand::find($brand_id);
        $update_brand->brand_name = $request->txtBrandName;
        $update_brand->brand_desc = $request->txtDescription;

        $update_brand->save();
        return Redirect::to('all-brand')->with(['flash_level' => 'success', 'flash_message' => 'Cập nhập thương hiệu thành công']);
    }
    public function delete_brand($brand_id){
        $del_brand = Brand::find($brand_id);
        $del_brand->delete();
        return Redirect::to('all-brand')->with(['flash_level' => 'success', 'flash_message' => 'Xóa thương hiệu thành công']);
    }
}
