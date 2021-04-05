<div class="bibliotecaOptions">
    <div class="actividadOption">
        <img class="star" src="{{asset('images/check.png')}}" alt="">
        <img src="{{asset('images/a.png')}}" alt="">
        <div class="actividadRight">
            <h2>{{$lectura->title}}</h2>
            <p>{{$lectura->content}}</p>
            <button class="saveButton"><a href="{{route('web_lecturas_detalles_preview', ['id_lecturama'=>$lectura->id_lecturama, 'id_lectura'=>$lectura->id_reading])}}">Visualizar</a></button>
        </div>
    </div>
</div>