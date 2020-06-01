<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
use Admin;


class AdminController extends Controller
{
    public function getDangnhapadmin(){
    	return view('admin.admin_login');
    }
    public function postDangnhapadmin(Request $request){
    	$this->validate($request,[
    		'email' => 'required|email|unique:users,email',
    		'password'=>'required|min:3|max:32'
    	],[
    		'email.required' => 'Bạn chưa nhập email',
    		'email.email'=>'Bạn chưa nhập đúng định dạng mail',
    		'email.unique'=>'Email đã tồn tại',
    		'password.required'=>'Bạn chưa nhập mật khẩu',
    		'password.min'=>'Mật khẩu phải có ít nhất 3 kí tự',
    		'password.max'=>'Mật khẩu chỉ được tối đa 32 kí tự'
    	]);
    	
    	if(Auth::attemp(['email' => $request->email, 'password' => $request->password]))
    	{
    		return Redirect::to('admin/cate/add-category');
    	}else{
    		return Redirect::to('admin.admin_login')->with(['flash_level' => 'danger', 'flash_message' => 'Đăng nhập không thành công']);
    	}
    }
    public function show_dashboard(){
        return view('admin.master');
    }
    public function dashboard(Request $request){
        $admin_email=$request->admin_email;
        $admin_password=md5($request->admin_password);

        $result =DB::table('admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        if($result){
           Session::put('admin_name',$result->admin_name);
           Session::put('admin_id',$result->admin_id);
          return Redirect::to('/dashboard');
      }else{
             Session::put('message','mật khẩu và tài khoản sai nên nhập lại nhaa!');
            return Redirect::to('/admin/login');
      }
    
  }
  public function logout(){
    Session::put('admin_name',null);
    Session::put('admin_id',null);
    return Redirect::to('/admin/login');
  } 

  public function add_user(){
    return view('admin.user.user_add');
  }

  public function all_user(){
    $all_user = DB::table('admin')->get();
    return view('admin.user.user_list')->with('all_user', $all_user);
  }

  public function save_user(Request $request){
    // $this->validate($request,[
    //   'txtUser' => 'required|min:3',
    //   'txtEmail' => 'required|email|unique:admin,admin_email',
    //   'txtPass' => 'required|min:3|max:32',
    //   'txtRePass' => 'required|same:admin_password' 
    // ],[
    //   'txtUser.required' => 'Bạn chưa nhập tên người dùng',
    //   'txtUser.min' => 'Tên phải ít nhất 3 ký tự',
    //   'txtEmail.required' => 'Bạn chưa nhập email',
    //   'txtEmail.email' => 'Bạn chưa nhập đúng định danh email',
    //   'txtEmail.unique' => 'Email đã tồn tại',
    //   'txtPass.required' => 'Bạn chưa nhập mật khẩu',
    //   'txtPass.min' => 'Mật khẩu ít nhất 3 ký tự',
    //   'txtPass.max' => 'Mật khẩu không lớn hơn 32 ký tự',
    //   'txtRePass.required' => 'Bạn chưa nhập lại mật khẩu',
    //   'txtRePass.same' => 'Mật khẩu nhập lại chưa trùng khớp'
    // ]);

    $data = array();
    $data['admin_name'] = $request->txtUser;
    $data['admin_email'] = $request->txtEmail;
    $data['admin_password'] = md5($request->txtPass);

    DB::table('admin')->insert($data);
    return Redirect::to('add-user')->with(['flash_level' => 'success','flash_message' => 'Thêm thành công']);
  }

  public function edit_user($id){
    $edit_admin = DB::table('admin')->where('admin_id', $id)->get();
    return view('admin.user.user_edit')->with('edit_admin', $edit_admin);
  }

  public function update_user(Request $request ,$id){
    $data = array();
    $data['admin_name'] = $request->txtUser;
    $data['admin_email'] = $request->txtEmail;
    $data['admin_password'] = md5($request->txtPass);

    DB::table('admin')->where('admin_id', $id)->update($data);
    return Redirect::to('all-user')->with(['flash_level' => 'success','flash_message' => 'Cập nhật thành công']);
  }

  public function delete_user($id){
    $del_admin = DB::table('admin')->where('admin_id', $id)->delete();
    return Redirect::to('all-user')->with(['flash_level' => 'success','flash_message' => 'Xóa thành viên thành công']);
  }
    
}
