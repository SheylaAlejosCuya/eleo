<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>e-leo</title>
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
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
<!-- CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <script>
        function toggleMenu() {
            var chk = document.getElementById("chk");
            var sidebar = document.getElementsByClassName("esidebar");
            var chkTrigger = document.getElementsByClassName("chkTrigger");
            var rightContent = document.getElementsByClassName("rightContent");
            console.log(window.innerWidth);
            if (chk.checked == true){
                if (window.innerWidth > 768) {
                    sidebar[0].style.width = "7.9%";
                    rightContent[0].style.marginLeft = "7.9%";
                } else {
                    sidebar[0].style.left = "0";
                    chkTrigger[0].style.zIndex = 100;
                    chkTrigger[0].style.position = "fixed";
                    chkTrigger[0].style.marginRight = "16px";
                    chkTrigger[0].style.fontSize = "32px";
                    chkTrigger[0].children[0].style.color = "white";
                }
            } else {
                if (window.innerWidth > 780){
                    sidebar[0].style.width = "15.81%";
                    rightContent[0].style.marginLeft = "15.81%";
                } else {
                    sidebar[0].style.left = "-100%";
                    chkTrigger[0].style.zIndex = 1;
                    chkTrigger[0].style.position = "relative";
                    chkTrigger[0].style.marginRight = 0;
                    chkTrigger[0].style.fontSize = "16px";
                    chkTrigger[0].children[0].style.color = "#7f7f7f";
                }
            }
        }
    </script>
    <div class="menubar">
        <div class="esidebar">
            <div class="logo">
                <img src="{{asset('images/logo.png')}}" alt="eleo" class="brand-image" >
            </div>
            <ul>
                <li>
                    <a href=""><img src="{{asset('images/inicio.png')}}" alt="Inicio" id="img" ></a>
                </li>
                <li>
                    <a href=""><img src="{{asset('images/lecturas.png')}}" alt="Lecturas" id="img"></a>
                </li>
                <li>
                    <a href=""><img src="{{asset('images/desafios.png')}}" alt="Desafios" id="img"></a>  
                </li>
                <li>
                    <a href=""><img src="{{asset('images/foro.png')}}" alt="Foro" id="img"></a>
                </li>
                <li>
                    <a href=""><img src="{{asset('images/resultados.png')}}" alt="Resultado" id="img"></a>
                </li>
            </ul>
            <div class="logout">
                <div class="logoutContent">
                    <img src="{{asset('images/cerrar-sesion.png')}}" alt="Cerrar Sesion">
                    <a href="#" style="padding-left: 5px; color: white;">Cerrar Sesión</a>
                </div>
            </div>
        </div>    
        <div class="rightContent">
            <div class="header">
                <div class="triggerGroup">
                    <input type="checkbox" name="" id="chk" onclick="toggleMenu()">
                    <label for="chk" class="chkTrigger">
                        <i class="fa fa-bars"></i>
                    </label>
                </div>
                <div class="studentInfo">
                    <div style="text-align: right; "> 
                        <img src="{{asset('images/perfil.png')}}" alt="Perfil" class="studentProfilePicture"> 
                        <br>
                        <div class="studentLevel">
                            E-leo <br> Nivel 4
                        </div>  
                    </div>
                </div>
            </div>
            <div class="ebackground"></div>
            <div class="econtent">
                <?php
                    if ($includeRoute) {
                    ?>
                        @include($includeRoute)
                    <?php
                    }
                ?>
            </div>
        </div>
    </div>
  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    
    </body>
</html>     