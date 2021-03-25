                  
<div class="econtainer">
  <img src="{{asset('images/iguanitaNueva.png')}}" alt="">
  <div class="ewelcome">
    <p>
      @if($alumno->id_gender == '2')
        ¡Bienvenido, <br> {{$alumno->first_name}}
      @else
        ¡Bienvenida, <br> {{$alumno->first_name}}
      @endif
    </p>
    <div id="botones">
      <button class="guiaButton" hidden>Guia de Usuario</button>
      <button class="saveButton" hidden><a href="tutoriales">Tutoriales</a></button>
    </div>
  </div>
</div>

@include('includes.footer')