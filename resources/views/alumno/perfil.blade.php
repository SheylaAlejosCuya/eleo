
<!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="infomacion">
        <h1><strong>Información Básica</strong></h1>
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <h2 class="infoTitle"><strong>Nombre Completo</strong></h2>
                    </div>
                    <div class="col">
                        <h2 class="infoContent">{{$alumno->first_name}} {{$alumno->last_name}}</h2>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <h2 class="infoTitle"><strong>E-mail</strong></h2>
                    </div>
                    <div class="col">
                        <h2 class="infoContent">{{$alumno->email}}</h2>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <h2 class="infoTitle"><strong>Cumpleaños</strong></h2>
                    </div>
                    <div class="col">
                        <h2 class="infoContent">{{$alumno->birthdate}}</h2>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <h2 class="infoTitle"><strong>Usuario</strong></h2>
                    </div>
                    <div class="col">
                        <h2 class="infoContent">{{$alumno->username}}</h2>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <h2 class="infoTitle"><strong>Cambiar Contraseña</strong></h2>
                    </div>
                    <div class="col">
                        <h2 class="infoContent">****</h2>
                    </div>
                </div>
                <hr class="hr_displayForAvatar">
           </div>
           <div class="col-lg">
                <h2 class="infoTitle"><strong>Avatar</strong></h2>
                <div class="avatarImg">
                    <img src="images/chica.png" alt="" width="20%">
                    <img src="images/chico.png" alt="" width="20%">
                    <img src="images/iguanita.png" alt="" width="20%">
                </div>
           </div>
       </div>
    </div>
    <div class="ebuttons">
        <button class="saveButton">Guardar</button>
        <button class="cancelButton">Cancelar</button>
    </div>

@include('includes.footer')