<link rel="stylesheet" href="{{asset('css/foro.css')}}">

<div class="infomacion" style="margin-top: 1rem;">

    <h2 style="color: gray">Número de foros activos: <i class="foroTitle"><strong>{{count($foros)}}</strong></i></h2>
    
    @foreach($foros as $key => $foro)

        <div class="foro">

            <h1 class="foroTitle"><strong>{{$foro->title}}</strong></h1>

            <div class="foroContent">

              <a class="ui big green button" href="{{route('web_foro', $foro->id_forum)}}">Revisar Foro</a>

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