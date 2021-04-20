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
                <img class="ui xlarge centered rounded image" src="https://eleofiles.s3.us-east-2.amazonaws.com/rubricas/Rubrica_5_Secundaria_Escrito.png">
                <h2>Calificación - Producción Escrita</h2>
                <div class="ui segment">
                    <div class="ui two column very relaxed grid">
                        <div class="column">
                            <h2>Adecuación al tipo textual</h2>
                        </div>
                        <div class="column">
                            <select class="selectpicker" id="rubrica_1" name='rubrica_1' title="Seleccionar valor" data-width="100%">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>

                    </div>
                    <div class="ui divider"></div>
                    <div class="ui two column very relaxed grid">
                        <div class="column">
                            <h2>Adecuación al tema y registro</h2>
                        </div>
                        <div class="column">
                        <select class="selectpicker" id="rubrica_2" name='rubrica_2' title="Seleccionar valor" data-width="100%">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                        </div>
                        
                    </div>
                    <div class="ui divider"></div>
                    <div class="ui two column very relaxed grid">
                        <div class="column">
                            <h2>Cohesión textual</h2>
                        </div>
                        <div class="column">
                        <select class="selectpicker" id="rubrica_3" name='rubrica_3' title="Seleccionar valor" data-width="100%">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                        </div>
                        
                    </div>
                    <div class="ui divider"></div>
                    <div class="ui two column very relaxed grid">
                        <div class="column">
                            <h2>Puntuación y ortografía</h2>
                        </div>
                        <div class="column">
                        <select class="selectpicker" id="rubrica_4" name='rubrica_4' title="Seleccionar valor" data-width="100%">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                        </div>
                        
                    </div>
                    <div class="ui divider"></div>
                    <div class="ui two column very relaxed grid">
                        <div class="column">
                            <h2>Adecuación al tipo textual</h2>
                        </div>
                        <div class="column">
                        <select class="selectpicker" id="rubrica_5" name='rubrica_5' title="Seleccionar valor" data-width="100%">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                        </div>
                        
                    </div>
                    <div class="ui divider"></div>
                    <button class="fluid ui button primary large">Guardar Calificación</button>
                </div>
              </div>
              <div class="ui bottom attached tab segment" data-tab="second">
                <img class="ui xlarge centered rounded image" src="https://eleofiles.s3.us-east-2.amazonaws.com/rubricas/Rubrica_5_Secundaria_Oral.png">
                <h2>Calificación - Expresión Oral</h2>
                <div class="ui segment">
                    <div class="ui two column very relaxed grid">
                        <div class="column">
                            <h2>Adecuación a la situación comunicativa</h2>
                        </div>
                        <div class="column">
                            <select class="selectpicker" id="rubrica_6" name='rubrica_6' title="Seleccionar valor" data-width="100%">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>

                    </div>
                    <div class="ui divider"></div>
                    <div class="ui two column very relaxed grid">
                        <div class="column">
                            <h2>Coherencia textual</h2>
                        </div>
                        <div class="column">
                        <select class="selectpicker" id="rubrica_7" name='rubrica_7' title="Seleccionar valor" data-width="100%">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                        </div>
                        
                    </div>
                    <div class="ui divider"></div>
                    <div class="ui two column very relaxed grid">
                        <div class="column">
                            <h2>Cohesión textual</h2>
                        </div>
                        <div class="column">
                        <select class="selectpicker" id="rubrica_8" name='rubrica_8' title="Seleccionar valor" data-width="100%">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                        </div>
                        
                    </div>
                    <div class="ui divider"></div>
                    <div class="ui two column very relaxed grid">
                        <div class="column">
                            <h2>Uso de vocabulario</h2>
                        </div>
                        <div class="column">
                        <select class="selectpicker" id="rubrica_9" name='rubrica_9' title="Seleccionar valor" data-width="100%">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                        </div>
                        
                    </div>
                    <div class="ui divider"></div>
                    <div class="ui two column very relaxed grid">
                        <div class="column">
                            <h2>Uso de recursos no verbales y paraverbales</h2>
                        </div>
                        <div class="column">
                        <select class="selectpicker" id="rubrica_10" name='rubrica_10' title="Seleccionar valor" data-width="100%">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                        </div>
                        
                    </div>
                    <div class="ui divider"></div>
                    <button class="fluid ui button primary large" onclick="calificar_expr_oral()">Guardar Calificación</button>
                </div>
              </div>


                <br>
                <button class="saveButton" style="width: auto">Descargar archivo</button>
        </div>

        <div class="reporteSection">
            <x-result-progress-bar title="Puntaje" :results="$alumnoResults" />
        </div>
    </div>
</div>

@prepend('scripts')

<!-- Latest compiled and minified JavaScript -->
<script src="{{asset('/js/bootstrap-dropdown.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<script>
    $('.menu .item').tab();


	function calificar_prod_escrita(){

	}

	function calificar_expr_oral() {

		if($('#rubrica_6').val() == null || $('#rubrica_6').val() == "") {
			showMessage("warning", "Puntaje sin completar");
            return;
        }

		if($('#rubrica_7').val() == null || $('#rubrica_7').val() == "") {
			showMessage("warning", "Puntaje sin completar");
            return;
        }

		if($('#rubrica_8').val() == null || $('#rubrica_8').val() == "") {
			showMessage("warning", "Puntaje sin completar");
            return;
        }

		if($('#rubrica_9').val() == null || $('#rubrica_9').val() == "") {
			showMessage("warning", "Puntaje sin completar");
            return;
        }

		if($('#rubrica_10').val() == null || $('#rubrica_10').val() == "") {
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
                    "id_user": "{{}}",
                    "rubrica_6": $('#rubrica_6').val(),
					"rubrica_7": $('#rubrica_7').val(),
					"rubrica_8": $('#rubrica_8').val(),
					"rubrica_9": $('#rubrica_9').val(),
					"rubrica_10": $('#rubrica_10').val(),
                },
                success: function(response) { 
                    console.log(response);
                    alertify.success('Calificación realizada');
                },
                error: function(e) {
                        console.log(e); 
                }
            });    
        }, function() { 
            //current_select.val(0).change();
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
