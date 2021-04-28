                  
<div class="econtainer">
  <div class="ewelcome">
    <p style="color: black !important;">
      @if($profesor->id_gender == '2')
        ¡Bienvenido, {{$profesor->first_name}}
      @else
        ¡Bienvenida, {{$profesor->first_name}}
      @endif
    </p>
    <h1>Institución Educativa: <strong style="color: rgb(99, 98, 98) !important;">{{$profesor->school->name}}</strong></h1>
    <div class="ui segment">
      <img class="ui centered medium image" src="{{asset($profesor->school->badge)}}">
    </div>
    <div id="botones">
      <button class="guiaButtonP" hidden>Guia de Usuario</button>
      <button class="saveButton" hidden><a href="profesor/tutoriales">Tutoriales</a></button>
    </div>
  </div>
</div>

@include('includes.footer')