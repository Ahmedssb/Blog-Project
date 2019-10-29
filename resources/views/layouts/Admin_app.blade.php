<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    <script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
      <!-- jQuery -->
      <script src="/Admin/vendor/jquery/jquery.min.js"></script>
      <script src="/Admin/vendor/datatables/js/jquery.dataTables.min.js"></script>
      <script src="/Admin/vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="/Admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/Admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/Admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/Admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('Admin.Main')}}"> Admin panel</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        @foreach(Auth::user()->unreadNotifications as $notification)

                        <li>
                            <a href="{{route('Msg.Read',['id'=>$notification->id])}}">
                                <div>
                                    <strong> {{$notification->data['name']}}</strong>
                                    <span class="pull-right text-muted">
                                        <em>{{$notification->created_at}}</em>
                                    </span>
                                </div>
                                <div>{{$notification->data['email']}} </div>
                            </a>
                        </li>
                      @endforeach
                      <li class="divider"></li>
                        <li>
                            <a class="text-center" href="{{route('Msg.Index',['type'=>'All'])}}">
                                <strong> All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
              
                
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{route('Web.Profile')}}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                         
                        <li class="divider"></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"  ></i> Logout</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      
                         @if(Auth::user()->rule=='admin')
                        <li>
                            <a href="{{route('Section.Index')}}"><i class="fa fa-th "></i> Sections</a>
                        </li>

                        <li>
                            <a href="{{route('User.Index')}}"><i class="fa fa-users "></i> Users</a>
                        </li>
                        @endif
                        <li>
                            <a href="{{route('Image.Index')}}"><i class="fa fa-photo "></i> Images</a>
                        </li>
                        
                        <li>
                            <a href="{{route('Post.Index')}}"><i class="fa fa-building-o "></i> Posts</a>
                        </li>
                            
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                        @if(Session::has('msg'))
                        <div class="alert alert-success" role="alert" style="margin-top:10px;">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <h4> <i class="fa fa-check"></i>Success!</h4>
                                {{Session::get('msg')}}
                        </div>
                        @endif

                        @if(count($errors)>0)
                        <div class="alert alert-danger" role="alert" style="margin-top:10px;">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <h4> <i class="fa fa-ban"></i>Error!</h4>
                            <ul>
                              @foreach($errors->all() as $error)
                                 <li><p>{{$error}}</p></li>
                               @endforeach
                            </ul>
                         </div>
                        @endif
                    <div class="col-lg-12">
                        <h1 class="page-header">@yield('title')</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                 @yield('content')
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->


    <!-- Bootstrap Core JavaScript -->
    <script src="/Admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/Admin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/Admin/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    
    <script src="/Admin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="/Admin/vendor/datatables-responsive/dataTables.responsive.js"></script>

</body>

</html>
