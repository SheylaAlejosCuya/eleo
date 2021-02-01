<link rel="stylesheet" href="{{asset('css/lecturas.css')}}">
<div class="infomacion">
        <div class="epreguntas-c">
            <h2 id="titulo" class="enunciadoL"><b>Nivel inferencial</b></h2>
            <div id="p1" class="enunciadoL">
                <p><b> Escoge la respuesta correcta</b></p>
                <img class="actionButton" src="{{asset('images/lee.png')}}" alt=""></h5>
            </div>
            <hr>
            <div class="epreguntas">
                    <div class="rpt">
                        <h5><b>1. Pregunta asidnaosidnasod</b></h5>
                        <div class="form-check form-check-positive">
                            <input class="form-check-input" type="radio" name="response_1" value="" id="answer_1_1">
                            <label class="form-check-label"  for="answer_1_1" id='response_1' data-id='1' class="alternativa_1">
                                a. aosdiahsodia
                            </label>
                        </div>
                        <div class="form-check form-check-negative">
                            <input class="form-check-input" type="radio" name="response_1" value="" id="answer_1_2">
                            <label class="form-check-label"  for="answer_1_2" id='response_2' data-id='2' class="alternativa_2">
                                a. aosdiahsodia
                            </label>
                        </div>
                        <div class="form-check form-check-info">
                            <input class="form-check-input" type="radio" name="response_1" value="" id="answer_1_3">
                            <label class="form-check-label"  for="answer_1_3" id='response_3' data-id='3' class="alternativa_3">
                                a. aosdiahsodia
                            </label>
                        </div>
                    </div>
            </div>
        </div>
        <div class="ebuttons" style="font-family:'Nunito', sans-serif;"> 
        <button class="saveButton">Verifica</button>
        <a href="{{route('web_texto_preguntas3', ['id_reading'=>37])}}"><button class="cancelButton">Avanza</button></a>
    </div>
</div>