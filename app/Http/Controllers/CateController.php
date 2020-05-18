<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CateRequest;
use App\CateModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CateController extends Controller
{
    // public function getList(){
    //     $data_cate = CateModel::select('category_id', 'category_name')->get();
    //     return view('admin.cate.cate_list')->with('data_cate', $data_cate);
    // }

    public function add_category(){
        return view('admin.cate.cate_add');
    }
    public function all_category(){
        $data_cate = CateModel::all();
        return view('admin.cate.cate_list')->with('data_cate', $data_cate);
    }
    public function save_category(Request $request){
        $cate = new CateModel();
        $cate->category_name = $request->txtCateName;
        $cate->category_desc = $request->txtDescription;
        $cate->category_status = $request->txtStatus;

        $cate->save();
        return Redirect::to('all-category')->with(['flash_level' => 'success','flash_message' => 'Thêm thành công']);
        // return redirect()->route('admin.cate.list')->with(['flash_level' => 'success','flash_message' => 'Thêm thành công']);
    }
    public function unactive_category($category_id){
        $unactive = CateModel::where('category_id', $category_id)->update(['category_status' => 0]);
        return Redirect::to('all-category')->with(['flash_level' => 'success', 'flash_message' => 'Cập nhật trạng thái Ẩn thành công']);
    }
    public function active_category($category_id){
        $active = CateModel::where('category_id', $category_id)->update(['category_status' => 1]);
        return Redirect::to('all-category')->with(['flash_level' => 'success', 'flash_message' => 'Cập nhật trạng thái Hiện thành công']);
    }


    public function edit_category($category_id){
        $edit_cate = CateModel::find($category_id);
        return view('admin.cate.cate_edit')->with('edit_cate', $edit_cate);
    }

    public function update_category(Request $request ,$category_id){
        $update_cate = CateModel::find($category_id);
        $update_cate->category_name = $request->txtCateName;
        $update_cate->category_desc = $request->txtDescription;

        $update_cate->save();
        return Redirect::to('all-category')->with(['flash_level' => 'success', 'flash_message' => 'Cập nhật danh mục thành công']);
    }

    public function delete_category($category_id){
        $del_cate = CateModel::find($category_id);
        $del_cate->delete();
        return Redirect::to('all-category')->with(['flash_level' => 'success', 'flash_message' => 'Xóa danh mục thành công']);
    }
        
    // }
    // public function postEdit(Request $request){
    //     $this->validate($request,
    //     [
    //         'txtCateName' => 'required',
    //         'txtCateName.required' => 'Vui lòng không để trống!!!'
    //     ]);
    // }
}
