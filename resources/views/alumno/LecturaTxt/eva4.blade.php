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
                                <input class="form-check-input alternativa_{{$indice_1}}" type="radio" name="response_{{$indice_1}}" value="{{$answer->id_answer}}" id="answer_{{$indice_1}}_{{$indice_2}}">
                                <label class="form-check-label"  for="answer_{{$indice_1}}_{{$indice_2}}" id='response_{{$indice_2}}' data-id='{{$answer->id_answer}}'>
                                        {{$answer->answer}}
                                </label>
                            </div>
                        @endforeach

                    </div>
                @endforeach
            </div>
        </div>
        <div class="ebuttons" style="font-family:'Nunito', sans-serif;"> 
        <button class="saveButton" onclick="save()">Verifica</button>
        <a href="{{route('web_texto_preguntas5', ['id_reading'=>37])}}"><button class="cancelButton">Avanza</button></a>
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

    function save() {

        function callback () {
            console.log("All done");
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
                showMessage("warning", "Se deben contestar todas las preguntas");
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