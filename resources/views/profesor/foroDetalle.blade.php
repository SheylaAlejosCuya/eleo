<link rel="stylesheet" href="{{asset('css/foro.css')}}">
<div class="infomacion">
    <div class="foroPublicacion">
        <h1><strong>{{$foro->title}}</strong></h1>
        <h2>Aula asignada: <strong>{{$aula->grade->grade.' '.$aula->section->section}}</strong></h2>
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
        <div class="foroInfo">

            <div class="foroIconData">
                <i class="far fa-comment-alt"></i>{{ count($foro->comments)}} comentarios
            </div>
        </div>

        @foreach ($foro->comments as $comment)

            {{-- @if($comment->id_response_comment == null && $comment->id_response_comment == "") --}}

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

                        @if($comment->id_state == 7)
                            <h5 style="color: blue;">El comentario fue publicado</h5>
                        @elseif($comment->id_state == 8)
                            <h5 style="color: red;">El comentario fue cancelado</h5>
                        @else 
                            <div class="foroPostButtons">
                                <a class="ui green button" href="{{route('web_foro_profesor_publicar_comentario', $comment->id_comment) }}">Publicar</a>
                                <a class="ui basic negative button" href="{{route('web_foro_profesor_cancelar_comentario', $comment->id_comment) }}">Cancelar</a>
                            </div>
                        @endif

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

                        <div class="foroAnswer">
                            <div class="foroPost">
                                <img src="{{asset('images/iguanita.png')}}">    
                                <div class="foroPostRight">
                                    <textarea class="rspInput" rows="2" placeholder="Escribe tu respuesta" id="{{$comment->id_comment}}_textarea_response"></textarea>
                                    <div class="foroPostButtons">
                                        <button class="ui blue button" onclick="responderComentario({{$comment->id_comment}})">Responder</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            {{-- @endif --}}

        @endforeach

        

        

        {{-- <div class="foroPost">

            <img src="{{asset('images/chica.png')}}" alt="">    
            <div class="foroPostRight">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est perferendis voluptatem, aperiam reiciendis quod accusamus beatae minus deleniti, dolor voluptatum vel tenetur nihil fuga facilis sunt incidunt atque et dolores.</p>
                <div class="foroInfo">
                    <div class="foroIconData">
                        <i class="far fa-comment-alt"></i>25
                    </div>
                    <div class="foroIconData">
                        Responder
                    </div>
                    <div class="foroIconData">
                        Me encanta
                    </div>
                </div>

                <div class="foroAnswer">
                    <div class="foroPost">
                        <img src="{{asset('images/chico.png')}}" alt="">    
                        <div class="foroPostRight">
                            <textarea class="rspInput" rows="2" placeholder="Escribe tu respuesta"></textarea>
                            <div class="foroPostButtons">
                                <button class="saveButton">Publicar</button>
                                <button class="cancelButton">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="foroAnswer">
                    <div class="foroPost">
                        <img src="{{asset('images/chico.png')}}" alt="">    
                        <div class="foroPostRight">
                            <textarea class="rspInput" rows="2" placeholder="Escribe tu respuesta"></textarea>
                            <div class="foroPostButtons">
                                <button class="saveButton">Publicar</button>
                                <button class="cancelButton">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="foroAnswer">
                    <div class="foroPost">
                        <img src="{{asset('images/chico.png')}}" alt="">    
                        <div class="foroPostRight">
                            <textarea class="rspInput" rows="2" placeholder="Escribe tu respuesta"></textarea>
                            <div class="foroPostButtons">
                                <button class="saveButton">Publicar</button>
                                <button class="cancelButton">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="foroPost">
                    <img src="{{asset('images/chica.png')}}" alt="">    
                    <div class="foroPostRight">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est perferendis voluptatem, aperiam reiciendis quod accusamus beatae minus deleniti, dolor voluptatum vel tenetur nihil fuga facilis sunt incidunt atque et dolores.</p>
                        <div class="foroInfo">
                            <div class="foroIconData">
                                <i class="far fa-comment-alt"></i>25
                            </div>
                            <div class="foroIconData">
                                Responder
                            </div>
                            <div class="foroIconData">
                                Me encanta
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div> --}}
    </div>
</div>

@prepend('scripts')
<script>

    function responderComentario(id_comment) {


        var comentario_id = "#"+id_comment + "_textarea_response";
        var comentario = $(comentario_id).val();

        console.log(comentario);

            $.ajax({
                type: "POST",
                url: "{{route('api_foro_profesor_responder_comentario')}}",
                dataType: "json",
                data: {
                    "_token": "{{csrf_token()}}",
                    "id_comment": id_comment,
                    "id_forum": "{{$foro->id_forum}}",
                    "comment": comentario
                },
                success: function(response) {
                    showMessage("success", "Respuesta subida correctamente");
                    location.reload();
                    console.log(response); 
                },
                error: function(e) {
                    showMessage("warning", "Ha ocurrido un error");
                    console.log(e); 
                }
            });
    }

    // $("form").on("submit", function (e) {

    //     $('#button_send').prop('disabled', true);

    //     if( $("#comentario").val() == "" || $("#comentario").val() == null ){
    //         showMessage("warning", "Se debe ingresar un comentario");
    //         e.preventDefault();
    //         $('#button_send').prop('disabled', false);
    //     }

    // });

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