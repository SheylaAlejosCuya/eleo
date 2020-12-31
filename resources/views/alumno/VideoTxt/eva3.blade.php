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
                <div class="rpt">
                    <h5><b>3. A partir del texto, se puede inferir que los médicos:</b></h5>
                    <a href="#" class="btn-block">a. Aún no habían desarrollado grandes avances.</a>
                    <a href="#" class="btn-block">b. Solo creaban cosméticos de belleza.</a>
                    <a href="#" class="btn-block">c. Habían logrado grandes descubrimientos médicos.</a>
                    <a href="#" class="btn-block">d. No existían aún en Egipto antiguo.</a>
                </div>
                <div class="rpt">
                    <h5><b>4. De acuerdo a lo que se informa sobre la construcción de las pirámides, se puede entender que:</b></h5>
                    <a href="#" class="btn-block">a. La construcción de las pirámides fue sencilla.</a>
                    <a href="#" class="btn-block">b. La construcción de las pirámides fue rápida.</a>
                    <a href="#" class="btn-block">c. La construcción de las pirámides fue misteriosa.</a    >
                    <a href="#" class="btn-block">d. La construcción de las pirámides fue laboriosa.</a>
                </div>
            </div> 
        </div>
        <div class="ebuttons" style="font-family:'Nunito', sans-serif;"> 
        <button class="saveButton">Verifica</button>
        <button class="cancelButton"><a href="{{route('web_video_preguntas4', ['id'=>$lectura->id_reading])}}">Avanza</a></button>
    </div>
</div>