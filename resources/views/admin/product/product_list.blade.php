@extends('admin.master')
@section('content')
    <!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>Số thứ tự SP</th>
                <th>Tên SP</th>
                <th>Giá</th>
                <th>Ảnh Sản Phẩm</th>
                <th>Danh mục</th>
                <th>Thương Hiệu</th>
                <th>Trạng thái</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php $stt = 0 ?>
            @foreach ($all_product as $key => $item)
            <?php $stt = $stt + 1 ?>
            <tr class="odd gradeX" align="center">
                <td>{{$stt}}</td>
                <td>{{$item->product_name}}</td>
                <td>{{$item->product_price}}</td>
                <td><img src="{{URL::to('public/uploads/product/'.$item->product_image)}}" height="100" width="100"></td>
                <td>{{$item->category_name}}</td>
                <td>{{$item->brand_name}}</td>
                <td>

                    <?php
                    if($item->category_status == 1){
                    ?>
                    <a href="{{URL::to('unactive-product/'.$item->product_id)}}"><span class="fa-thumb-styling  fa fa-thumbs-up"></span></a>
                    <?php
                    }
                    else{
                    ?>
                    <a href="{{URL::to('active-product/'.$item->product_id)}}"><span class="fa-thumb-styling  fa fa-thumbs-down "></span></a>
                    <?php
                    }    
                    ?>

                </td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{URL::to('admin/product/delete-product/'.$item->product_id)}}"> Delete</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{URL::to('admin/product/edit-product/'.$item->product_id)}}">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection     