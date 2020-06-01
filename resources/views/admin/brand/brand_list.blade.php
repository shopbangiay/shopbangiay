@extends('admin.master')
@section('content')
    <!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Tên Thương Hiệu </th>
                <th>Status</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php $stt = 0 ?>
            @foreach ($data_brand as $item)
            <?php $stt = $stt + 1 ?>
            <tr class="odd gradeX" align="center">
                <td>{{$stt}}</td>
                <td>{{$item->brand_name}}</td>
                <td>
                    <?php
                    if($item->brand_status == 1){
                    ?>
                    <a href="{{URL::to('admin/brand/unactive-brand/'.$item->brand_id)}}"><span class="fa-thumb-styling  fa fa-thumbs-up"></span></a>
                    <?php
                    }
                    else{
                    ?>
                    <a href="{{URL::to('admin/brand/active-brand/'.$item->brand_id)}}"><span class="fa-thumb-styling  fa fa-thumbs-down "></span></a>
                    <?php
                    }    
                    ?>
                </td>
                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{URL::to('admin/brand/delete-brand/'.$item->brand_id)}}" onclick="return confirm('are you sure?')"> Delete</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{URL::to('admin/brand/edit-brand/'. $item->brand_id)}}">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection     