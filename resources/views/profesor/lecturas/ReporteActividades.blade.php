<link rel="stylesheet" href="{{asset('css/aulas.css')}}">
<div class="infomacion">
    <h4>{{$subtitle}}</h4>
    <div class="reporteAlumno">
        <div class="reporteSection">
            <h1>Rúbricas de Calificación</h1>
            <button class="saveButton" style="width: auto">Previsualizar - Descargar</button>
        </div>
        <div class="reporteSection">
            <x-result-progress-bar title="hi" :results="$alumnoResults" />
        </div>
    </div>
</div>