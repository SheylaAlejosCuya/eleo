<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>e-leo</title>
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
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
<body>
    <script>
        function toggleMenu() {
            var chk = document.getElementById("chk");
            var sidebar = document.getElementsByClassName("esidebar");
            var rightContent = document.getElementsByClassName("rightContent");
            if (chk.checked == true){
                sidebar[0].style.width = "15.81%";
                rightContent[0].style.marginLeft = String(0.1581 * window.innerWidth) + "px";
            } else {
                sidebar[0].style.width = "7.9%";
                rightContent[0].style.marginLeft = "7.9%";
            }
        }
    </script>
    <div class="menubar">
        <div class="esidebar">
            <div class="logo">
                <img src="images/logo.png" alt="eleo" class="brand-image" >
            </div>
            <ul>
                <li>
                    <a href=""><img src="images/inicio.png" alt="Inicio" id="img" ></a>
                </li>
                <li>
                    <a href=""><img src="images/lecturas.png" alt="Lecturas" id="img"></a>
                </li>
                <li>
                    <a href=""><img src="images/desafios.png" alt="Desafios" id="img"></a>  
                </li>
                <li>
                    <a href=""><img src="images/foro.png" alt="Foro" id="img"></a>
                </li>
                <li>
                    <a href=""><img src="images/resultados.png" alt="Resultado" id="img"></a>
                </li>
            </ul>
            <div class="logout">
                <div class="logoutContent">
                    <img src="images/cerrar-sesion.png" alt="Cerrar Sesion">
                    <a href="#" style="padding-left: 5px; color: white;">Cerrar Sesión</a>
                </div>
            </div>
        </div>    
        <div class="rightContent">
            <div class="header">
                <div class="triggerGroup">
                    <input type="checkbox" name="" id="chk" onclick="toggleMenu()">
                    <label for="chk" class="">
                        <i class="fa fa-bars"></i>
                    </label>
                </div>
                <div class="studentInfo">
                    <div style="text-align: right; "> 
                        <img src="images/perfil.png" alt="Perfil" class="studentProfilePicture"> 
                        <br>
                        <div class="studentLevel">
                            E-leo <br> Nivel 4
                        </div>  
                    </div>
                </div>
            </div>
            <div class="econtent">
            