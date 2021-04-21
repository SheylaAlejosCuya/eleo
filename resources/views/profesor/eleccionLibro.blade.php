<div class="bibliotecaContainer">
    <h2><strong>{{$subtitle}}</strong></h2>

    <div class="actividadesOptions">

        @if($optionIndex == 2)
            @foreach ($lecturas_asignadas as $lectura_asignadas)
                <a href="{{route('web_actividades_produccion_alumno_profesor', ['id_classroom'=> $alumno->id_classroom, 'id_user'=> $alumno->id_user, 'id_reading'=> $lectura_asignadas->reading->id_reading])}}" class="bibliotecaOption">
                    <img class="check" src="{{asset('images/check.png')}}" alt="">    
                    <img src="{{$lectura_asignadas->reading->image_card}}" alt="">
                    <h6>{{$lectura_asignadas->reading->title}}</h6>
                </a>
            @endforeach
        @elseif($optionIndex == 5)
            @foreach ($lecturas_asignadas as $lectura_asignadas)
                <a href="{{route('web_resultados_alumno_detalle_actividades', ['id_classroom'=> $alumno->id_classroom, 'id_user'=> $alumno->id_user])}}" class="bibliotecaOption">
                    <img class="check" src="{{asset('images/check.png')}}" alt="">    
                    <img src="{{$lectura_asignadas->reading->image_card}}" alt="">
                    <h6>{{$lectura_asignadas->reading->title}}</h6>
                </a>
            @endforeach
        @endif

    </div>
</div>