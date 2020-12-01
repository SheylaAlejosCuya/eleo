
    <div class="profileContainer">
        <div class="profileInfo">
            <div class="profileInfoRow">
                <div class="profileTitle"><b>Nombre Completo</b></div>
                <div class="profileData">{{$alumno->first_name}} {{$alumno->last_name}}</div>
            </div>
            <div class="profileInfoRow">
                <div class="profileTitle"><b>E-mail</b></div>
                <div class="profileData">{{$alumno->email}}</div>
            </div>
            <div class="profileInfoRow">
                <div class="profileTitle"><b>Cumpleaños</b></div>
                <div class="profileData">{{$alumno->birthdate}}</div>
            </div>
            <div class="profileInfoRow">
                <div class="profileTitle"><b>Usuario</b></div>
                <div class="profileData">{{$alumno->username}}</div>
            </div>
            <div class="profileInfoRow">
                <div class="profileTitle"><b>Contraseña </b></div>
                <div class="profileData">*********</div>
            </div>
        </div>
        <div class="profileImg">
            <div class="profileTitle"><b>Foto</b></div>
            <div class="profileAvatar">
                <img class="avatarSelected" src="{{asset('images/chica.png')}}" alt="">
                <img src="{{asset('images/chico.png')}}" alt="">
                <img src="{{asset('images/iguanita.png')}}" alt="">
            </div>
        </div>
    </div>

    <div class="ebuttons">
        <button class="saveButton">Guardar</button>
        <button class="cancelButton">Cancelar</button>
    </div>

@include('includes.footer')