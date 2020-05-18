@extends('admin.master')
@section('controller', 'Cate')
@section('action', 'Edit')
@section('content')
    <!-- /.col-lg-12 -->
    <div class="col-lg-7" style="padding-bottom:120px">
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->any() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{URL::to('/update-category/'.$edit_cate->category_id)}}" method="POST">
            {{csrf_field()}}
            <div class="form-group">
            <label>Category Name</label>
            <input class="form-control" name="txtCateName" value="{{$edit_cate->category_name}}" placeholder="Please Enter Category Name" />
        </div>
        <div class="form-group">
            <label>Category Description</label>
            <textarea class="form-control" rows="3" name="txtDescription" value="">{{$edit_cate->category_desc}}</textarea>
        </div>
        {{-- <div class="form-group">
            <label>Category Status</label>
            <select name="txtStatus" class="form-control">
                
                <option value="{{$edit_cate->category_status}}">Ẩn</option>
                <option value="1">Hiện</option>
            </select>
        </div> --}}
        <button type="submit" name="update_category" class="btn btn-default">Category Update</button>
        <form>
    </div>
@endsection