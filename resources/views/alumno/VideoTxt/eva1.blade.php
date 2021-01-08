<link rel="stylesheet" href="{{asset('css/lecturas.css')}}">
<link rel="stylesheet" href="{{asset('css/videos.css')}}">
<div class="infomacion">
    
    <div class="epreguntas-c">
        <div id="p1">
            <p><b>Luego de ver el video introductorio, responde a las siguientes preguntas</b></p>
            <div class="iconContainer">
                <img class="actionButton" src="{{asset('images/escucho.png')}}" alt="">
                <img class="actionButton" src="{{asset('images/escribe.png')}}" alt="">
                <img class="actionButton" src="{{asset('images/lee.png')}}" alt="">
            </div>
        </div>
        <hr>

        @foreach($preguntas as $indice => $pregunta)
            <div class="epreguntas">
                <div class="rpt">
                    <h5>{{$pregunta->question}}</h5>
                    <textarea id='response_{{$indice}}' class="rspInput" rows="4" cols="50" placeholder="Escribe tu respuesta"></textarea>
                </div>
            </div>
            <br>
        @endforeach

    </div>
    <div class="ebuttons" style="font-family:'Nunito', sans-serif;"> 
        <button class="saveButton">Verifica</button>
        <a href="{{route('web_video_preguntas2', ['id'=>$lectura->id_reading])}}"><button class="cancelButton" onclick="save()">Avanza</button></a>
    </div>
</div>

@prepend('scripts')
<script>
    function save() {

        var nro_preguntas = parseInt("{{count($preguntas)}}");
        var respuestas = [];

        for (let i = 0; i < nro_preguntas; i++) {
            var id_textview = "#response_"+i;
            respuestas.push($(id_textview).val());
        }

        $.ajax({
            type: "POST",
            url: "{{route('api_preguntas_bloque1')}}",
            dataType: "json",
            data: {
                "_token": "{{csrf_token()}}",
                "questions": respuestas.toString()
            },
            success: function(response) { 
                console.log(response); 
            },
            error: function(e) {
                console.log(e); 
            }
        });
    }
</script>
@endprepend
