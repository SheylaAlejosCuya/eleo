                  
<div class="econtainer">
  <div class="ewelcome">
    <p>
      @if($profesor->id_gender == '2')
        ¡Bienvenido, {{$profesor->first_name}}
      @else
        ¡Bienvenida, {{$profesor->first_name}}
      @endif
    </p>
    <div id="botones">
      <button class="guiaButtonP" hidden>Guia de Usuario</button>
      <button class="saveButton" hidden><a href="profesor/tutoriales">Tutoriales</a></button>
    </div>
  </div>
</div>

@include('includes.footer')