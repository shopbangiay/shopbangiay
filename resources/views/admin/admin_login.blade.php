<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 5.x Tại Khoa Phạm">
    <meta name="author" content="">

    <title>Admin </title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('public/backend/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('public/backend/bower_components/metisMenu/dist/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('public/backend/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('public/backend/bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="{{asset('public/backend/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{asset('public/backend/bower_components/datatables-responsive/css/dataTables.responsive.css')}}" rel="stylesheet">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">ĐĂNG NHẬP ADMIN</h3>
                        <?php
                        $message=Session::get('message');
                        if($message){
                            echo'<span class ="text-alert">',$message.'</span>';
                            Session::put('message',null);
                        }
                        ?>
                        @if(Session::has('flash_message'))
                            <div class="alert alert-{{Session::get('flash_level')}}">
                                {{Session::get('flash_message')}}
                            </div>
                        @endif
                    </div>
                    
                    <div class="panel-body">
                        <form role="form" action="{{URL::to('/admin/dashboard')}}" method="POST">
                            <fieldset>
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input class="form-control" placeholder="Điền email" name="admin_email" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Điền Password" name="admin_password" type="password" value="">
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">ĐĂNG NHẬP</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('public/backend/bower_components/jquery/dist/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('public/backend/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('public/backend/bower_components/metisMenu/dist/metisMenu.min.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('public/backend/dist/js/sb-admin-2.js')}}"></script>

    <!-- DataTables JavaScript -->
    <script src="{{asset('public/backend/bower_components/DataTables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/backend/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')}}"></script>

    <script src="{{asset('public/backend/dist/js/myscript.js')}}"></script>

</body>

</html>
