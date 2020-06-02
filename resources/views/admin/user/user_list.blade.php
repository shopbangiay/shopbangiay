@extends('admin.master')
@section('controller', 'User')
@section('action', 'List')
@section('content')
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $stt = 0;
                            ?>
                            @foreach($all_user as $item)
                            <?php $stt += 1 ?>
                            <tr class="odd gradeX" align="center">
                                <td>{{$stt}}</td>
                                <td>{{$item->admin_name}}</td>
                                <td>{{$item->admin_email}}</td>
                                
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{URL::to('admin/user/delete-user/'.$item->admin_id)}}" onclick="return confirm('Bạn muốn xóa member này?')"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{URL::to('admin/user/edit-user/'.$item->admin_id)}}">Edit</a></td>
                            </tr>
                            <!-- <tr class="even gradeC" align="center">
                                <td>2</td>
                                <td>kutun</td>
                                <td>Admin</td>
                                <td>Ẩn</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                            </tr>
                            <tr class="odd gradeX" align="center">
                                <td>3</td>
                                <td>kuteo</td>
                                <td>Member</td>
                                <td>Hiện</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td> -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
@endsection