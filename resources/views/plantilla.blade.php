<!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TIC IP</title>
  <link href="<?php echo asset('admin') ?>/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo asset('admin') ?>/fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo asset('admin') ?>/css/animate.min.css" rel="stylesheet">
  <link href="<?php echo asset('admin') ?>/css/custom.css" rel="stylesheet">
  <link href="<?php echo asset('admin') ?>/css/maps/jquery-jvectormap-2.0.3.css" rel="stylesheet" type="text/css"/>
  <link href="<?php echo asset('admin') ?>/css/icheck/flat/green.css" rel="stylesheet" />
  <link href="<?php echo asset('admin') ?>/css/floatexamples.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo asset('admin') ?>/js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo asset('admin') ?>/js/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo asset('alert') ?>/themes/alertify.core.css" rel="stylesheet"/>
  <link href="<?php echo asset('alert') ?>/themes/alertify.default.css"rel="stylesheet"/>
  <link href="<?php echo asset('admin') ?>/css/select/select2.min.css" rel="stylesheet">
  <script src="<?php echo asset('admin') ?>/js/jquery.min.js"></script>
  <script src="<?php echo asset('admin') ?>/js/nprogress.js"></script>
  <script src="<?php echo asset('alert') ?>/lib/alertify.js"type="text/javascript"></script> 
  
</head>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="/home" class="site_title"><i class="fa fa-bug"></i> <span>INVENTARIO</span></a>
          </div>
          <div class="clearfix"></div>
          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="<?php echo asset('admin') ?>/images/user.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span><b>NOMBRE:</b></span>
              <h2> {{Auth::user()->name}} </h2>
            </div>
          </div>
          <!-- /menu prile quick info -->
          <br />
          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <ul class="nav side-menu">
              <br><br><br>
                <li><a href="/home"><i class="fa fa-home"></i>Inicio</a> </li>
                <li><a href="/mante"><i class="fa fa-cogs"></i>Mantenimiento</a> </li>
                <li><a href="/equipos"><i class="fa fa-desktop"></i> Equipos</a> </li>
                <li><a href="/posesion"><i class="fa fa-tags"></i> Posesiones</a> </li>
                <li><a href="/personal"><i class="fa fa-child"></i> Personal</a> </li>
                <li><a href="/unidad"><i class="fa fa-th-large"></i> Unidades</a> </li>
                <li><a href="/ambiente"><i class="fa fa-institution"></i> Ambientes</a> </li>
                <li><a href="/user"><i class="fa fa-users"></i> Usuarios</a> </li>
              </ul>
            </div>
          </div>
          <!-- /sidebar menu -->
        </div>
      </div>
      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="<?php echo asset('admin') ?>/images/user.png" alt="">{{Auth::user()->name}}
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                  <li>.</li>
                  <li>
                      <form method="POST" action="{{ route('logout') }}" style="padding-left: 20px;">
                      @csrf
                      <button type="submit" class="btn btn-danger"><i class="fa fa-sign-out pull-right"></i>SALIR</button>
                      </form>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->
      <!-- page content -->
      <div class="right_col" role="main">
      	@yield('contenido')
        
        <!-- /footer content -->
      </div>
      <!-- /page content -->
    </div>
  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>
  <script src="<?php echo asset('admin') ?>/js/bootstrap.min.js"></script>
  <script src="<?php echo asset('admin') ?>/js/progressbar/bootstrap-progressbar.min.js"></script>
  <script src="<?php echo asset('admin') ?>/js/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?php echo asset('admin') ?>/js/icheck/icheck.min.js"></script>
  <script type="text/javascript" src="<?php echo asset('admin') ?>/js/moment/moment.min.js"></script>
  <script type="text/javascript" src="<?php echo asset('admin') ?>/js/datepicker/daterangepicker.js"></script>
  <script src="<?php echo asset('admin') ?>/js/chartjs/chart.min.js"></script>
  <script src="<?php echo asset('admin') ?>/js/custom.js"></script>
  <script src="<?php echo asset('admin') ?>/js/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo asset('admin') ?>/js/datatables/dataTables.bootstrap.js"></script>
  <script src="<?php echo asset('admin') ?>/js/datatables/dataTables.responsive.min.js"></script>
  <script src="<?php echo asset('admin') ?>/js/datatables/responsive.bootstrap.min.js"></script>
  <script src="<?php echo asset('admin') ?>/js/select/select2.full.js"></script>
  <script src="<?php echo asset('admin') ?>/js/chartjs/chart.min.js"></script>
  <script src="<?php echo asset('admin') ?>/js/validator/validator.js"></script>
  <script src="<?php echo asset('admin') ?>/js/sparkline/jquery.sparkline.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#datatable').dataTable();
      $('#datatable-keytable').DataTable({});
      $('#datatable-responsive').DataTable({});
      var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
    });
  </script>
  <script>
    $(document).ready(function() {
      $(".select2_single").select2({
        placeholder: "Select a state",
        maximumSelectionLength: 10 ,
        allowClear: true
      });
    });
  </script>
</body>
</html>
