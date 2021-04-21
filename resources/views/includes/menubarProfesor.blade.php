<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Courgette&family=Merienda:wght@700&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>e-Leo</title>
    <link rel="icon" href="{{asset('images/logo_mini.png')}}">
    

    <link rel="stylesheet" href="{{asset('css/Profesorsidebar.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('css/tutoriales.css')}}">
    <link rel="stylesheet" href="{{asset('css/perfil.css')}}">
    <link rel="stylesheet" href="{{asset('css/biblioteca.css')}}">
    <link rel="stylesheet" href="{{asset('css/lecturas.css')}}">
    <link rel="stylesheet" href="{{asset('css/videos.css')}}">
    <link rel="stylesheet" href="{{asset('css/resultProgessBar.css')}}">
    <link rel="stylesheet" href="{{asset('css/gamificacion.css')}}">
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

  <!-- <link rel="stylesheet" href="{{asset('dist/css/adminlte.css')}}"> -->
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

    <link href="{{asset('/plugins/toastr/toastr.min.css')}}" rel="stylesheet">
{{-- Boostrap --}}


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" />

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
                    @if ($optionIndex == 0) 
                        <a href="{{route('web_inicio_profesor')}}"><img class="eoption eoptionSelected" src="{{asset('images/inicio.png')}}" alt="Inicio"></a>
                    @else
                        <a href="{{route('web_inicio_profesor')}}"><img class="eoption" src="{{asset('images/inicio.png')}}" alt="Inicio"></a>
                    @endif
                </li>
                {{--<li>
                    @if ($optionIndex == 6) 
                        <a href="{{route('web_asignacion_alumnos')}}"><img class="eoption eoptionSelected" src="{{asset('images/lecturas.png')}}" alt="Asignación"></a>
                    @else
                        <a href="{{route('web_asignacion_alumnos')}}"><img class="eoption" src="{{asset('images/lecturas.png')}}" alt="Asignación"></a>
                    @endif
                </li>--}}
                <li>
                    @if ($optionIndex == 1) 
                        <a href="{{route('web_lecturas_recursos')}}"><img class="eoption eoptionSelected" src="{{asset('images/lecturas.png')}}" alt="Inicio"></a>
                    @else
                        <a href="{{route('web_lecturas_recursos')}}"><img class="eoption" src="{{asset('images/lecturas.png')}}" alt="Inicio"></a>
                    @endif
                </li>

                <li>
                    @if ($optionIndex == 2)
                        <a href="{{route('web_actividades_produccion_profesor')}}"><img class="eoption eoptionSelected" src="{{asset('images/lecturas de estudio.png')}}" alt="Inicio"></a>
                    @else
                        <a href="{{route('web_actividades_produccion_profesor')}}"><img class="eoption" src="{{asset('images/lecturas de estudio.png')}}" alt="Inicio"></a>
                    @endif
                </li>
                {{-- <li>
                    @if ($optionIndex == 3)
                        <a href="{{url('profesor/lecturasAutogestion')}}"><img class="eoption eoptionSelected" src="{{asset('images/lecturas.png')}}" alt="Inicio"></a>
                    @else
                        <a href="{{url('profesor/lecturasAutogestion')}}"><img class="eoption" src="{{asset('images/lecturas.png')}}" alt="Inicio"></a>
                    @endif
                </li> --}}
                <li>
                    @if ($optionIndex == 4)
                        <a href="{{url('profesor/foro')}}"><img class="eoption eoptionSelected" src="{{asset('images/foro.png')}}" alt="Inicio"></a>
                    @else
                        <a href="{{url('profesor/foro')}}"><img class="eoption" src="{{asset('images/foro.png')}}" alt="Inicio"></a>
                    @endif
                </li>
                <li>
                    @if ($optionIndex == 5)
                        <a href="{{route('web_resultados_profesor')}}"><img class="eoption eoptionSelected" src="{{asset('images/resultados.png')}}" alt="Inicio"></a>
                    @else
                        <a href="{{route('web_resultados_profesor')}}"><img class="eoption" src="{{asset('images/resultados.png')}}" alt="Inicio"></a>
                    @endif
                </li>
            </ul>
            <div class="logout">
                <img src="{{asset('images/cerrar-sesion.png')}}" alt="Cerrar Sesion">
                <a href="{{route('api_logout')}}" style="padding-left: 5px; color: white; font-size: 17px;">Cerrar Sesión</a>
            </div>
        </div>    
        <div class="rightContent">
            <!-- ehelpside oculta las ventanas de mensajes de ayuda -->
            <div class="ehelpNote ehelphide">
                <img src="{{asset('images/iguana.png')}}" alt="">
                <div class="ehelpMessage">"Dale play, reproduce el video y luego responde las preguntas"</div>
            </div>
            
            <div class="eheader">
                <div class="header__left">
                    <div class="triggerGroup">
                        <input type="checkbox" name="" id="chk" onclick="toggleMenu()">
                        <label for="chk" class="chkTrigger">
                            <i class="fa fa-bars"></i>
                        </label>
                    </div>
                    <h1 class="header__title etitle"><strong>@if(isset($title)) {{$title}} @endif</strong></h1>
                </div>
                <div class="studentInfo">
                    <a href="{{route('web_profesor_perfil')}}" class="studentProfilePicture">
                        <img src="{{asset('images/perfil_profesor.png')}}" alt="Perfil">
                    </a>
                </div>
            </div>
            <?php
                if ($AlternativeBackground ?? '') {
                ?>
                    <img src="{{asset('images/fondo.png')}}" alt="" class="ebackground">
                <?php
                }
            ?>
            <div class="econtent">
                <h1 class="econtent__title etitle"><strong>@if(isset($title)) {{$title}} @endif</strong></h1>
                <?php
                    if ($includeRoute ?? '') {
                    ?>
                        @include($includeRoute)
                    <?php
                    }
                ?>
            </div>
            <img src="{{asset('images/mensaje.png')}}" alt="" class="chatFloatingButton" hidden>
        </div>
    </div>

    

    </body>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> --}}
    <script src="{{asset('/plugins/jquery/jquery.min.js')}}"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
    <script src="https://vjs.zencdn.net/7.10.2/video.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
    <!-- JavaScript - ALERT -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>  
    @stack('scripts')
</html>     