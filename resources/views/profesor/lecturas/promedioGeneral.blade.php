<link rel="stylesheet" href="{{asset('css/aulas.css')}}">
<div class="infomacion">
    <h4>{{$subtitle}}</h4>
    <div class="reporteAlumno">
        <div class="reporteLeft">
            <x-result-progress-bar title="COMPRENSIÓN AUDITIVA" :results="$auditiva" />
            <x-result-progress-bar title="COMPRENSIÓN DE TEXTOS" :results="$textos" />
        </div>
    </div>
</div>