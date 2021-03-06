@extends('admin.master')
@section('controller', 'Cate')
@section('action', 'Add')
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
    <form action="{{URL::to('admin/cate/save-category')}}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Category Name</label>
            <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" />
        </div>
        <div class="form-group">
            <label>Category Description</label>
            <textarea class="form-control" rows="3" name="txtDescription"></textarea>
        </div>
        <div class="form-group">
            <label>Category Status</label>
            <select name="txtStatus" class="form-control">
                <option value="0">Ẩn</option>
                <option value="1">Hiện</option>
            </select>
        </div>
        <button type="submit" name="save_category" class="btn btn-success">Category Add</button>
        <form>
        </div>
@endsection