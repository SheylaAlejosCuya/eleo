
<!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    
    <div class="profileContainer">
        
        <div class="profileInfo">
            <hr>
            <div class="profileInfoRow">
                <div class="profileTitle"><b>Nombre Completo</b></div>
                <div class="profileData">{{$profesor->first_name}} {{$profesor->last_name}}</div>
            </div>
            <div class="profileInfoRow">
                <div class="profileTitle"><b>DNI</b></div>
                <div class="profileData">{{$profesor->dni}}</div>
            </div>
            <div class="profileInfoRow">
                <div class="profileTitle"><b>Institución Eduactiva</b></div>
                <div class="profileData">{{$profesor->school->name}}</div>
            </div>
            <div class="profileInfoRow">
                <div class="profileTitle"><b>E-mail</b></div>
                <div class="profileData">{{$profesor->email}}</div>
            </div>
            <div class="profileInfoRow">
                <div class="profileTitle"><b>Usuario</b></div>
                <div class="profileData">{{$profesor->username}}</div>
            </div>
            <div class="profileInfoRow">
                <div class="profileTitle"><b>Contraseña</b></div>
                <input class="profileData" type="password" id="password_new" name="password_new" placeholder="*******"/>
            </div>
        </div>

        <div class="profileImg">
            <div class="profilePhoto">
                <label for="profilePhoto">
                    <img src="{{asset('/images/admin.png')}}" alt="admin" id='perfil_photo'>
                </label>
            </div>
        </div>
    </div>

    <div class="ebuttons">
        <button class="saveButton" onclick="savePassword()">Cambiar contraseña</button>
    </div>

@include('includes.footer')

@prepend('scripts')
<script>
    function savePassword() {

        var password_new = $("#password_new").val();

        if(password_new != "") {
            $.ajax({
                type: "POST",
                url: "{{route('api_save_password_profesor_admin')}}",
                dataType: "json",
                data: {
                    "_token": "{{csrf_token()}}",
                    "id_usuario": "{{$profesor->id_user}}",
                    "password_new": password_new
                },
                success: function(response) { 
                    console.log(response);
                    $("#password_new").val("");
                    showMessage("success", "Contraseña modificada correctamente");
                },
                error: function(e) {
                    console.log(e); 
                    $("#password_new").val("");
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