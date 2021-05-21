<link rel="stylesheet" href="{{asset('css/foro.css')}}">

<div class="infomacion" style="margin-top: 1rem;">

    <a class="ui big orange button" href="{{route('web_foro_profesor_crear')}}" style="margin-bottom: 1.4rem !important;">Crear Foro</a>

    
    {{-- <p style="color: gray"><i class="fa fa-calendar-alt"></i> <i style="color: black" class="fa fa-arrow-right"></i> Fecha de creación.</p>
    <p style="color: gray"><i class="fa fa-pencil-alt"></i> <i style="color: black" class="fa fa-arrow-right"></i> Fecha de última modificación realizada.</p>
    <p style="color: gray"><i class="fa fa-user"></i> <i style="color: black" class="fa fa-arrow-right"></i> Número de visualizaciones.</p>
    <p style="color: gray"><i class="fa fa-comment-alt"></i> <i style="color: black" class="fa fa-arrow-right"></i> Número de comentarios realizados.</p> --}}

    <h2 style="color: gray">Número de foros activos: <i class="foroTitle"><strong>{{count($foros)}}</strong></i></h2>
    
    @foreach($foros as $key => $foro)

        <div class="foro">

            <h1 class="foroTitle"><strong>{{$foro->title}}</strong></h1>

            <div class="foroContent">
                
              {{-- comment --}}
              <a class="ui big green button" href="{{route('web_foro_profesor_detalle', $foro->id_forum)}}">Revisar Foro</a>

              <a href="{{route('web_foro_profesor_eliminar', $foro->id_forum)}}"><i class="fa fa-trash"></i></a>
                
                {{-- <form method="POST" action="{{route('web_foro_profesor_eliminar', $foro->id_forum)}}" enctype="multipart/form-data">
                    @csrf @method('DELETE')
                    <button class="btn" ><i class="fa fa-trash"></i></button>                    
                </form> --}}
                 
            </div>
            <div class="foroInfo" style="margin-top: 1rem;">
                <div class="foroIconData">
                    <i class="fa fa-calendar-alt"></i><strong>Fecha de creación:</strong> {{$foro->created ?? ' -'}}
                </div>
                <div class="foroIconData">
                    <i class="fa fa-pencil-alt"></i><strong>Última modificación:</strong> {{$foro->updated ?? ' -'}}
                </div>
                {{-- <div class="foroIconData">
                    <i class="fa fa-user"></i>{{$foro->views ?? ' -'}}
                </div> --}}
                <div class="foroIconData">
                    <i class="far fa-comment-alt"></i>{{count($foro->comments)}}  <strong>comentarios</strong>
                </div>
            </div>
        </div>
    @endforeach

</div>