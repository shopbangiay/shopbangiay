@extends('admin.master')
<<<<<<< HEAD
@section('controller', 'Thuong')
@section('action', 'hieu')
=======
@section('controller', 'Thương Hiệu  ')
@section('action', '')
>>>>>>> origin/master
@section('content')
<!-- /.col-lg-12 -->
<div class="col-lg-7" style="padding-bottom:120px">
    @if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{URL::to('admin/brand/save-brand')}}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Tên Thương Hiệu</label>
            <input class="form-control" name="txtBrandName" placeholder="Please Enter Brand Name" />
        </div>
        <div class="form-group">
<<<<<<< HEAD
            <label>Mô tả thương hiệu</label>
            <textarea class="form-control" rows="3" name="txtDescription"></textarea>
        </div>
        <div class="form-group">
            <label>Trạng thái</label>
=======
            <label>Mô Tả</label>
            <textarea class="form-control" rows="3" name="txtDescription"></textarea>
        </div>
        <div class="form-group">
            <label>Trạng Thái</label>
>>>>>>> origin/master
            <select name="txtStatus" class="form-control">
                <option value="0">Hiện</option>
                <option value="1">Ẩn</option>
            </select>
        </div>
        <button type="submit" name="save_brand" class="btn btn-success">Thêm</button>
        <form>
        </div>
@endsection