<link rel="stylesheet" href="{{asset('css/foro.css')}}">
<div class="infomacion">
    <div class="foroCrear">
        <input type="text" name="forum_title" id="forum_title" placeholder="Ingresar título">
        <textarea name="forum_content" id="forum_content" cols="30" rows="5" placeholder="Redactar contenido del foro"></textarea>
        <p hidden><i class="fas fa-paperclip"></i>Adjuntar imagen o video</p>
        <br>
        <div class="botones">
            <button class="saveButton" onclick="mostrarModal()">Seleccionar aulas</button>
        </div>
    </div>
</div>
<div class="modalContainer" id="asignarModal" hidden>
    <div class="asignarContainer">
        <div class="asignarModal">
            <p>Aulas</p>
            <div class="asignarGrados">
                @foreach($salones as $key => $salon)
                    <div class="asignarGradosOption">
                        <input type="checkbox" name="checkbox_classroom_{{$key}}" value="{{$salon->id_classroom}}" id="checkbox_classroom_{{$key}}" class="checkbox_classroom">
                        <p for="classroom_{{$key}}">{{$salon->level->level}} - {{$salon->grade->grade}}{{$salon->section->section}}</p>
                    </div>
                @endforeach
            </div>
            <button class="saveButton" onclick="asignarAulas()">Publicar</button>
            <br>
            <button class="cancelButton" onclick="ocultarModal()">Cancelar</button>
        </div>
    </div>
</div>

@prepend('scripts')
<script>
    var modal_asignacion = document.querySelector("#asignarModal");

    function mostrarModal() {
        modal_asignacion.removeAttribute("hidden");
    }

    function ocultarModal() {
        modal_asignacion.setAttribute("hidden", "hidden");
    }

    function asignarAulas() {
        var valuesChecked = [];
        var checkedValue = null; 
        var inputElements = document.getElementsByClassName('checkbox_classroom');
        for(var i=0; inputElements[i]; ++i) {
            if(inputElements[i].checked){
                checkedValue = parseInt(inputElements[i].value);
                valuesChecked.push(checkedValue);
            }
        }
        console.log(valuesChecked);
    }
</script>
@endprepend