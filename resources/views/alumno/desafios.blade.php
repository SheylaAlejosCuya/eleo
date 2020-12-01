<link rel="stylesheet" href="{{asset('css/libros.css')}}">
<div class="infomacion">
    <h4>{{$subtitle}}</h4>
    <div class="edesafio-container">
        <a href="{{$d1url}}" class="edesafio-card">
            <img class="check" src="images/check.png" alt="">
            <img class="desafioImg" src="{{asset('images/desafio1.png')}}" alt="">
        </a>
        <a href="{{$d2url}}" class="edesafio-card">
            <img class="check" src="images/check.png" alt="">
            <img class="desafioImg" src="{{asset('images/desafio2.png')}}" alt="">    
        </a>
    </div>
</div>