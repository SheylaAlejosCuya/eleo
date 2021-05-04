<link rel="stylesheet" href="{{asset('css/lecturas.css')}}">
<div class="infomacion">
        <div class="epreguntas-c">
            <h2 id="titulo"><b>Nivel crítico valorativo</b></h2>
            <div id="p1">
                <p><b> Escoge la respuesta correcta</b></p> 
                <div class="audioContainer">
                    <audio controls controlsList="nodownload">
                        <source src="{{$lectura->audio}}" type="audio/wav">
                    </audio>
                    <img class="actionButton" src="{{asset('images/escucho.png')}}" alt="">
                </div>              
            </div>
            <hr>
            <div class="epreguntas">
                @foreach($preguntas as $indice_1 => $pregunta)
                    <div class="rpt">
                        <h5><b>{!!$pregunta->question!!}</b></h5>
                        @if($pregunta->answer_completed)
                            @foreach($pregunta->answers as $indice_2 => $answer)
                                <div class="form-check  @if($answer->correct == 'true' && $pregunta->answer_completed == $answer->id_answer) form-check-positive @elseif($answer->correct == 'true') form-check-info @else @if($pregunta->answer_completed == $answer->id_answer) form-check-negative @else @endif @endif ">
                                    <input class="form-check-input alternativa_{{$indice_1}}" type="radio" name="response_{{$indice_1}}" value="{{$answer->id_answer}}" id="answer_{{$indice_1}}_{{$indice_2}}" disabled>
                                    <label class="form-check-label " for="answer_{{$indice_1}}_{{$indice_2}}" id='response_{{$indice_2}}' data-id='{{$answer->id_answer}}'>
                                        {!!$answer->answer!!}
                                    </label>
                                </div>
                            @endforeach
                        @else
                            @foreach($pregunta->answers as $indice_2 => $answer)
                                <div class="form-check">
                                    <input class="form-check-input alternativa_{{$indice_1}}" type="radio" name="response_{{$indice_1}}" value="{{$answer->id_answer}}" id="answer_{{$indice_1}}_{{$indice_2}}">
                                    <label class="form-check-label " for="answer_{{$indice_1}}_{{$indice_2}}" id='response_{{$indice_2}}' data-id='{{$answer->id_answer}}'>
                                        {!!$answer->answer!!}
                                    </label>
                                </div>
                            @endforeach
                        @endif
                    </div>
                @endforeach
            </div> 
        </div>
        <div class="ebuttons" style="font-family:'Nunito', sans-serif;"> 
            <a href="{{route('web_video_preguntas3', ['id'=>$lectura->id_reading])}}"><button class="cancelButton">Regresar</button></a>
            <button class="saveButton" onclick="confirm()" @if($preguntas[0]->answer_completed) disabled @else @endif>Verifica</button>
            <a href="{{route('web_lecturas', ['id_reading'=>$lectura->id_reading])}}"><button class="cancelButton">Avanza</button></a>
    </div>
</div>

@prepend('scripts')
<script>

    var respuestas_user = [];
    var preguntas_user = [];

    @foreach($preguntas as $i => $pregunta)
        respuestas_user.push(null);
        preguntas_user.push(parseInt("{{$pregunta->id_question}}"));
        $(".alternativa_{{$i}}").click(function() {
            console.log(".Pregunta_{{$i}} - "+$(this).val());
            respuestas_user[parseInt("{{$i}}")] = parseInt($(this).val());
        });
    @endforeach

    function confirm() {
        alertify.confirm('¿Enviar preguntas?', 'No se permitirán cambios después de calificar las preguntas', function() { 
            save();
        }, function() { 

        }).set('closable', false).set('labels', {ok:'Aceptar', cancel:'Cancelar'});
    }

    function save() {

        function callback () { 
            //console.log("all done");
            $.ajax({
                type: "POST",
                url: "{{route('api_preguntas_bloque2')}}",
                dataType: "json",
                data: {
                    "_token": "{{csrf_token()}}",
                    "questions": preguntas_user.toString(),
                    "answers": respuestas_user.toString()
                },
                success: function(response) { 
                    showMessage("success", "Preguntas subidas correctamente");
                    location.reload();
                    console.log(response); 
                },
                error: function(e) {
                    console.log(e); 
                }
            });
        }

        var itemsProcessed = 0;

        respuestas_user.forEach((element, index, array) => {
            if(element == null) {
                showMessage("warning", "Falta pregunta por completar");
                return;
            } else {
                itemsProcessed++;
            }
            if(itemsProcessed === array.length) {
                callback();
            }
        });

    }

    function showMessage(type, message) {
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "timeOut": "2000",
            "extendedTimeOut": "2000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr[type](message);
    }

</script>
@endprepend