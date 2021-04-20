<div class="bibliotecaContainer">
    <h2><strong>{{$subtitle}}</strong></h2>

    <div class="actividadesOptions">

        @foreach ($lecturas_asignadas as $lectura_asignadas)
            <a href="{{route('web_resultados_alumno_detalle_actividades', ['id_classroom'=> $alumno->id_classroom, 'id_user'=> $alumno->id_user])}}" class="bibliotecaOption">
                <img class="check" src="{{asset('images/check.png')}}" alt="">    
                <img src="{{$lectura_asignadas->reading->image_card}}" alt="">
                <h6>{{$lectura_asignadas->reading->title}}</h6>
            </a>
        @endforeach

    </div>
</div>