<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>e-leo</title>
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
</head>
<body>
    <script>
        function toggleMenu() {
            var chk = document.getElementById("chk");
            var sidebar = document.getElementsByClassName("esidebar");
            var rightContent = document.getElementsByClassName("rightContent");
            if (chk.checked == true){
                sidebar[0].style.width = "7.9%";
                rightContent[0].style.marginLeft = "7.9%";
            } else {
                sidebar[0].style.width = "15.81%";
                rightContent[0].style.marginLeft = "15.81%";
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
                    <label for="chk" class="chkTrigger">
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
            <div class="ebackground"></div>
            <div class="econtent">
                @include($includeRoute)
            </div>
        </div>
    </div>
</body>
</html>      