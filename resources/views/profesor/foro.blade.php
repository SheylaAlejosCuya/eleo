<link rel="stylesheet" href="{{asset('css/foro.css')}}">
<div class="infomacion">
    <button class="crearForoButton"><a href="./foro/crear">Crear Foro</a></button>

    @foreach($foros as $key => $foro)
        <div class="foro">
            <h1 class="foroTitle"><strong>{{$foro->title}}</strong></h1>
            <div class="foroContent">
                <div class="foroPregunta"><b>{{$foro->content}}</b></div>
                <button class="foroButton"><a href={{route('web_foro_profesor_detalle'. ['id_foro'=>$foro->id_forum])}}">Revisar Foro</a></button>
                <i class="fa fa-trash"></i>
            </div>
            <div class="foroInfo">
                <div class="foroIconData">
                    <i class="fa fa-user"></i>0 vistas
                </div>
                <div class="foroIconData">
                    <i class="far fa-comment-alt"></i>0 comentarios
                </div>
            </div>
        </div>
    @endforeach

</div>