<link rel="stylesheet" href="{{asset('css/aulas.css')}}">
<div class="infomacion">
    <h4>{{$subtitle}}</h4>
    <div class="aulaTable">

        @if($optionIndex == 2)
            @foreach ($aulas as $aula)
                <a href="{{route('web_actividades_produccion_aula_profesor',['id_classroom'=>$aula->id_classroom])}}" class="aulaOption">
                    <img class="check" src="{{asset('images/check.png')}}" alt="">
                    <img src="{{asset('images/pizarar.png')}}" alt="">
                    <p>{{$aula->level->level}} - {{$aula->grade->grade}} {{$aula->section->section}}</p>
                </a>
            @endforeach
        @elseif($optionIndex == 5)
            @foreach ($aulas as $aula)
                <a href="{{route('web_resultados_aulas',['id_classroom'=>$aula->id_classroom])}}" class="aulaOption">
                    <img class="check" src="{{asset('images/check.png')}}" alt="">
                    <img src="{{asset('images/pizarar.png')}}" alt="">
                    <p>{{$aula->level->level}} - {{$aula->grade->grade}} {{$aula->section->section}}</p>
                </a>
            @endforeach
        @endif
        

    </div>
</div>