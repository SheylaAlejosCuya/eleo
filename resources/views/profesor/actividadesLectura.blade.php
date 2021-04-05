<div class="bibliotecaContainer">
    <h2><strong>{{$subtitle}}</strong></h2>
    <div class="actividadesOptions">      
            @foreach ($lecturas as $lectura) 
                    <a href="{{route('web_lecturas_detalles', ['id_lecturama' => $lectura->id_lecturama , 'id_lectura' => $lectura->id_reading])}}" class="bibliotecaOption">
                        <img class="check" src="{{asset('images/check.png')}}" alt="">    
                        <img src="{{asset($lectura->image_card)}}" alt="">
                        <h5>{{$lectura->title}}</h5>
                    </a>
            @endforeach
    </div>
</div>