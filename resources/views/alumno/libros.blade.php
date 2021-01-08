<link rel="stylesheet" href="{{asset('css/libros.css')}}">

<div class="infomacion">
    <h4>{{$subtitle}}</h4>
    <div class="book-table">

        @if($desafio)
            @foreach($lecturas as $lectura)
                <a class="book-card" href="{{route('web_desafios_audios', ['id'=> $lectura->id_reading])}}">
                    <img src="{{asset("$lectura->image_card")}}" alt="">
                    <h6>{{$lectura->tittle}}</h6>
                </a>
            @endforeach
        @else
            @foreach($lecturas as $lectura)
                <a class="book-card" href="{{route('web_libros_video', ['id'=> $lectura->id_reading])}}">
                    <img src="{{asset("$lectura->image_card")}}" alt="">
                    <h6>{{$lectura->tittle}}</h6>
                </a>
            @endforeach
        @endif
        
       
    </div>
</div>