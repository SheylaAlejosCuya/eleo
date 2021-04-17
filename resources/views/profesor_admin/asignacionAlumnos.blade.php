<link rel="stylesheet" href="{{asset('/css/foro.css')}}">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="{{asset('/css/bootstrap-dropdown.min.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" href="{{asset('/css/bootstrap_tables_utility_responsive.min.css')}}">
<!-- CSS - ALERT -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

<div class="infomacion">
    <h1>Asignación de alumnos</h1>

    {{-- <h3>Nivel</h3> --}}

    {{-- @foreach($niveles as $key_n => $nivel)
        <h3>{{$nivel->id_level}}{{$nivel->level}}</h3>
        @foreach($nivel->grados as $key_g => $grado)
            <h4>{{$grado->grade}}</h4> 

            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Alumno</th>
                    <th scope="col">Sección</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($grado->alumnos as $key_a => $alumno)
                        <tr>
                            <th scope="row">{{ (int) $key_a + 1 }}</th>
                            <td>{{$alumno->last_name}} {{$alumno->first_name}}</td>
                            <td>
                                <select id={{"select_".$key_n."_".$key_g."_".$key_a}} class="selectpicker" title="Sin sección asignada" data-id-alumno='{{$alumno->id_user}}' data-original-value='{{$alumno->id_section}}'>
                                    @foreach($secciones as $key_s => $seccion)
                                        <option value="{{ $key_s + 1 }}" {{($key_s + 1) == $alumno->id_section ? 'selected' : ''}}>{{$seccion->section}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            
        @endforeach
    @endforeach --}}


    
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Alumno</th>
                <th scope="col">Nivel</th>
                <th scope="col">Grado</th>
                <th scope="col">Sección</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($alumnos as $key => $alumno)
                <tr>
                    <th scope="row">{{ (int) $key + 1 }}</th>
                    <td>{{$alumno->last_name}} {{$alumno->first_name}}</td>
                    <td>{{$alumno->level->level}}</td>
                    <td>{{$alumno->grade->grade}}</td>
                    <td>
                        <select id={{"select_".$key}} class="selectpicker" title="Sin sección asignada" data-id-alumno='{{$alumno->id_user}}' data-original-value='{{$alumno->id_section}}'>
                    
                            {{-- @foreach($aulas as $key_s => $aula)
                                <option value="{{ $key_s + 1 }}" {{($key_s + 1) == $alumno->id_section ? 'selected' : ''}}>{{$seccion->section}}</option>
                            @endforeach --}}
                            @foreach($aulas as $key_s => $aula)
                                @if( (int) $aula->id_grade == (int) $alumno->id_grade && (int) $aula->id_level == (int) $alumno->id_level)
                                    <option value="{{$aula->id_classroom}}" {{$aula->id_classroom == $alumno->id_classroom ? 'selected' : ''}}>{{$aula->grade->grade.' '.$aula->section->section}}</option>
                                @endif
                            @endforeach
                        </select>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    

    

</div>

@prepend('scripts')
    <!-- Latest compiled and minified JavaScript -->
    <script src="{{asset('/js/bootstrap-dropdown.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <!-- JavaScript - ALERT -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>  

    <script>

        $("select").change(function() {

            var current_select = $(this);

            alertify.confirm('Sección del alumno', '¿Actualizar sección?', function() { 
                $.ajax({
                    type: "POST",
                    url: "{{route('api_actualizar_seccion_alumno')}}",
                    dataType: "json",
                    data: {
                        "_token": "{{csrf_token()}}",
                        "id_alumno": current_select.data('id-alumno'),
                        "id_classroom": current_select.val()
                    },
                    success: function(response) { 
                        console.log(response);
                        alertify.success('Sección del alumno actualizada');
                    },
                    error: function(e) {
                        console.log(e); 
                    }
                });    

            }, function() { 

                current_select.val(current_select.data('original-value')).change();

            }).set('closable', false).set('labels', {ok:'Aceptar', cancel:'Cancelar'});
        });

    </script>


@endprepend