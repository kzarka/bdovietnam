<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">




    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('admin/css/ionicons.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('admin/css/skins/_all-skins.min.css') }}">
    <!-- dropzone -->
    <link rel="stylesheet" href="{{ asset('admin/css/dropzone.css') }}">
    <!-- dropzone -->
    <link rel="stylesheet" href="{{ asset('admin/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/slick-theme.css') }}">
    <!-- znavi-admin -->
    <link rel="stylesheet" href="{{ asset('admin/css/znavi-admin.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin/css/dataTables.bootstrap.min.css') }}">

    @yield('css')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('admin.include.header')
    <!-- Left side column. contains the logo and sidebar -->
    @include('admin.include.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper"> 
        <!-- Content Header (Page header) -->

        <section class="content-header">
            @yield('content-header')
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                @yield('content')
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->

    @include('admin.include.footer')

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->



<!-- jQuery 3 -->
<script src="{{ asset('admin/js/jquery.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('admin/js/jquery-ui.min.js') }}"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('admin/js/dashboard.js') }}"></script>

<!-- Slick Slider -->
<script src="{{ asset('admin/js/slick.min.js') }}"></script>

<!-- Dropzone -->
<script src="{{ asset('admin/js/dropzone.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/js/demo.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('admin/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/js/dataTables.bootstrap.min.js') }}"></script>


<!-- page script -->
<script>
    $(function () {
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })
  </script>


</body>
</html>
