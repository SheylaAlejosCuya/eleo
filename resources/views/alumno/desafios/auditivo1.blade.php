<link rel="stylesheet" href="{{asset('css/lecturas.css')}}">
<div class="infomacion">
        <div class="epreguntas-c">
            <h2 id="titulo"><b></b></h2>
            <div id="p1">
                <p><b> Escoge la respuesta correcta</b></p> 
                <div class="audioContainer">
                    <audio controls>
                        <source src="horse.ogg" type="audio/ogg">
                    </audio>
                    <img class="actionButton" src="{{asset('images/escucho.png')}}" alt="">
                </div>            
            </div>
            <hr>
            <div class="epreguntas">
                <div class="rpt">
                    <a href="" class="btn-block">a. Rios egipcios.</a>
                    <a href="" class="btn-block">b. Faraones.</a>
                    <a href="" class="btn-block">c. Ciudades egipcias.</a>
                    <a href="" class="btn-block">d. Pirámides.</a>
                </div>
            </div> 
        </div>
        <div class="ebuttons" style="font-family:'Nunito', sans-serif;"> 
        <button class="saveButton">Verifica</button>
        <button class="cancelButton">Finalizar Actividad</button>
    </div>
</div>