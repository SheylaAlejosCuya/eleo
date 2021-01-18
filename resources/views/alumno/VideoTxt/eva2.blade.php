<link rel="stylesheet" href="{{asset('css/lecturas.css')}}">
<div class="infomacion">
        <div class="epreguntas-c">
            <h2 id="titulo"><b>Nivel literal</b></h2>
            <div id="p1">
                <p><b> Escoge la respuesta correcta</b></p> 
                <div class="audioContainer">
                    <audio controls controlsList="nodownload">
                        <source src="{{asset($lectura->audio)}}" type="audio/wav">
                    </audio>
                    <img class="actionButton" src="{{asset('images/escucho.png')}}" alt="">
                </div>            
            </div>
            <hr>
            <div class="epreguntas">

                @foreach($preguntas as $indice_1 => $pregunta)
                    <div class="rpt">
                        <h5><b>{{$pregunta->question}}</b></h5>
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
        <a href="{{route('web_video_preguntas3', ['id'=>$lectura->id_reading])}}"><button class="cancelButton" onclick="save()">Avanza</button></a>
    </div>
</div>
@prepend('scripts')
<script>

var respuestas_user = [];

@foreach($preguntas as $i => $pregunta)
respuestas_user.push(null);
$(".alternativa_{{$i}}").click(function() {
    console.log(".alternativa_{{$i}} - "+$(this).data("id"));
    respuestas_user[parseInt("{{$i}}")] = $(this).data("id");
});
@endforeach

    function save() {
        console.log(respuestas_user);
    }

</script>
@endprepend