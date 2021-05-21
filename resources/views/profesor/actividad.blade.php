<div class="bibliotecaOptions">
    <div class="actividadOption"> 
        <img src="{{asset($lectura->image_card)}}" alt="">
        <div class="actividadRight">
            <h2>{{$lectura->title}}</h2>
            @if (isset($lectura->content))
                <p>{{$lectura->content_extra[0]->content}}...</p>
            @else
                {{-- <p>Sin contenido de texto</p> --}}
            @endif
            <a class="ui big green inverted fluid button" href="{{route('web_lectura_detalles_preview', ['id_lecturama'=>$lectura->id_lecturama, 'id_lectura'=>$lectura->id_reading])}}">Visualizar lectura</a>
        </div>
    </div>
</div>