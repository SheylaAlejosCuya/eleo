<link rel="stylesheet" href="{{asset('css/lecturas.css')}}">
<div class="infomacion">
        <div class="epreguntas-c">
            <h2 id="titulo" class="enunciadoL"><b>Nivel intertextual</b></h2>
            <div id="p1" class="enunciadoL">
                <p><b> Escoge la respuesta correcta</b></p>
                <img class="actionButton" src="{{asset('images/lee.png')}}" alt=""></h5>
            </div>
            <hr>
            <div class="epreguntas">
                 @foreach($preguntas as $indice_1 => $pregunta)
                    <div class="rpt">

                        @if($pregunta->url_extra == 'no_url')
                            <h5><b>{{$pregunta->question}}</b></h5>
                        @else
                            <h5><b><?= explode("url_extra", $pregunta->question)[0] ?> <a href="{{$pregunta->url_extra}}">Video</a> <?= explode("url_extra", $pregunta->question)[1] ?></b></h5>
                        @endif

                        @foreach($pregunta->answers as $indice_2 => $answer)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="response_{{$indice_1}}" value="" id="answer_{{$indice_1}}_{{$indice_2}}">
                                <label class="form-check-label"  for="answer_{{$indice_1}}_{{$indice_2}}" id='response_{{$indice_2}}' data-id='{{$answer->id_answer}}' class="alternativa_{{$indice_1}}">
                                        {{$answer->answer}}
                                </label>
                            </div>
                        @endforeach

                    </div>
                @endforeach
            </div>
        </div>
        <div class="ebuttons" style="font-family:'Nunito', sans-serif;"> 
        <button class="saveButton">Verifica</button>
        <a href="{{route('web_texto_preguntas5', ['id_reading'=>37])}}"><button class="cancelButton">Avanza</button></a>
    </div>
</div>