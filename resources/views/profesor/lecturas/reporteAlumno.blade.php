<link rel="stylesheet" href="{{asset('css/aulas.css')}}">
<div class="infomacion">
    <h4>{{$subtitle}}</h4>
    <div class="reporteAlumno">
        <div class="reporteSection">
            <h1>Promedio General</h1>
            <div class="aulaTable">
                <a href="./{{$alumno}}/promedioGeneral" class="reporteOption">
                    <img class="check" src="{{asset('images/check.png')}}" alt="">
                    <p>Evaluación de comprensión</p>
                </a>
                <a href="./{{$alumno}}/actividades" class="reporteOption">
                    <img class="check" src="{{asset('images/check.png')}}" alt="">
                    <p>Evaluación de comprensión</p>
                </a>
            </div>
        </div>
        <div class="reporteSection">
            <h1>Actividades</h1>
            <div class="aulaTable">
                <a href="./{{$alumno}}/evaluacionComprension" class="reporteOption">
                    <img class="check" src="{{asset('images/check.png')}}" alt="">
                    <p>Evaluación de comprensión</p>
                </a>
                <a href="./{{$alumno}}/actividades" class="reporteOption">
                    <img class="check" src="{{asset('images/check.png')}}" alt="">
                    <p>Evaluación de comprensión</p>
                </a>
            </div>
        </div>
    </div>
</div>