<link rel="stylesheet" href="{{asset('css/foro.css')}}">
<div class="infomacion">
    <div class="foroPublicacion">

        <h1><strong>{{$foro->title}}</strong></h1>

        <h1><hr></h1>

        <div class="foroTema">
            <div class="foroText">
                <div class="foroImg">
                    <div class="ui">
                        @if($foro->image != null && $foro->image != "")
                            <img class="ui big right floated image" src="{{env('AWS_S3_BASE').$foro->image}}">
                        @else
                            <img class="ui big right floated image" src="{{asset('images/no_icon.png')}}">
                        @endif
                        <p style="font-size: 20px;">{{$foro->content}}</p>
                    </div>
                </div>
             </div>
         </div>
            
            <div class="ui form">
                <form action="{{route('api_publicar_comentario_alumno', ['id_forum' => $foro->id_forum]) }}" method="POST">
                    <div class="field">
                    <label style="font-size: 18px;">Realizar un comentario</label>
                    <textarea id="comentario" name="comentario"></textarea>
                    </div>
                    <button id="button_send" class="ui big green button">Publicar</button>
                </form>
            </div>
  
        
        
         <div class="foroInfo">
            <div class="foroIconData">
                <i class="far fa-comment-alt"></i>{{ count($foro->comments)}} comentarios
            </div>
            
        </div>

        @foreach ($foro->comments as $comment)

            @if($comment->id_response_comment == null && $comment->id_response_comment == "" && $comment->id_state == 7)

                <div class="foroPost">
                    @foreach ($foro->users as $user)
                        @if($user->id_user == $comment->id_user)
                            @if($user->id_gender == '2')
                                <img src="{{asset('images/chico.png')}}" alt="Perfil">
                                @break
                            @else
                                <img src="{{asset('images/chica.png')}}" alt="Perfil">
                                @break
                            @endif
                        @endif
                    @endforeach
                    <div class="foroPostRight">
                        <textarea style="padding: 1rem;" class="rspInput" rows="2" placeholder="{{$comment->message}}" disabled></textarea>
                        {{-- @if($comment->id_state == 7)
                            <h5 style="color: blue;">El comentario fue publicado</h5>
                        @elseif($comment->id_state == 8)
                            <h5 style="color: red;">El comentario fue cancelado</h5>
                        @else 
                            <div class="foroPostButtons">
                                <a class="ui green button" href="{{route('web_foro_profesor_publicar_comentario', $comment->id_comment) }}">Publicar</a>
                                <a class="ui basic negative button" href="{{route('web_foro_profesor_cancelar_comentario', $comment->id_comment) }}">Cancelar</a>
                            </div>
                        @endif --}}
                        <div class="foroInfo">
                            <div class="foroIconData">
                                <i class="far fa-calendar-alt"></i><strong>Fecha de publicación:</strong> {{$comment->created}}
                            </div>
                        </div>

                        @foreach ($foro->comments as $comment_answer)
                            @if($comment_answer->id_response_comment == $comment->id_comment) 
                                <div class="foroAnswer">
                                    <div class="foroPost">
                                        <img src="{{asset('images/iguanita.png')}}" alt="Perfil">    
                                        <div class="foroPostRight">
                                            <textarea class="rspInput" rows="2" placeholder="{{$comment_answer->message}}" disabled></textarea>
                                            <div class="foroInfo">
                                                <div class="foroIconData">
                                                    <i class="far fa-calendar-alt"></i><strong>Fecha de publicación:</strong> {{$comment->created}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>

                </div>
          
                
            @endif   
                    
                
        @endforeach


        <h1><hr></h1>

        <div>
            
                <div class="field">
                <label style="font-size: 18px;">Comentarios en espera de aprobación</label>
    
                @foreach ($foro->comments as $comment)

            @if($comment->id_response_comment == null && $comment->id_response_comment == "" && $comment->id_state == 9 && $comment->id_user == $alumno->id_user)

                <div class="foroPost">
                    @foreach ($foro->users as $user)
                        @if($user->id_user == $comment->id_user)
                            @if($user->id_gender == '2')
                                <img src="{{asset('images/chico.png')}}" alt="Perfil">
                                @break
                            @else
                                <img src="{{asset('images/chica.png')}}" alt="Perfil">
                                @break
                            @endif
                        @endif
                    @endforeach
                    <div class="foroPostRight">
                        <textarea style="padding: 1rem;" class="rspInput" rows="2" placeholder="{{$comment->message}}" disabled></textarea>
                        {{-- @if($comment->id_state == 7)
                            <h5 style="color: blue;">El comentario fue publicado</h5>
                        @elseif($comment->id_state == 8)
                            <h5 style="color: red;">El comentario fue cancelado</h5>
                        @else 
                            <div class="foroPostButtons">
                                <a class="ui green button" href="{{route('web_foro_profesor_publicar_comentario', $comment->id_comment) }}">Publicar</a>
                                <a class="ui basic negative button" href="{{route('web_foro_profesor_cancelar_comentario', $comment->id_comment) }}">Cancelar</a>
                            </div>
                        @endif --}}
                        <div class="foroInfo">
                            <div class="foroIconData">
                                <i class="far fa-calendar-alt"></i><strong>Fecha de publicación:</strong> {{$comment->created}}
                            </div>
                        </div>

                        @foreach ($foro->comments as $comment_answer)
                            @if($comment_answer->id_response_comment == $comment->id_comment) 
                                <div class="foroAnswer">
                                    <div class="foroPost">
                                        <img src="{{asset('images/iguanita.png')}}" alt="Perfil">    
                                        <div class="foroPostRight">
                                            <textarea class="rspInput" rows="2" placeholder="{{$comment_answer->message}}" disabled></textarea>
                                            <div class="foroInfo">
                                                <div class="foroIconData">
                                                    <i class="far fa-calendar-alt"></i><strong>Fecha de publicación:</strong> {{$comment->created}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>

                </div>
          
                
            @endif   
                    
                
        @endforeach

            
        </div>


    </div>
</div>

@prepend('scripts')
<script>

    $("form").on("submit", function (e) {

        $('#button_send').prop('disabled', true);

        if( $("#comentario").val() == "" || $("#comentario").val() == null ){
            showMessage("warning", "Se debe ingresar un comentario");
            e.preventDefault();
            $('#button_send').prop('disabled', false);
        }

    });

    function showMessage(type, message) {
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "timeOut": "2000",
            "extendedTimeOut": "2000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr[type](message);
    }
</script>
@endprepend