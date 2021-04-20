<link rel="stylesheet" href="{{asset('css/aulas.css')}}">
<div class="infomacion">
    <h4>{{$subtitle}}</h4>
    <div class="reporteAlumno">
        <div class="reporteSection">
            <h1>Promedio General</h1>
            <div class="aulaTable">
                <a href="{{route('web_resultados_alumno_detalle_promedios', ['id_classroom'=> $alumno->id_classroom, 'id_user'=> $alumno->id_user])}}" class="reporteOption">
                    <img class="check" src="{{asset('images/check.png')}}" alt="">
                    <p>Evaluación de compresión general</p>
                </a>
                {{-- <a href="{{route('web_resultados_alumno_detalle_actividades', ['id_classroom'=> $alumno->id_classroom, 'id_user'=> $alumno->id_user])}}" class="reporteOption">
                    <img class="check" src="{{asset('images/check.png')}}" alt="">
                    <p>Evaluación de producción de textos</p>
                </a> --}}
            </div>
        </div>
        <div class="reporteSection">
            <h1>Actividades</h1>
            <div class="aulaTable">
                <a href="{{route('web_resultados_alumno_detalle_evaluacion', ['id_classroom'=> $alumno->id_classroom, 'id_user'=> $alumno->id_user])}}" class="reporteOption">
                    <img class="check" src="{{asset('images/check.png')}}" alt="">
                    <p>Evaluación de compresión por Lectura</p>
                </a>
                <a href="{{route('web_resultados_alumno_detalle_evaluacion', ['id_classroom'=> $alumno->id_classroom, 'id_user'=> $alumno->id_user])}}" class="reporteOption">
                    <img class="check" src="{{asset('images/check.png')}}" alt="">
                    <p>Evaluación de producción por Lectura</p>
                </a>
            </div>
        </div>
    </div>
</div>