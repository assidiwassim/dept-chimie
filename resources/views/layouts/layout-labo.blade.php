<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Labshare</title>

  <link rel="shortcut icon" type="image/png" href="https://upload.wikimedia.org/wikipedia/fr/thumb/7/79/LogoFacult%C3%A9DesSciencesDeMonastir2012.png/800px-LogoFacult%C3%A9DesSciencesDeMonastir2012.png"/>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">

<!-- jQuery 3 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset("bower_components/bootstrap/dist/js/bootstrap.min.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset("bower_components/admin-lte/dist/js/adminlte.min.js")}}"></script>
<script src = "https://timeago.yarp.com/jquery.timeago.js" type = "text/javascript"> </script>

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
    color: #43425D;
}

@media screen and (min-width: 768px){
    .skin-blue .main-header .navbar .sidebar-toggle {
      color: #fff;
      display: none;
    } 
    .skin-blue .main-header .navbar .sidebar-toggle:hover {
    color: #fff;
    display: none;
}
}

@media screen and (max-width: 768px){
    .main-header .logo{
      display: none;
    }
    .main-header .sidebar-toggle{
      position: relative;
    top: 5px;
    }
  
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

.skin-blue .sidebar-menu>li>.treeview-menu {
    margin: 0 1px;
     background: transparent;
}
.main-header a.logo:hover{
  background-color: transparent !important;
}

</style>

</head>


<body class="hold-transition skin-blue sidebar-mini fixed">
   
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">

      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg " style="margin-left:-20px;"><b>LabShare</b></span>
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
       
            <li class="dropdown messages-menu ">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bell-o"></i>
                  <span class="label label-success">{{Auth::user()->unreadnotifications->count()}}</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">Vous avez {{Auth::user()->notifications->count()}} notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                     
                      <li>
                          <a href="#">
                              @foreach (Auth::user()->unreadNotifications as $notification)
                                  @if($notification->type=="App\Notifications\addannonce") 
                                          @if(DB::table('annonces')->select('typeannonce')->where('id',$notification->data['annonce_id'])->value('typeannonce')=="Offre")
                                          <a href="/labo/annonces/offre/{{$notification->data['annonce_id']}}">
                                            <div class="pull-left">
                                                <img src="/upload/logo/{{$notification->data['avatar']}}" class="img-circle" alt="User Image">
                                              </div>
                                              <h4>
                                                {{DB::table('users')->select("name")->whereid($notification->data['user_id'])->value("name")}}
                                              <small class="time_date"> {{$notification->created_at}}</small>
                                                
                                              </h4>
                                              <p> {{$notification->data['text']}}</p>
                                          </a>
                                          @else
                                          <a href="/labo/annonces/demande/{{$notification->data['annonce_id']}}">
                                            <div class="pull-left">
                                                <img src="/upload/logo/{{$notification->data['avatar']}}" class="img-circle" alt="User Image">
                                              </div>
                                              <h4>
                                                  {{DB::table('users')->select("name")->whereid($notification->data['user_id'])->value("name")}}
                                                  <small class="time_date"> {{$notification->created_at}}</small>
                                              </h4>
                                              <p> {{$notification->data['text']}}</p>  
                                          </a>
                                          @endif
                                  @else
      
                                        @if($notification->data['type']=="confirme")
                                            <a href="/labo/mesannonces/offre/{{$notification->data['annonce_id']}}">
                                              <div class="pull-left">
                                                  <img src="/upload/logo/{{$notification->data['avatar']}}" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    {{DB::table('users')->select("name")->whereid($notification->data['user_id'])->value("name")}}
                                                    <small class="time_date"> {{$notification->created_at}}</small>
                                                </h4>
                                                <p> {{$notification->data['text']}}</p>  
                                            </a>
                                        @else
                                            <a href="/labo/mesannonces/demande/{{$notification->data['annonce_id']}}">
                                              <div class="pull-left">
                                                  <img src="/upload/logo/{{$notification->data['avatar']}}" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    {{DB::table('users')->select("name")->whereid($notification->data['user_id'])->value("name")}}
                                                    <small class="time_date"> {{$notification->created_at}}</small>
                                                </h4>
                                                <p> {{$notification->data['text']}}</p>
                                            </a>
                                        @endif
                                  @endif
                                  
                              @endforeach
      
                          </a>
                      </li>

                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
         
        
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
                    {{ Auth::user()->name }} - laboratoire
                  <small> {{date("h:i:sa")}}</small>
                </p>
              </li>
           
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ route('parametre_labo') }}" class="btn btn-default btn-flat">Profile</a>
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
        <li class=" tableaudebord_labo"><a href="{{ route('tableaudebord_labo') }}"><i class="fa fa-home"></i> <span>Tableau de bord</span></a></li>
        <li class=" Annonces_labo"><a href="{{ route('Annonces_labo') }}"><i class="fa fa-shopping-basket"></i> <span>Annonces</span></a></li>
 
        <li class="treeview MesAnnonces_laboratoire">
          <a href="">
              <i class="fa  fa-shopping-basket"></i> <span>Mes annonces</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu " >
            <li><a href="{{ route('MesAnnonces_labo') }}"><i class="fa fa-link"></i> <span> Liste de mes annonces </span></a></li>
            <li><a href="{{ route('ajouter_annonce') }}"><i class="fa fa-link"></i> <span> Ajouter une annonce</span></a></li>
        </ul>
        </li>
      
        <li class="treeview magasin_labo">
          <a href="">
              <i class="fa fa-product-hunt"></i> <span>Magasin</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu " >
            <li><a href="{{ route('magasin_labo') }}"><i class="fa fa-link"></i> <span> Liste des produits </span></a></li>
            <li><a href="{{ route('ajouter_produit_magasin_labo') }}"><i class="fa fa-link"></i> <span> Ajouter un produit</span></a></li>
        </ul>
        </li>
        <li class="discussion_labo"><a href="{{ route('home') }}"><i class="fa fa-envelope"></i> <span>Discussion</span></a></li>
        <li class="aide_labo"><a href="{{ route('aide_labo') }}"><i class="fa fa-question-circle"></i> <span>Centre d'aide</span></a></li>
        <li class="parametre_labo"><a href="{{ route('parametre_labo') }}"><i class="fa fa-cog"></i> <span>Paramètres</span></a></li>
       
        
        
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
    <strong>Copyright &copy; 2019 <a href="http://www.fsm.rnu.tn/">FSM</a>.</strong> Tous droits réservés.
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<script>

  var url =window.location.href ;
  $('ul.active').removeClass("active");
if (url.indexOf("/labo/annonces") >= 0){
  $('.Annonces_labo').addClass("active");
}else if (url.indexOf("/labo/mesannonces") >= 0 ||url.indexOf("/labo/mesannonces/ajouter-annonce") >= 0 ){
  $('.MesAnnonces_laboratoire').addClass("active");
}else if (url.indexOf("/labo/magasin") >= 0 ||url.indexOf("/labo/magasin/ajouter-produit") >= 0 ){
  $('.magasin_labo').addClass("active");
}else if (url.indexOf("/labo/chat") >= 0){
  $('.discussion_labo').addClass("active");
}else if (url.indexOf("/labo/aide") >= 0){
  $('.aide_labo').addClass("active");
}else if (url.indexOf("/labo/parametre") >= 0){
  $('.parametre_labo').addClass("active");
}else{
  $('.tableaudebord_labo').addClass("active");
}

</script>

</body>
</html>