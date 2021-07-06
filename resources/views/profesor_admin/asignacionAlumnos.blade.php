<link rel="stylesheet" href="{{asset('/css/foro.css')}}">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="{{asset('/css/bootstrap-dropdown.min.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" href="{{asset('/css/bootstrap_tables_utility_responsive.min.css')}}">
<!-- CSS - ALERT -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/se/dt-1.10.25/datatables.min.css"/>
 

<div class="infomacion">
    <h1>Asignación de alumnos</h1>
        <table class="table table-bordered display" id="table_asignacion">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Alumno</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Nivel</th>
                    <th scope="col">Grado</th>
                    <th scope="col">Sección</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumnos as $key => $alumno)
                <tr>
                    <th scope="row">{{ (int) $key + 1 }}</th>
                    <td>{{$alumno->last_name}} {{$alumno->first_name}}</td>
                    <td>{{$alumno->dni}}</td>
                    <td>{{$alumno->level->level}}</td>
                    <td>{{$alumno->grade->grade}}</td>
                    @if($alumno->section != "" || $alumno->section != null)
                        <td>{{$alumno->section->section}}</td>
                    @else
                        <td>Sin sección</td>
                    @endif
                    <td>
                        <button class="ui big blue inverted fluid button" onclick="openModal('{{$alumno->id_level}}', '{{$alumno->id_user}}', '{{$alumno->id_section}}')">Editar sección</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

</div>

<input type="text" id="id_user_currently" value="">

<div class="ui small modal" id="nivel1" tabindex="-1" aria-hidden="true">
    <div class="header">Asignar sección - Primaria</div>
    <div class="content">
        <div class="ui segment" style="font-family: 'Merienda', cursive; font-size: larger;">
            <select id="select_primaria" class="selectpicker" data-width="100%" title="Seleccionar...">
                @foreach($aulas_primaria as $key_s => $aula_primaria)                   
                    <option value="{{$aula_primaria->id_classroom}}">{{$aula_primaria->grade->grade.' '.$aula_primaria->section->section}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="ui small modal" id="nivel2" tabindex="-1" aria-hidden="true">
    <div class="header">Asignar sección - Secundaria</div>
    <div class="content">
        <div class="ui segment" style="font-family: 'Merienda', cursive; font-size: larger;">
            <select id="select_secundaria"  class="selectpicker" data-width="100%" title="Seleccionar...">
                @foreach($aulas_secundaria as $key_s => $aula_secundaria)
                    <option value="{{$aula_secundaria->id_classroom}}">{{$aula_secundaria->grade->grade.' '.$aula_secundaria->section->section}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

@prepend('scripts')
    <!-- Latest compiled and minified JavaScript -->
    <script src="{{asset('/js/bootstrap-dropdown.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <!-- JavaScript - ALERT -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script type="text/javascript" src="{{asset('/js/datatables.js')}}"></script>

    <script>
        function openModal(data, id_user, id_section) {
            $('.ui.modal#nivel' + data).modal('show');
            if(parseInt(data) == 1) {
                $('#id_user_currently').val(id_user);
                //$('#id_section_primaria').val(id_section);
            } else {
                $('#id_user_currently').val(id_user);
                //$('#id_section_secundaria').val('show');
            }
            
        }
    </script>
   
    <script>

        $('#table_asignacion').DataTable();


        $("select").change(function() {

            var current_select = $(this);

            alertify.confirm('Sección del alumno', '¿Actualizar alumno?', function() { 

                $.ajax({
                    type: "POST",
                    url: "{{route('api_actualizar_seccion_alumno')}}",
                    dataType: "json",
                    data: {
                        "_token": "{{csrf_token()}}",
                        "id_alumno": $('#id_user_currently').val(),
                        "id_classroom": current_select.val()
                    },
                    success: function(response) { 
                        //console.log(response);
                        //alertify.success('Sección del alumno actualizada');
                        current_select.val(null).change();
                        location.reload();
                    },
                    error: function(e) {
                        console.log(e); 
                        current_select.val(null).change();
                    }
                });
                
                // current_select.val(current_select.data('original-value')).change();
            }, function() { 
                //alert(current_select.data('original-value'));
                //current_select.selectpicker('refresh');
                current_select.val(null).change();

            }).set('closable', true).set('labels', {ok:'Aceptar', cancel:'Cancelar'});
        });

    </script>


@endprepend