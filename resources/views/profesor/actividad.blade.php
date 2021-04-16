<div class="bibliotecaOptions">
    <div class="actividadOption"> 
       
        <img src="{{asset($lectura->image_card)}}" alt="">
        <div class="actividadRight">
            <h2>{{$lectura->title}}</h2>
            @if (isset($lectura->content))
                <p >{{$lectura->content}}..</p>
            @else
                <p>Sin contenido de texto</p>  
            @endif
            <button class="saveButton"><a href="{{route('web_lectura_detalles_preview', ['id_lecturama'=>$lectura->id_lecturama, 'id_lectura'=>$lectura->id_reading])}}">Visualizar lectura</a></button>
        </div>
    </div>
</div>