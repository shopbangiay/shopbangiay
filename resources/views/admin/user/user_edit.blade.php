@extends('admin.master')
@section('controller', 'User')
@section('action', 'Edit')
@section('content')
<div class="col-lg-7" style="padding-bottom:120px">
                        @foreach($edit_admin as $item)
                        <form action="{{URL::to('admin/user/update-user/'. $item->admin_id)}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="txtUser" value="{{$item->admin_name}}" placeholder="Please Enter Username" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="txtEmail" value="{{$item->admin_email}}" placeholder="Please Enter Email" />
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" name="txtPass" value="{{$item->admin_password}}" placeholder="Please Enter Password" />
                            </div>
                            <!-- <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password" class="form-control" name="txtRePass" placeholder="Please Enter RePassword" />
                            </div> -->
                            
                            <button type="submit" class="btn btn-success" name="update_user">Cập nhật thành viên</button>
                        <form>
                        @endforeach
                    </div>
@endsection