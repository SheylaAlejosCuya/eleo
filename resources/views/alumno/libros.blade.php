<link rel="stylesheet" href="{{asset('css/libros.css')}}">

<div class="infomacion">
    <h4>{{$subtitle}}</h4>

    <div class="econtainer">
        <img src="{{asset('/images/imagen_lecturas.jpeg')}}" alt="">    
    </div>

    <div class="book-table" hidden>

        @if($type == 'desafios')
            @foreach($lecturas as $lectura)
                <a class="book-card" href="#">
                    <img src="{{asset("$lectura->image_card")}}" alt="">
                    <h6>{{$lectura->title}}</h6>
                </a>
            @endforeach
        @elseif($type == 'libros')
            @foreach($lecturas as $lectura)
                <a class="book-card" href="#">
                    <img src="{{asset("$lectura->image_card")}}" alt="">
                    <h6>{{$lectura->title}}</h6>
                </a>
            @endforeach
        @elseif($type == 'gamificacion')
            @foreach($lecturas as $lectura)
                <a class="book-card" href="#">
                    <img src="{{asset("$lectura->image_card")}}" alt="">
                    <h6>{{$lectura->title}}</h6>
                </a>
            @endforeach
        @endif
           
    </div>
</div>