@extends('admin.master')
@section('controller', 'Sửa')
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

    @foreach($edit_product as $pro)
    <form action="{{URL::to('/update-product/'.$pro->product_id)}}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Tên Sản Phẩm</label>
            <input class="form-control" name="product_name" value="{{$pro->product_name}}" />
        </div>
        <div class="form-group">
            <label>Giá</label>
            <input class="form-control" name="product_price" value="{{$pro->product_price}} "/>
        </div>
        <div class="form-group">
             <label for="exampleInputPassword1">Nội Dung Sản Phẩm</label>
             <textarea name="product_content" class="form-control" rows="5" id="exampleInputPassword1">{{$pro->product_content}}</textarea>
        </div>
        <div class="form-group">
            <label>Ảnh Sản Phẩm</label>
            <input type="file" name="product_image">
            <img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" height="200" width="200">
            
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Mô tả Sản Phẩm</label>
            <textarea class="form-control" name="product_desc" rows="5" id="exampleInputPassword1">{{$pro->product_desc}}</textarea>
        </div>
        <div class="form-group">
            <label>Danh Mục sản phẩm</label>
            <select name="product_cate" class="form-control">
            @foreach($cate_product as $cate)
                @if($cate->category_id==$pro->category_id)
                <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                @else
                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                @endif
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Thương hiệu sản phẩm</label>
            <select name="product_brand" class="form-control">
            @foreach($brand_product as $key => $brand)
                @if($brand->brand_id==$pro->brand_id)
                <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                @else
                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                @endif
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Trạng thái sản phẩm</label>
            <select name="product_status" class="form-control">
                <option value="0">Hiện</option>
                <option value="1">Ẩn</option>
            </select>
        </div>
        <button type="submit" name="update_product" class="btn btn-default">Sửa Sản Phẩm</button>
        <button type="reset" class="btn btn-default">Nhập lại</button>
        <form>
        @endforeach
        </div>
@endsection
