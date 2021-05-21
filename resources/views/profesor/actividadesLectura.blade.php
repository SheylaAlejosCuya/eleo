<style>
    .title_lectura {
        margin: 0rem 0 0.5rem !important;
    }
</style>


<div class="bibliotecaContainer">
    <h2><strong>{{$subtitle}}</strong></h2>
    <div class="actividadesOptions">      
            @foreach ($lecturas as $lectura) 
                    <a href="{{route('web_lectura_detalles', ['id_lecturama' => $lectura->id_lecturama , 'id_lectura' => $lectura->id_reading])}}" class="bibliotecaOption">
                        <img class="check" src="{{asset('images/check.png')}}">    
                        <img src="{{asset($lectura->image_card)}}">
                        <h5 class="title_lectura">{{$lectura->title}}</h5>
                    </a>
            @endforeach
    </div>
</div>