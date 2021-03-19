<link rel="stylesheet" href="{{asset('css/foro.css')}}">
<div class="infomacion">
    <a href="./foro/crear"><button class="crearForoButton">Crear Foro</button></a>

    @foreach($foros as $key => $foro)
        <div class="foro">
            <h1 class="foroTitle"><strong>{{$foro->title}}</strong></h1>
            <div class="foroContent">
                <div class="foroPregunta"><b>{{$foro->content}}</b></div>
              {{-- comment --}}
                <button class="foroButton"><a href={{route('web_foro_profesor_detalle', $foro)}}">Revisar Foro</a></button>
                <form method="POST" action="{{route('web_foro_profesor_eliminar', $foro)}}"  enctype="multipart/form-data">
                    @csrf @method('DELETE')
                    <button class="btn" ><i class="fa fa-trash"></i></button>                    
                </form>
                
                





                
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