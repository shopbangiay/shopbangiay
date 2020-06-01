@extends('admin.master')
@section('content')
    <!-- /.col-lg-12 -->
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                
               <!-- <th>Status</th>-->
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            <?php $stt = 0 ?>
            @foreach ($data_cate as $item)
            <?php $stt = $stt + 1 ?>
                <td>{{$stt}}</td>
                <td>{{$item->category_name}}</td>
                <td>
                    <?php
                    if($item->category_status == 1){
                    ?>
                    <a href="{{URL::to('admin/cate/unactive-category/'.$item->category_id)}}"><span class="fa-thumb-styling  fa fa-thumbs-up"></span></a>
                    <?php
                    }
                    else{
                    ?>
                    <a href="{{URL::to('admin/cate/active-category/'.$item->category_id)}}"><span class="fa-thumb-styling  fa fa-thumbs-down "></span></a>
                    <?php
                    }    
                    ?>
                </td>

                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{URL::to('admin/cate/delete-category/'.$item->category_id)}}" onclick="return confirm('Bạn muốn xóa danh mục này?')"> Delete</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{URL::to('admin/cate/edit-category/'.$item->category_id)}}">Edit</a></td>


            </tr>
            @endforeach
        </tbody>
    </table>
@endsection     