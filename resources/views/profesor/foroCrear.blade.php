<link rel="stylesheet" href="{{asset('css/foro.css')}}">
<div class="infomacion">
    
    
</div>
{{-- Modale Inicio --}}
<form action="{{route('api_crear_nuevo_foro')}}" method="post">
<div >
    <div class="asignarContainer">
        <div class="asignarModal">
           <div class="foroCrear">
        <input type="text" name="title" id="forum_title" placeholder="Ingresar título" >
        
        <textarea name="content" id="forum_content" cols="30" rows="5" placeholder="Redactar contenido del foro"></textarea>
        
        <br>
    {{-- comment 
        <div class="botones">
            <button class="saveButton" onclick="mostrarModal()">Seleccionar aulas</button>
        </div>
        --}}
    </div> <p>Aulas</p>
            <div class="asignarGrados">
              <!-- Default  @foreach($salones as $key => $salon)
                     <div class="asignarGradosOption">
                        <input type="checkbox"  value="{{$salon->id_classroom}}" id="checkbox_classroom_{{$key}}" class="checkbox_classroom" name="checkbox_classroom_{{$key}}">
                        <p for="classroom_{{$key}}">{{$salon->level->level}} - {{$salon->grade->grade}}{{$salon->section->section}}</p>
                    </div>
                    
                @endforeach
                ------------------
                <br>
 checkbox -->
@foreach($salones as $key => $salon)
              
   <div class="form-check asignarGradosOption">
      
  <input
    class="form-check-input checkbox_classroom"
    type="checkbox"
    value="{{$salon->id_classroom}}"
    name="id_classroom"
    id="checkbox_classroom_{{$key}}"
  />
  <label class="form-check-label" for="checkbox_classroom_{{$key}}">
    <p>{{$salon->level->level}} - {{$salon->grade->grade}}{{$salon->section->section}}</p>
  </label>
</div>                 
                @endforeach


<!-- Checked checkbox -->

            </div>
            <button class="saveButton" >Publicar</button>
            <br>
            <button class="cancelButton" onclick="ocultarModal()">Cancelar</button>
        </div>
    </div>
</div>
</form>
 {{-- Modale Inicio --}}
@prepend('scripts')
<script>
    var modal_asignacion = document.querySelector("#asignarModal");

    function mostrarModal() {
        modal_asignacion.removeAttribute("hidden");
    }

    function ocultarModal() {
        modal_asignacion.setAttribute("hidden", "hidden");
    }
/*
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
    }*/
</script>
@endprepend