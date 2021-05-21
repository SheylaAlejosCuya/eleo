<link rel="stylesheet" href="{{asset('css/foro.css')}}">

    <form action="{{route('api_crear_nuevo_foro')}}" method="POST" enctype="multipart/form-data">

    
                <div class="asignarContainer" style="margin-bottom: 5rem; margin-top: 2rem;">
                    <div class="asignarModal">

                        <div class="foroCrear" style="padding-right: 2rem; padding-left: 2rem;">
                            <input type="text" name="forum_title" id="forum_title" placeholder="Ingresar título" >
                            <textarea name="forum_content" id="forum_content" cols="30" rows="6" placeholder="Redactar contenido del foro"></textarea>
                            <img style="margin-top: 1rem;" src="{{asset('images/no_icon.png')}}" class="ui medium image centered" id='image' name='image'>
                            <input type="file" name="forum_image" id="forum_image" accept="image/x-png,image/jpeg" >
                            <br>
                        </div> 

                        <p>Aulas</p>

                        <div style="padding-right: 2rem; padding-left: 2rem;">
                            <div class="ui fluid search selection dropdown">
                                <input type="hidden" name="aula" id="aula">
                                <i class="dropdown icon"></i>
                                <div class="default text">Seleccionar aula</div>

                                <div class="menu">
                                    <div class="header">Primaria</div>
                                    <div class="divider"></div>

                                    @foreach($aulas as $key_s => $aula)
                                        @if($aula->id_level == 1)
                                            <div class="item" data-value="{{$aula->id_classroom}}">{{$aula->grade->grade.' '.$aula->section->section}}</div>
                                        @endif
                                    @endforeach

                                    <div class="header">Secundaria</div>
                                    <div class="divider"></div>

                                    @foreach($aulas as $key_s => $aula)
                                        @if($aula->id_level == 2)
                                            <div class="item" data-value="{{$aula->id_classroom}}">{{$aula->grade->grade.' '.$aula->section->section}}</div>
                                        @endif
                                    @endforeach

                                </div>

                            </div>
                        </div>
                    
                        <br>
                        <br>
                        <div class="ui middle aligned four column centered grid">
                            <button id="button_send" class="ui big green button">Publicar</button>
                            {{-- <button type="reset" class="ui big green basic button">Cancelar</button> --}}
                        </div>
                        
                    </div>
                </div>

            </form>
 {{-- Modale Inicio --}}
@prepend('scripts')
<script>

    $('.ui.dropdown').dropdown();

    $('input[type="file"]').change(function(e) {
        var fileName = e.target.files[0].name;
        //$("#file").val(fileName);
        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("image").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });

    $("form").on("submit", function (e) {

        $('#button_send').prop('disabled', true);

        if( $("#forum_title").val() == "" || $("#forum_title").val() == null ){
            showMessage("warning", "Se debe ingresar un título");
            e.preventDefault();
            $('#button_send').prop('disabled', false);
        }

        if( $("#forum_content").val() == "" || $("#forum_content").val() == null ){
            showMessage("warning", "Se debe seleccionar un contenido");
            e.preventDefault();
            $('#button_send').prop('disabled', false);
        }

        if( document.getElementById("forum_image").files.length == 0 ){
            showMessage("warning", "Se debe seleccionar una imagen");
            e.preventDefault();
            $('#button_send').prop('disabled', false);
        }

        if( $("#aula").val() == "" || $("#aula").val() == null ){
            showMessage("warning", "Se debe seleccionar un aula");
            e.preventDefault();
            $('#button_send').prop('disabled', false);
        }

        // if(aula == "" || aula == null){
        //     showMessage("warning", "Se debe seleccionar un aula");
        // }

        // if(aula == "" || aula == null){
        //     showMessage("warning", "Se debe seleccionar un aula");
        // }


        // e.preventDefault();


    });

    // function registrarForo() {

    //     var aula = $("#aula").val();

    //     if(aula == "" || aula == null){
    //         showMessage("warning", "Se debe seleccionar un aula");
            
    //     }

    //     if(aula == "" || aula == null){
    //         showMessage("warning", "Se debe seleccionar un aula");
    //     }

    //     if(aula == "" || aula == null){
    //         showMessage("warning", "Se debe seleccionar un aula");
    //     }

        

    //     // $.ajax({
    //     //     type: "POST",
    //     //     url: "{{route('api_crear_nuevo_foro')}}",
    //     //     dataType: "json",
    //     //     data: {
    //     //         "_token": "{{csrf_token()}}",
    //     //         "id_alumno": current_select.data('id-alumno'),
    //     //         "id_classroom": current_select.val()
    //     //     },
    //     //     success: function(response) { 
    //     //         console.log(response);
    //     //     },
    //     //     error: function(e) {
    //     //         console.log(e); 
    //     //     }
    //     // });
    // }
    
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