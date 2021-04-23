<link rel="stylesheet" href="{{asset('css/aulas.css')}}">
<link rel="stylesheet" href="{{asset('/css/bootstrap-dropdown.min.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<!-- CSS - ALERT -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

<div class="infomacion">
    <h4>{{$subtitle}}</h4>
    <div class="reporteAlumno">
        <div class="reporteSection">
            <h1>Rúbricas de Calificación</h1>

            <div class="ui top attached tabular menu">
                <a class="item active" data-tab="first">Producción Escrita</a>
                <a class="item" data-tab="second">Expresión Oral</a>
            </div>
            <div class="ui bottom attached tab segment active" data-tab="first">
                <img class="ui xlarge centered rounded image" src="{{$rubricas[0]->rubric}}">
                <h2>Calificación - Producción Escrita</h2>
                <div class="ui segment">
                    @foreach ($criterios_escritos as $key_c => $criterio_escrito)
                        <div class="ui two column very relaxed grid">
                            <div class="column">
                                <h2>{{$criterio_escrito->criteria->criterion}}</h2>
                            </div>
                            <div class="column">
                                <select class="selectpicker" id="{{'rubrica_e_'.$key_c}}" name='{{'rubrica_e_'.$key_c}}' title="Seleccionar valor" data-width="100%" @if(isset($puntuaciones_escritos)) disabled @endif>
                                    <option value="0" @if(isset($puntuaciones_escritos)) @if((int) $puntuaciones_escritos[$key_c]->score == 0) selected @endif @endif>0</option>
                                    <option value="1" @if(isset($puntuaciones_escritos)) @if((int) $puntuaciones_escritos[$key_c]->score == 1) selected @endif @endif>1</option>
                                    <option value="2" @if(isset($puntuaciones_escritos)) @if((int) $puntuaciones_escritos[$key_c]->score == 2) selected @endif @endif>2</option>
                                </select>
                            </div>
                        </div>
                        <div class="ui divider"></div>
                    @endforeach
                    <button class="fluid ui button primary large" onclick="calificar_prod_escrita()" id="button_guardar_p_escrita" @if(isset($puntuaciones_escritos)) disabled @endif>Guardar Calificación</button>
                </div>
              </div>
            <div class="ui bottom attached tab segment" data-tab="second">
                <img class="ui xlarge centered rounded image" src="{{$rubricas[1]->rubric}}">
                <h2>Calificación - Expresión Oral</h2>
                <div class="ui segment">
                    @foreach ($criterios_orales as $key_c => $criterio_oral)
                        <div class="ui two column very relaxed grid">
                            <div class="column">
                                <h2>{{$criterio_oral->criteria->criterion}}</h2>
                            </div>
                            <div class="column">
                                <select class="selectpicker" id="{{'rubrica_o_'.$key_c}}" name='{{'rubrica_o_'.$key_c}}' title="Seleccionar valor" data-width="100%" @if(isset($puntuaciones_orales)) disabled @endif>
                                    <option value="0" @if(isset($puntuaciones_orales)) @if((int) $puntuaciones_orales[$key_c]->score == 0) selected @endif @endif>0</option>
                                    <option value="1" @if(isset($puntuaciones_orales)) @if((int) $puntuaciones_orales[$key_c]->score == 1) selected @endif @endif>1</option>
                                    <option value="2" @if(isset($puntuaciones_orales)) @if((int) $puntuaciones_orales[$key_c]->score == 2) selected @endif @endif>2</option>
                                </select>
                            </div>
                        </div>
                        <div class="ui divider"></div>
                    @endforeach
                    <button class="fluid ui button primary large" onclick="calificar_expr_oral()" id="button_guardar_e_oral" @if(isset($puntuaciones_orales)) disabled @endif>Guardar Calificación</button>
                </div>
            </div>
            </br>

            @if(isset($respuesta_final))
                <a class="big ui button green large" style="width: auto" href="{{route('api_descargar_archivo_alumno', ['id_respuesta_final' => $respuesta_final->id_results])}}">Descargar archivo</a>
            @else
                <button class="big ui button green large" disabled>Sin archivo que descargar</a>
            @endif

        </div>

        {{-- <div class="reporteSection">
            <x-result-progress-bar title="Puntaje" :results="$alumnoResults" />
        </div> --}}
    </div>
</div>

@prepend('scripts')

<!-- Latest compiled and minified JavaScript -->
<script src="{{asset('/js/bootstrap-dropdown.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<script>
    $('.menu .item').tab();

	function descargar_archivo() {
    }

	function calificar_prod_escrita() {

        if( $('#rubrica_e_0').val() == null || $('#rubrica_e_0').val() == "" || 
            $('#rubrica_e_1').val() == null || $('#rubrica_e_1').val() == "" || 
            $('#rubrica_e_2').val() == null || $('#rubrica_e_2').val() == "" || 
            $('#rubrica_e_3').val() == null || $('#rubrica_e_3').val() == "" || 
            $('#rubrica_e_4').val() == null || $('#rubrica_e_4').val() == "") {
			showMessage("warning", "Puntaje sin completar");
            return;
        }
        
        alertify.confirm('Rubrica', '¿Calificar alumno?', function() { 
            $.ajax({
                type: "POST",
                url: "{{route('api_calificar_prod_escrita')}}",
                dataType: "json",
                data: {
                    "_token": "{{csrf_token()}}",
                    "id_user": "{{$alumno->id_user}}",
					"id_rubric": "{{$rubricas[0]->id_rubric}}",
					"id_reading": "{{$id_reading}}",
                    "rubrica_e_0": $('#rubrica_e_0').val(),
					"rubrica_e_1": $('#rubrica_e_1').val(),
					"rubrica_e_2": $('#rubrica_e_2').val(),
					"rubrica_e_3": $('#rubrica_e_3').val(),
					"rubrica_e_4": $('#rubrica_e_4').val()
                },
                success: function(response) { 
                    console.log(response);
                    alertify.success('Calificación realizada');
                    $('#rubrica_e_0').prop('disabled', true);
                    $('#rubrica_e_0').selectpicker('refresh');
                    $('#rubrica_e_1').prop('disabled', true);
                    $('#rubrica_e_1').selectpicker('refresh');
                    $('#rubrica_e_2').prop('disabled', true);
                    $('#rubrica_e_2').selectpicker('refresh');
                    $('#rubrica_e_3').prop('disabled', true);
                    $('#rubrica_e_3').selectpicker('refresh');
                    $('#rubrica_e_4').prop('disabled', true);
                    $('#rubrica_e_4').selectpicker('refresh');
                    $('#button_guardar_p_escrita').prop('disabled', true);
                },
                error: function(e) {
                        console.log(e); 
                }
            });    
        }, function() { 
        }).set('closable', false).set('labels', {ok:'Aceptar', cancel:'Cancelar'});

	}

	function calificar_expr_oral() {

		if( $('#rubrica_o_0').val() == null || $('#rubrica_o_0').val() == "" ||
            $('#rubrica_o_1').val() == null || $('#rubrica_o_1').val() == "" ||
            $('#rubrica_o_2').val() == null || $('#rubrica_o_2').val() == "" ||
            $('#rubrica_o_3').val() == null || $('#rubrica_o_3').val() == "" ||
            $('#rubrica_o_4').val() == null || $('#rubrica_o_4').val() == "" ) {
			showMessage("warning", "Puntaje sin completar");
            return;
        }

        alertify.confirm('Rubrica', '¿Calificar alumno?', function() { 
            $.ajax({
                type: "POST",
                url: "{{route('api_calificar_exp_oral')}}",
                dataType: "json",
                data: {
                    "_token": "{{csrf_token()}}",
                    "id_user": "{{$alumno->id_user}}",
					"id_rubric": "{{$rubricas[1]->id_rubric}}",
					"id_reading": "{{$id_reading}}",
					"rubrica_o_0": $('#rubrica_o_0').val(),
					"rubrica_o_1": $('#rubrica_o_1').val(),
					"rubrica_o_2": $('#rubrica_o_2').val(),
					"rubrica_o_3": $('#rubrica_o_3').val(),
					"rubrica_o_4": $('#rubrica_o_4').val(),
                },
                success: function(response) { 
                    console.log(response);
                    alertify.success('Calificación realizada');
                    $('#rubrica_o_0').prop('disabled', true);
                    $('#rubrica_o_0').selectpicker('refresh');
                    $('#rubrica_o_1').prop('disabled', true);
                    $('#rubrica_o_1').selectpicker('refresh');
                    $('#rubrica_o_2').prop('disabled', true);
                    $('#rubrica_o_2').selectpicker('refresh');
                    $('#rubrica_o_3').prop('disabled', true);
                    $('#rubrica_o_3').selectpicker('refresh');
                    $('#rubrica_o_4').prop('disabled', true);
                    $('#rubrica_o_4').selectpicker('refresh');
                    $('#button_guardar_e_oral').prop('disabled', true);
                },
                error: function(e) {
                        console.log(e); 
                }
            });    
        }, function() { 
        }).set('closable', false).set('labels', {ok:'Aceptar', cancel:'Cancelar'});

	}

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
