<link rel="stylesheet" href="{{asset('css/lecturas.css')}}">
<div class="infomacion">
        <div class="epreguntas-c">
            <h2 id="titulo"><b>Nivel inferencial</b></h2>
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
                            <a href="#" class="btn-block">{{$answer->answer}}</a>
                        @endforeach
                    </div>
                @endforeach
            </div> 
        </div>
        <div class="ebuttons" style="font-family:'Nunito', sans-serif;"> 
        <button class="saveButton">Verifica</button>
        <button class="cancelButton"><a href="{{route('web_video_preguntas4', ['id'=>$lectura->id_reading])}}">Avanza</a></button>
    </div>
</div>