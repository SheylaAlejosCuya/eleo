<link rel="stylesheet" href="{{asset('css/aulas.css')}}">
<div class="infomacion">
    <h4>{{$subtitle}}</h4>
    <div class="aulaTable">

        @if($optionIndex == 2)
            @foreach ($alumnos as $alumno)
                <a href="{{route('web_actividades_produccion_lecturas_profesor', ['id_classroom'=> $alumno->id_classroom, 'id_user'=> $alumno->id_user])}}" class="alumnoOption">
                    <img class="check" src="{{asset('images/check.png')}}" alt="">
                    @if($alumno->id_gender == '2')
                        <img src="{{asset('images/chico.png')}}" alt="Perfil">
                    @else
                        <img src="{{asset('images/chica.png')}}" alt="Perfil">
                    @endif
                    <p>{{$alumno->first_name.' '.$alumno->last_name}}</p>
                </a>
            @endforeach
        @elseif($optionIndex == 5)
            @foreach ($alumnos as $alumno)
                <a href="{{route('web_resultados_alumno_detalle', ['id_classroom'=> $alumno->id_classroom, 'id_user'=> $alumno->id_user])}}" class="alumnoOption">
                    <img class="check" src="{{asset('images/check.png')}}" alt="">
                    @if($alumno->id_gender == '2')
                        <img src="{{asset('images/chico.png')}}" alt="Perfil">
                    @else
                        <img src="{{asset('images/chica.png')}}" alt="Perfil">
                    @endif
                    <p>{{$alumno->first_name.' '.$alumno->last_name}}</p>
                </a>
            @endforeach
        @endif

        
        
        
    </div>
</div>