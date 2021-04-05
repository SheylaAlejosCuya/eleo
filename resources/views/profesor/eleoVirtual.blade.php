<div class="eleoVirtual">
    <h4>{{$subtitle}}</h4>
    <div class="bibliotecaOptions">
        @foreach ($lecturamas as $lecturama)
            <div class="eleoVirtualOption">
                <a href="{{route('web_lecturas_actividades',['id_lecturama' => $lecturama->id_lecturama])}}"><img src="{{asset($lecturama->image)}}" alt=""></a>
                <b>E-Leo</b>
                <p>Nivel {{$lecturama->id_lecturama}}</p>
            </div>
        @endforeach
    </div>
</div>