<link rel="stylesheet" href="{{asset('css/libros.css')}}">

<div class="infomacion">
    <h4>{{$subtitle}}</h4>

    <div class="econtainer" hidden>
        <img src="{{asset('/images/imagen_lecturas.jpeg')}}" alt="">    
    </div>

    <div class="book-table" >

        @if($type == 'desafios')
            @foreach($lecturas as $lectura)
                <a class="book-card" href="{{route('web_desafios_audios', ['id'=> $lectura->id_reading])}}">
                    <img src="{{asset("$lectura->image_card")}}" alt="">
                    <h6>{{$lectura->title}}</h6>
                </a>
            @endforeach
        @elseif($type == 'libros')
            @foreach($lecturas as $lectura)
                <a class="book-card" href="{{route('web_libros_video', ['id'=> $lectura->id_reading])}}">
                    <img src="{{asset("$lectura->image_card")}}" alt="">
                    <h6>{{$lectura->title}}</h6>
                </a>
            @endforeach
        @elseif($type == 'gamificacion')
            @foreach($lecturas as $lectura)
                <a class="book-card" href="{{route('web_gamificacion_pupiletras', ['id'=> $lectura->id_reading])}}">
                    <img src="{{asset("$lectura->image_card")}}" alt="">
                    <h6>{{$lectura->title}}</h6>
                </a>
            @endforeach
        @endif
           
    </div>
</div>