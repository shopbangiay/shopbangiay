@extends('admin.master')
@section('controller', 'User')
@section('action', 'Add')
@section('content')
<div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{URL::to('/save-user')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="txtUser" placeholder="Please Enter Username" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="txtEmail" placeholder="Please Enter Email" />
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" name="txtPass" placeholder="Please Enter Password" />
                            </div>
                            <!-- <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password" class="form-control" name="txtRePass" placeholder="Please Enter RePassword" />
                            </div> -->
                            
                            <button type="submit" class="btn btn-success" name="save_user">Thêm thành viên</button>
                        <form>
                    </div>
@endsection