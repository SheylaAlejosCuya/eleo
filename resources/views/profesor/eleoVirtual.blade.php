<div class="eleoVirtual">
    <h4>{{$subtitle}}</h4>
    <div class="bibliotecaOptions">
        @foreach ($lecturamas as $lecturama)
            <div class="eleoVirtualOption">
                <a href="{{route('web_lecturas_disponibles',['id_lecturama' => $lecturama->id_lecturama])}}"><img src="{{asset($lecturama->image)}}" alt=""></a>
                <p>Nivel n° {{$lecturama->id_lecturama}}</p>
                <b></b>
            </div>
        @endforeach
    </div>
</div>