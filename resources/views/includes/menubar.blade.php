<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>e-leo</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->

  <link rel="stylesheet" href="{{asset('dist/css/adminlte.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <div class="row">
    <div class="col">
      <nav class="main-header navbar navbar-expand">
        <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>           
          </ul>          
    </nav>
    </div>
    <div class="col">
      <div style="text-align: right; ">
        <a href="{{route('web_perfil')}}" height="ml-auto">
          <img src="{{asset('images/perfil.png')}}" alt="Perfil">
        </a>
        <br>
        <label style="background:#8dc63f;  padding-left: 1.5%; border-top-left-radius:7px;  border-bottom-left-radius: 7px;  color: white; padding-right: 5%; font-size: calc(1rem + 1vw);">
          E-leo <br> Nivel 4
        </label>  
      </div>
    </div>
  </div>
  
  <!-- Navbar 
     -->
 
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4">
    <!-- Brand Logo -->
   

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
   

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a class="brand-link" >
                <img src="images/logo.png" alt="eleo" class="brand-image" >
                
              </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link " >
             <img src="images/inicio.png" alt="Inicio" width="50%" id="img" >
              <p>
              
              </p>
            </a>
            
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
             <img src="images/lecturas.png" alt="Lecturas" width="50%" id="img">
              <p>
              
              </p>
            </a>
            
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
             <img src="images/desafios.png" alt="Desafios" width="50%" id="img">
              <p>
              
              </p>
            </a>
            
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
             <img src="images/foro.png" alt="Foro" width="50%" id="img">
              <p>
              
              </p>
            </a>
            
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
             <img src="images/resultados.png" alt="Resultado" width="50%" id="img"  >
              <p>
              
              </p>
            </a>
            
          </li>
          <li class="nav-item has-treeview">
            <div>
                <img src="images/cerrar-sesion.png"  alt="Cerrar Sesion" width="10%">
                <a href="{{route('api_logout')}}" style="padding-left: 5px; color: white;">Cerrar Sesión</a>
             </div>
            </a>
            
          </li>
           
        </ul>
        
      </nav>
      
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>