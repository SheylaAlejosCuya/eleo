
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
            <div class="profileInfoRow" hidden>
                <div class="profileTitle"><b>Cumpleaños</b></div>
                <div class="profileData">{{$alumno->birthdate}}</div>
            </div>
            <div class="profileInfoRow">
                <div class="profileTitle"><b>DNI</b></div>
                <div class="profileData">{{$alumno->dni}}</div>
            </div>
            <div class="profileInfoRow">
                <div class="profileTitle"><b>Usuario</b></div>
                <div class="profileData">{{$alumno->username}}</div>
            </div>
            <div class="profileInfoRow">
                <div class="profileTitle"><b>Contraseña</b></div>
                <input class="profileData" type="password" id="password_new" name="password_new" placeholder="*******"/>
            </div>
            <div class="profileInfoRow">
                <div class="profileTitle"><b>Confirmar Contraseña</b></div>
                <input class="profileData" type="password" id="password_confirm_new" name="password_confirm_new" placeholder="Volver a ingresar nueva contraseña"/>
            </div>
        </div>
        <div class="profileImg">
            <div class="profileTitle"><b>Foto</b></div>
            <div class="profileAvatar">
                @if($alumno->id_gender == '2')
                    <img src="{{asset('images/chica.png')}}" alt="">
                    <img class="avatarSelected" src="{{asset('images/chico.png')}}" alt="">
                @else
                    <img class="avatarSelected" src="{{asset('images/chica.png')}}" alt="">
                    <img src="{{asset('images/chico.png')}}" alt="">
                @endif
                <img src="{{asset('images/iguanita.png')}}" alt="">
            </div>
        </div>
    </div>

    <div class="ebuttons">
        <button class="saveButton" onclick="savePassword()">Guardar</button>
        <button class="cancelButton" hidden>Cancelar</button>
    </div>

@include('includes.footer')

@prepend('scripts')
<script>
    function savePassword() {

        // var password_new = $("#password_new").val();

        // if(password_new != "") {
        //     $.ajax({
        //         type: "POST",
        //         url: "{{route('api_save_password')}}",
        //         dataType: "json",
        //         data: {
        //             "_token": "{{csrf_token()}}",
        //             "id_usuario": "{{$alumno->id_user}}",
        //             "password_new": password_new
        //         },
        //         success: function(response) { 
        //             console.log(response);
        //             $("#password_new").val("");
        //             showMessage("success", "Contraseña modificada correctamente");
        //         },
        //         error: function(e) {
        //             console.log(e); 
        //             $("#password_new").val("");
        //             showMessage("warning", "Error al modificar la contraseña");
        //         }
        //     });
        // } else {
        //     showMessage("warning", "Sin contraseña que modificar");
        // }

        var password_new = $("#password_new").val();
        var password_confirm_new = $("#password_confirm_new").val();

        if(password_new != "" || password_confirm_new != "") {

            if(password_new != password_confirm_new) {
                showMessage("warning", "Las contraseñas no coinciden");  
                return;
            }
            
            $.ajax({
                type: "POST",
                url: "{{route('api_save_password')}}",
                dataType: "json",
                data: {
                    "_token": "{{csrf_token()}}",
                    "id_usuario": "{{$alumno->id_user}}",
                    "password_new": password_new
                },
                success: function(response) { 
                    console.log(response);
                    $("#password_new").val("");
                    $("#password_confirm_new").val("");
                    
                    showMessage("success", "Contraseña modificada correctamente");
                },
                error: function(e) {
                    console.log(e); 
                    $("#password_new").val("");
                    $("#password_confirm_new").val("");
                    
                    showMessage("warning", "Error al modificar la contraseña");
                }
            });
        } else {
            showMessage("warning", "Sin contraseña que modificar");
        }
    }

    function showMessage(type, message) {
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "timeOut": "2000",
            "extendedTimeOut": "2000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr[type](message);
    }
</script>
@endprepend