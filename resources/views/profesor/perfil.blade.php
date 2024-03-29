
<!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <div class="profileContainer">
        <div class="profileInfo">
            <div class="profileInfoRow">
                <div class="profileTitle"><b>Nombre Completo</b></div>
                <div class="profileData">{{$profesor->first_name}} {{$profesor->last_name}}</div>
            </div>
            <div class="profileInfoRow">
                <div class="profileTitle"><b>DNI</b></div>
                <div class="profileData">{{$profesor->dni}}</div>
            </div>
            <div class="profileInfoRow">
                <div class="profileTitle"><b>E-mail</b></div>
                <div class="profileData">{{$profesor->email}}</div>
            </div>
            <div class="profileInfoRow">
                <div class="profileTitle"><b>Institución Educativa</b></div>
                <div class="profileData">{{$profesor->school->name}}</div>
            </div>
            <div class="profileInfoRow">
                <div class="profileTitle"><b>Contraseña</b></div>
                <input class="profileData" type="password" id="password_new" name="password_new" placeholder="Ingresar nueva contraseña"/>
            </div>
            <div class="profileInfoRow">
                <div class="profileTitle"><b>Confirmar Contraseña</b></div>
                <input class="profileData" type="password" id="password_confirm_new" name="password_confirm_new" placeholder="Volver a ingresar nueva contraseña"/>
            </div>
        </div>
        <div class="profileImg">
            <div class="profileTitle"><b>Foto</b></div>
            <div class="profilePhoto">
                <label for="profilePhoto">
                    @if($profesor->photo != 'Sin foto')
                        <img src="{{env('AWS_S3_BASE').$profesor->photo}}" alt="" id='perfil_photo'>
                    @else
                        <img src="{{$profesor->photo}}" alt="" id='perfil_photo'>
                    @endif
                    <p>Cargar Foto</p>
                </label>
                <input type="file" name="profilePhoto" id="profilePhoto" accept="image/x-png,image/jpeg" >
            </div>
        </div>
    </div>

    <div class="ebuttons">
        <button id="button_save_password" class="big ui green button" onclick="savePassword()">Guardar contraseña</button>
        <button id="button_save_image" class="big ui green button" onclick="saveAvatar()">Guardar Imagen</button>

    </div>

@include('includes.footer')

@prepend('scripts')
<script>
    function savePassword() {
    

        var password_new = $("#password_new").val();
        var password_confirm_new = $("#password_confirm_new").val();

        if(password_new != "" || password_confirm_new != "") {

            if(password_new != password_confirm_new) {
                showMessage("warning", "Las contraseñas no coinciden");  
                return;
            }
            
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

    function saveAvatar() {

        $('#button_save_image').addClass("loading");
        $('#button_save_image').prop('disabled', true);

        var img = document.querySelector('#profilePhoto').files[0];

        if(img == null){
            showMessage("warning", "Sin imagen que actualizar");
            $('#button_save_image').prop('disabled', false);
            $('#button_save_image').removeClass("loading");
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
                    $('#button_save_image').prop('disabled', false);
                    $('#button_save_image').removeClass("loading");
                    location.reload();
                    //showMessage("success", "Foto actualizada correctamente");
                },
                error: function(e) {
                    console.log(e); 
                    //$("#password_new").val("");
                    showMessage("warning", "Error al modificar la foto");
                    $('#button_save_image').prop('disabled', false);
                    $('#button_save_image').removeClass("loading");
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

    $('input[type="file"]').change(function(e) {
        var fileName = e.target.files[0].name;
        //$("#file").val(fileName);
        
        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("perfil_photo").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });

</script>
@endprepend