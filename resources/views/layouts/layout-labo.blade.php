<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet"  type="text/css" href="{{ asset("bower_components/bootstrap/dist/css/bootstrap.min.css") }}">
  <!-- Font Awesome -->
  <link rel="stylesheet"  type="text/css" href="{{ asset("bower_components/font-awesome/css/font-awesome.min.css") }}">
  <!-- Ionicons -->
  <link rel="stylesheet"  type="text/css" href="{{ asset("bower_components/Ionicons/css/ionicons.min.css")}}">
  <link rel="stylesheet"  type="text/css" href="{{ asset("/bower_components/admin-lte/dist/css/AdminLTE.min.css")}}">
  <link rel="stylesheet"  type="text/css" href="{{ asset("/bower_components/admin-lte/dist/css/skins/skin-blue.min.css")}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style>
.skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side {
    background-color: #43425D;
}
.skin-blue .sidebar-menu>li.header {
    color: #4b646f;
    background: #43425D;
}
.skin-blue .sidebar-menu>li:hover>a, .skin-blue .sidebar-menu>li.active>a, .skin-blue .sidebar-menu>li.menu-open>a {
    color: #fff;
    background: #43425D;
}
.skin-blue .main-header .logo {
     background-color: transparent; 
    color: #fff;
    border-bottom: 0 solid transparent;
}
.skin-blue .main-header .navbar .sidebar-toggle {
    color: #fff;
    display: none;
}
.skin-blue .main-header .navbar .sidebar-toggle:hover {
    color: #fff;
    display: none;
}
.skin-blue .main-header .logo {
    background-color: transparent;
    color: #fff;
    border-bottom: 0 solid transparent;
}
.skin-blue .main-header .logo :hover{
    background-color: transparent;
    color: #fff;
    border-bottom: 0 solid transparent;
}
.skin-blue .main-header .navbar {
    background-color: #fff;
    box-shadow: 0px 3px 13px 3px #00000014;
}
.skin-blue .main-header .navbar .nav>li>a {
     color: #000;
     
}
.main-header .navbar-custom-menu, .main-header .navbar-right {
  padding: 5px;
}

.main-header .custom-logo, .main-header .navbar-right {
    float: left;
  
}


.main-header  .custom-logo .logo-fsm-image{
width: 190px;
}

.skin-blue .main-header li.user-header {
    background-color: #43425D;
    position: relative;
    top: 5px;
    border-radius: 3px;
}

</style>

</head>


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">

      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg pull-left " style="margin-left:10px;"><b>Labo 1</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
       

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks Menu -->
        
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="/upload/logo/{{Auth::user()->logo}}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">  {{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="/upload/logo/{{Auth::user()->logo}}" class="img-circle" alt="User Image">

                <p>
                    {{ Auth::user()->name }} - Administrateur
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
           
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}"   onclick="event.preventDefault();  document.getElementById('logout-form').submit();" class="btn btn-default btn-flat"> Déconnexion</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
     
        </ul>
      </div>
      <div class="navbar-custom-menu custom-logo">
        <ul class="nav navbar-nav">
          <img src="{{ asset("img/logo.png") }}" class="logo-fsm-image" alt="User Image">
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/upload/logo/{{Auth::user()->logo}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>  {{ Auth::user()->name }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> En ligne</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="{{ route('tableaudebord_labo') }}"><i class="fa fa-home"></i> <span>Tableau de bord</span></a></li>
        <li class="active"><a href="{{ route('Annonces_labo') }}"><i class="fa fa-shopping-basket"></i> <span>Annonce</span></a></li>
        <li class="active"><a href="{{ route('MesAnnonces_labo') }}"><i class="fa fa-shopping-basket"></i> <span>Mes annonces</span></a></li>
        <li class="active"><a href="{{ route('magasin_labo') }}"><i class="fa fa-product-hunt"></i> <span>Magasin</span></a></li>
        <li class="active"><a href="{{ route('discussion_labo') }}"><i class="fa fa-envelope"></i> <span>Discussion</span></a></li>
        <li class="active"><a href="{{ route('aide_labo') }}"><i class="fa fa-question-circle"></i> <span>Centre d'aide</span></a></li>
        <li class="active"><a href="{{ route('parametre_labo') }}"><i class="fa fa-cog"></i> <span>Paramètres</span></a></li>
        
        
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   

    <!-- Main content -->
    <section class="content container-fluid">

                @yield('content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
  
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="#">FSM</a>.</strong> Tous droits réservés.
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->

<script src="{{ asset("bower_components/jquery/dist/jquery.min.js")}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset("bower_components/bootstrap/dist/js/bootstrap.min.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset("bower_components/admin-lte/dist/js/adminlte.min.js")}}"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>