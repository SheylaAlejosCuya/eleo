<style>
    .input_success{
        color: #169e44 !important;
        font-weight: bold !important;
        border: 2px solid #169e44 !important;
        border-radius: 4px !important;
        
    }
    .input_success {
        pointer-events: none !important;
    }
</style>
<div class="ui stackable centered grid">

    <div class="ten wide column">
        <div class="ui middle aligned equal width stackable grid">
            <div class="column">
                <h2 class="ui center aligned icon header">
                    <img class="ui inline icon image" src="{{asset($lectura->image_card)}}" alt="" style="width: 200px">
                    {{$lectura->title}}
                </h2>
            </div>
            <div class="column">
                <div class="ui grid">
                    <div class="center aligned column">
                        <button class="ui green button" onclick="openModal('asignar')" style="width: 70%">Asignar</button>
                    </div>
                </div>
            </div>
        </div>
        <br/><br/>
        <div class="ui vertical segment">
            <div class="ui stackable grid">
                <div class="eight wide column">
                    <h2 class="ui header">Video</h2>
                </div>
                <div class="four wide column">
                    <button class="ui green inverted fluid button" onclick="openModal('video')">Ver Introducción</button>
                </div>
                <div class="four wide column">
                    <button class="ui green inverted fluid button" onclick="openModal('videoPreguntas')">Ver preguntas</button>
                </div>
            </div>
        </div>
        <div class="ui vertical segment">
            <div class="ui stackable grid">
                <div class="eight wide column">
                    <h2 class="ui header">Audio</h2>
                </div>
                <div class="four wide column">
                    <button class="ui green inverted fluid button" onclick="openModal('audio')">Escuchar audio</button>
                </div>
                <div class="four wide column">
                    <button class="ui green inverted fluid button" onclick="openModal('audioPreguntas')">Ver preguntas</button>
                </div>
            </div>
        </div>
        <div class="ui vertical segment">
            <div class="ui stackable grid">
                <div class="eight wide column">
                    <h2 class="ui header">Texto</h2>
                </div>
                <div class="four wide column">
                    <button class="ui green inverted fluid button" onclick="openModal('texto')">Ver texto</button>
                </div>
                <div class="four wide column">
                    <button class="ui green inverted fluid button" onclick="openModal('textoPreguntas')">Ver preguntas</button>
                </div>
            </div>
        </div>
        <div class="ui vertical segment">
            <div class="ui stackable grid">
                <div class="twelve wide column">
                    <h2 class="ui header" style="height: unset">Actividad de Producción</h2>
                </div>
                <div class="four wide column">
                    <button class="ui green inverted fluid button" onclick="openModal('produccion')">Previsualizar</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="ui modal" id="asignar">
        <i class="close icon"></i>
        <div class="header">
            Asignar a     
        </div>
        <div class="content">
            <div class="ui centered stackable grid">
                
                @foreach($salones as $salon)

                    <div class="five wide column">
                        <div class="ui middle aligned grid">
                            <div class="two wide column">
                                <div class="ui checkbox">
                                    <input type="checkbox" name="classroom_checkbox" id='{{'classroom_'.$salon->id_classroom}}' value={{$salon->id_classroom}}>
                                    <label></label>
                                </div>
                            </div>
                            <div class="center aligned fourteen wide column">
                                <div class="ui segment">
                                    <div class="ui huge header">{{$salon->grade->grade.$salon->section->section}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="actions">
            <div class="ui positive button" onclick="guardar()">
                Guardar
            </div>
        </div>
    </div>

    <div class="ui modal" id="video" tabindex="-1" aria-hidden="true">
        <div class="content">
            @if (isset($lectura->video) && $lectura->video != '')
                <div class="c-video">
                    <video class="evideo" controlsList="nodownload" preload="auto">
                        <source src="{{$lectura->video}}" type="video/mp4">
                    </video>
                    <div class="evideocontrols">
                        <div class="evideocontrols__left">
                            <div class="playButton">
                                <i class="far fa-play-circle" id="play-pause"></i>
                            </div>
                        </div>
                        <div class="evideocontrols__right">
                            <div class="ebar">
                                <div class="evideobar" id="ebar">
                                    <div class="evideobarposition"></div>
                                </div>
                            </div>
                            <i class="fas fa-compress" id="fullscreenTrigger"></i>
                        </div>
                    </div>
                </div>
            @else

                @if (isset($lectura->image) && $lectura->image != '')
                    <img class="ui centered fluid image" src="{{asset($lectura->image)}}" alt="">
                @else
                    <p style="font-size: 1.5rem;">
                        Sin recurso que mostrar.
                    </p> 
                @endif
            @endif
        </div>
        <div class="actions">
            <h4 class="cancel" style="cursor: pointer">
                Cerrar
            </h4>
        </div>
    </div>

    <div class="ui modal" id="videoPreguntas">
        <i class="close icon"></i>
        <div class="content">
            <div class="ui small form">
                @if (count($preguntas_bloque0_texto) != 0)
                    @foreach ($preguntas_bloque0_texto as $pregunta_bloque0_texto)
                        <div class="field">
                            <label><h4>{!!$pregunta_bloque0_texto->question!!}</h4></label>
                            <input readonly value=""/><br><br>
                            {{-- @foreach ($pregunta_bloque0_texto->answers as $answer)
                                <input readonly value="{{$answer->answer}}"/><br><br>
                            @endforeach --}}
                        </div>
                    @endforeach
                @else
                    <p>
                        Sin preguntas que mostrar.
                    </p>  
                @endif
            </div>
        </div>
    </div>

    <div class="ui modal" id="audioPreguntas">
        <i class="close icon"></i>
        <div class="content">
            <div class="ui">
                <div class="sides">
                    <div class="active side">
                        <h1 class="ui dividing header" style="color: #00a3fb;">
                            Nivel Literal
                        </h1>
                        <div class="ui small form">
                            @if (count($preguntas_bloque1_literal) != 0)
                                @foreach ($preguntas_bloque1_literal as $pregunta_bloque1_literal)
                                    <div class="field">
                                        <label><h4>{!!$pregunta_bloque1_literal->question!!}</h4></label>
                                        @foreach ($pregunta_bloque1_literal->answers as $answer)
                                            <input @if($answer->correct == 'true') class='input_success' @endif readonly value="{{$answer->answer}}"/><br><br>
                                        @endforeach
                                    </div>
                                @endforeach
                            @else
                                <p>
                                    Sin preguntas que mostrar.
                                </p>  
                            @endif
            
                            
                        </div>
                    </div>
                    <div class="side">
                        <h1 class="ui dividing header" style="color: #00a3fb; margin-top: 2rem; !important">
                            Nivel Inferencial
                        </h1>
                        <div class="ui small form">
                            @if (count($preguntas_bloque1_inferencial) != 0)
                                @foreach ($preguntas_bloque1_inferencial as $pregunta_bloque1_inferencial)
                                    <div class="field">
                                        <label><h4>{!!$pregunta_bloque1_inferencial->question!!}</h4></label>
                                        @foreach ($pregunta_bloque1_inferencial->answers as $answer)
                                            <input @if($answer->correct == 'true') class='input_success' @endif readonly value="{{$answer->answer}}"/><br><br>
                                        @endforeach
                                    </div>
                                @endforeach
                            @else
                                <p>
                                    Sin preguntas que mostrar.
                                </p>  
                            @endif
                        </div>
                    </div>
                    <div class="side">
                        <h1 class="ui dividing header" style="color: #00a3fb; margin-top: 2rem; !important">
                            Nivel Crítico Valorativo
                        </h1>
                        <div class="ui small form">
                            @if (count($preguntas_bloque1_critico) != 0)
                                @foreach ($preguntas_bloque1_critico as $pregunta_bloque1_critico)
                                    <div class="field">
                                        <label><h4>{!!$pregunta_bloque1_critico->question!!}</h4></label>
                                        @foreach ($pregunta_bloque1_critico->answers as $answer)
                                            <input @if($answer->correct == 'true') class='input_success' @endif readonly value="{{$answer->answer}}"/><br><br>
                                        @endforeach
                                    </div>
                                @endforeach
                            @else
                                <p>
                                    Sin preguntas que mostrar.
                                </p>  
                            @endif

                        </div>
                    </div>
                    <div class="side">
                        <h1 class="ui dividing header" style="color: #00a3fb; margin-top: 2rem; !important">
                            Nivel Intertextual
                        </h1>
                        <div class="ui small form">
                            @if (count($preguntas_bloque1_intertextual) != 0)
                                @foreach ($preguntas_bloque1_intertextual as $pregunta_bloque1_intertextual)
                                    <div class="field">
                                        <label><h4>{!!$pregunta_bloque1_intertextual->question!!}</h4></label>
                                        @foreach ($pregunta_bloque1_intertextual->answers as $answer)
                                            <input @if($answer->correct == 'true') class='input_success' @endif readonly value="{{$answer->answer}}"/><br><br>
                                        @endforeach
                                    </div>
                                @endforeach
                            @else
                                <p>
                                    Sin preguntas que mostrar.
                                </p>  
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="actions" >
            <div class="ui right labeled green icon button" onclick="next()">
                <i class="right arrow icon"></i>
                Siguiente
            </div>
        </div> --}}
    </div>

    <div class="ui modal" id="audio" tabindex="-1" aria-hidden="true">
        <div class="content">
                @if (isset($lectura->audio) && $lectura->audio != '')
                    <audio style="width: inherit" controls controlsList="nodownload">   
                        <source src="{{$lectura->audio}}" type="audio/ogg">
                    </audio>
                @else
                    <p>
                        Sin audio que reproducir.
                    </p>  
                @endif
        </div>
        <div class="actions">
            <h4 class="cancel" style="cursor: pointer">
                Cerrar
            </h4>
        </div>
    </div>

    <div class="ui modal" id="texto" tabindex="-1" aria-hidden="true">
        <div class="header">{{$lectura->title}}</div>
        <div class="scrolling content">
        <div class="ui segment" style="font-family: 'Merienda', cursive;   font-size: larger; ">
            {{-- BLOQUE 1 LECTURA --}}

            @if (count($lectura->content_extra) == 0)
               <p>Sin texto que mostrar.</p>
            @else
                @foreach ($lectura->content_extra as $content_extra)

                    @isset($content_extra->content)
                        <p>
                            {!! $content_extra->content !!}
                        </p>
                    @endisset

                    @isset($content_extra->image_content)
                        @if($content_extra->image_content != "")
                            <img class="ui centered fluid large image" src="{{$content_extra->image_content}}" alt="Image">
                            </br>
                        @endif
                    @endisset
                    
                @endforeach
            @endif

        </div>
    </div>

    <div class="ui modal" id="textoPreguntas">
        <i class="close icon"></i>
        <div class="content">
            <div class="ui">
                <div class="sides">
                    <div class="active side">
                        <h1 class="ui dividing header" style="color: #00a3fb">
                            Nivel Literal
                        </h1>
                        <div class="ui small form">
                            @if (count($preguntas_bloque2_literal) != 0)
                                @foreach ($preguntas_bloque2_literal as $pregunta_bloque2_literal)
                                    <div class="field">
                                        <label><h4>{!!$pregunta_bloque2_literal->question!!}</h4></label>
                                        @foreach ($pregunta_bloque2_literal->answers as $answer)
                                            <input @if($answer->correct == 'true') class='input_success' @endif readonly value="{{$answer->answer}}"/><br><br>
                                        @endforeach
                                    </div>
                                @endforeach
                            @else
                                <p>
                                    Sin preguntas que mostrar.
                                </p>  
                            @endif
                           

                        </div>
                    </div>
                    <div class="side">
                        <h1 class="ui dividing header" style="color: #00a3fb; margin-top: 2rem; !important">
                            Nivel Inferencial
                        </h1>
                        <div class="ui small form">
                            @if (count($preguntas_bloque2_inferencial) != 0)
                                @foreach ($preguntas_bloque2_inferencial as $pregunta_bloque2_inferencial)
                                    <div class="field">
                                        <label><h4>{!!$pregunta_bloque2_inferencial->question!!}</h4></label>
                                        @foreach ($pregunta_bloque2_inferencial->answers as $answer)
                                            <input @if($answer->correct == 'true') class='input_success' @endif readonly value="{{$answer->answer}}"/><br><br>
                                        @endforeach
                                    </div>
                                @endforeach
                            @else
                                <p>
                                    Sin preguntas que mostrar.
                                </p>  
                            @endif
                        </div>
                    </div>
                    <div class="side">
                        <h1 class="ui dividing header" style="color: #00a3fb; margin-top: 2rem; !important">
                            Nivel Crítico Valorativo
                        </h1>
                        <div class="ui small form">
                            @if (count($preguntas_bloque2_critico) != 0)
                                @foreach ($preguntas_bloque2_critico as $pregunta_bloque2_critico)
                                    <div class="field">
                                        <label><h4>{!!$pregunta_bloque2_critico->question!!}</h4></label>
                                        @foreach ($pregunta_bloque2_critico->answers as $answer)
                                            <input @if($answer->correct == 'true') class='input_success' @endif readonly value="{{$answer->answer}}"/><br><br>
                                        @endforeach
                                    </div>
                                @endforeach
                            @else
                                <p>
                                    Sin preguntas que mostrar.
                                </p>  
                            @endif
                        </div>
                    </div>
                    <div class="side">
                        <h1 class="ui dividing header" style="color: #00a3fb; margin-top: 2rem; !important">
                            Nivel Intertextual
                        </h1>
                        <div class="ui small form">
                            @if (count($preguntas_bloque2_intertextual) != 0)
                                @foreach ($preguntas_bloque2_intertextual as $pregunta_bloque2_intertextual)
                                    <div class="field">
                                        <label><h4>{!!$pregunta_bloque2_intertextual->question!!}</h4></label>
                                        @foreach ($pregunta_bloque2_intertextual->answers as $answer)
                                            <input @if($answer->correct == 'true') class='input_success' @endif readonly value="{{$answer->answer}}"/><br><br>
                                        @endforeach
                                    </div>
                                @endforeach
                            @else
                                <p>
                                    Sin preguntas que mostrar.
                                </p>  
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="actions">
            <div class="ui right labeled green icon button" onclick="next()">
                <i class="right arrow icon"></i>
                Siguiente
            </div>
        </div> --}}
    </div>

    <div class="ui modal" id="produccion">
        <div class="header">Actividad de Producción</div>
        <div class="content">
            <div class="four wide column">
                @if($url_actividad != null && $url_actividad != "") 
                    <a href="{{$url_actividad}}" target="_blank" class="ui blue inverted fluid button">Descargar documento</a>
                @else
                    <p style="color: orange; font-size: 1.5rem;">Sin actividad disponible</p>
                @endif
                
            </div>

            {{-- <div class="description">
                <p>Una infografía es un texto de fácil comprensión que utiliza imágenes o gráficos junto con textos escritos para proporcionar información acerca de lo que se desea comunicar. Cabe resaltar que el texto escrito que emplea una infografía es resumido, porque se complementa con las imágenes para brindar un rápido entendimiento del tema al lector.</p>
                <div class="ui equal width grid">
                    <div class="column">
                        <div class="ui header" style="color: #29b2fc">
                            Pasos para elaborar una infografía
                        </div>
                        <div class="ui list">
                            <div class="item">
                                <div class="content">
                                    <div class="header">Primer paso:</div>
                                    <div class="description">Planifica tu infografía.</div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="content">
                                    <div class="header">Segundo paso:</div>
                                    <div class="description">Redacta tu infografía.</div>
                                </div>
                                <div class="ui bulleted list">
                                    <div class="item">Edita tu infografía en la Presentación final.</div>
                                    <div class="item">Publica tu infografía en esta plataforma.</div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="content">
                                    <div class="header">Tercer paso:</div>
                                    <div class="description">Reflexiona sobre tu aprendizaje.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <img class="ui fluid image" src="{{asset('images/info.jpeg')}}" alt="">
                    </div>
                </div>
            </div> --}}

        </div>
    </div>

</div>

@prepend('scripts')
<script>
    function openModal(data) {
        $('.ui.modal#' + data)
           .modal('show')
        ;
    }
</script>
<script>
    $('.shape').shape();
    function next() {
        $('.shape').shape('flip over');
    }
</script>
<script>
    function guardar(){
        classrooms = [];
        $("input:checkbox[name=classroom_checkbox]:checked").each(function() {
            classrooms.push($(this).val());
        });
        //alert(classrooms);
        $.ajax({
            type: "POST",
            url: "{{route('api_asignacion_lecturas')}}",
            dataType: "json",
            data: {
                "_token": "{{csrf_token()}}",
                "classrooms": classrooms.toString(),
                "id_reading": "{{$lectura->id_reading}}"
            },
            success: function(response) { 
                console.log(response); 
                showMessage('success', 'Lectura asignada correctamente');
            },
            error: function(e) {
                console.log(e); 
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


<script>
    var video = document.querySelector('.evideo');
    var videobar = document.getElementById('ebar');
    var position = document.querySelector('.evideobarposition');
    var btn = document.getElementById('play-pause');
    var fullscreenTrigger = document.getElementById('fullscreenTrigger');

    fullscreenTrigger.onclick = function() {
        if (video.requestFullscreen) {
            video.requestFullscreen();
        } else if (video.webkitRequestFullscreen) { /* Safari */
            video.webkitRequestFullscreen();
        } else if (video.msRequestFullscreen) { /* IE11 */
            video.msRequestFullscreen();
        }
    }

    function togglePlayPause() {
        if (video.paused) {
            btn.className = 'far fa-pause-circle';
            video.play();
        } else {
            btn.className = 'far fa-play-circle';
            video.pause();
        }
    }
    
    btn.onclick = function() {
        togglePlayPause();
    }

    video.addEventListener('timeupdate', function() {
        var pos = video.currentTime / video.duration;
        position.style.width = pos * 100 + '%';
        
    })

    document.addEventListener('keydown', function(event) {
        if (event.keyCode == 32) {
            if (video.paused) {
                console.log("play");
                btn.className = 'far fa-pause-circle';
                video.play();
            } else {
                console.log("pause");
                btn.className = 'far fa-play-circle';
                video.pause();
            }
        }
        else if (event.keyCode == 37) {
            video.currentTime = video.currentTime - 5;
        }
        else if (event.keyCode == 39) {
            video.currentTime = video.currentTime + 5;
        }
        else if (event.keyCode >= 96 && event.keyCode <= 105) {
            video.currentTime = ((event.keyCode - 96)/10) * video.duration;
        }
    }, true);
    
    videobar.onclick = function(event) {
        var rect = videobar.getBoundingClientRect();
        video.currentTime = ((event.pageX - rect.x) / rect.width) * video.duration;
    }

</script>

    @if (session('status_not_enable'))
        <script>
            showMessage("warning", "Sin actividad que descargar");

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
    @endif

@endprepend
