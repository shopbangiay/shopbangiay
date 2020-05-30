@extends('admin.master')
@section('controller', 'Thêm')
@section('action', 'Sản Phẩm')
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
    <form action="{{URL::to('/save-product')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Tên Sản Phẩm</label>
            <input class="form-control" name="product_name" placeholder="Vui lòng nhập tên sản phẩm" />
        </div>
        <div class="form-group">
            <label>Giá</label>
            <input class="form-control" name="product_price" placeholder="Vui lòng nhập giá" />
        </div>
        <div class="form-group">
             <label>Nội Dung Sản Phẩm</label>
             <textarea class="form-control" rows="3" name="product_content"></textarea>
        </div>
        <div class="form-group">
            <label>Ảnh Sản Phẩm</label>
            <input type="file" name="product_image">
        </div>
        <div class="form-group">
            <label>Mô tả Sản Phẩm</label>
            <textarea class="form-control" name="product_desc" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label>Danh Mục sản phẩm</label>
            <select name="product_cate" class="form-control">
            @foreach($cate_product as $key => $cate)
                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Thương hiệu sản phẩm</label>
            <select name="product_brand" class="form-control">
            @foreach($brand_product as $key => $brand)
                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Trạng thái sản phẩm</label>
            <select name="product_status" class="form-control">
                <option value="0">Ẩn</option>
                <option value="1">Hiện</option>
            </select>
        </div>
        <button type="submit" name="add_product" class="btn btn-default">Thêm Sản Phẩm</button>
        <button type="reset" class="btn btn-default">Nhập lại</button>
        <form>
        </div>
@endsection
