
<!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="profileContainer">
        <div class="profileInfo">
            <div class="profileInfoRow">
                <div class="profileTitle"><b>Nombre Completo</b></div>
                <div class="profileData">{{$profesor->first_name}} {{$profesor->last_name}}</div>
            </div>
            <div class="profileInfoRow">
                <div class="profileTitle"><b>Cumpleaños</b></div>
                <div class="profileData">{{$profesor->birthdate}}</div>
            </div>
            <div class="profileInfoRow">
                <div class="profileTitle"><b>E-mail</b></div>
                <div class="profileData">{{$profesor->email}}</div>
            </div>
            <div class="profileInfoRow">
                <div class="profileTitle"><b>Contraseña </b></div>
                <input class="profileData" type="password" id="password_new" name="password_new" placeholder="*******"/>
            </div>
        </div>
        <div class="profileImg">
            <div class="profileTitle"><b>Foto</b></div>
            <div class="profilePhoto">
                <label for="profilePhoto">
                    @if($profesor->photo != 'Sin foto')
                        <img src="{{asset('/storage/perfil/'.$profesor->photo)}}" alt="" id='perfil_photo'>
                    @else
                        <img src="{{asset('/images/no_photo.png')}}" alt="" id='perfil_photo'>
                    @endif
                    
                    <p>Cargar Foto</p>
                </label>
                <input type="file" name="profilePhoto" id="profilePhoto">
            </div>
        </div>
    </div>

    <div class="ebuttons">
        <button class="saveButton" onclick="savePassword()">Guardar contraseña</button>
        <button class="saveButton" onclick="saveAvatar()">Guardar Imagen</button>
        <button class="cancelButton" hidden>Cancelar</button>
    </div>

@include('includes.footer')

@prepend('scripts')
<script>
    function savePassword() {

        var password_new = $("#password_new").val();

        if(password_new != "") {
            $.ajax({
                type: "POST",
                url: "{{route('api_save_password_profesor')}}",
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

    function saveAvatar() {

        var img = document.querySelector('#profilePhoto').files[0];

        if(img == null){
            showMessage("warning", "Sin imagen que actualizar");
            return;
        }

        var data = new FormData();
        data.append('foto', img);
        data.append('id_usuario', "{{$profesor->id_user}}");

        if(data != null) {
            $.ajax({
                type: "POST",
                url: "{{route('api_save_avatar_profesor')}}",
                enctype: 'multipart/form-data',
                contentType: false,
                cache: false,
                processData: false,  // Important!
                data: data ,
                success: function(response) { 
                    console.log(response);
                    //document.querySelector('#profilePhoto').value = "";
                    location.reload();
                    //showMessage("success", "Foto actualizada correctamente");
                },
                error: function(e) {
                    console.log(e); 
                    //$("#password_new").val("");
                    showMessage("warning", "Error al modificar la foto");
                }
            });
        } else {
            //showMessage("warning", "Sin contraseña que modificar");
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