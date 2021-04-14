<link rel="stylesheet" href="{{asset('/css/foro.css')}}">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="{{asset('/css/bootstrap-dropdown.min.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" href="{{asset('/css/bootstrap_tables_utility_responsive.min.css')}}">
<!-- CSS - ALERT -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

<div class="infomacion">
    <h1>Asignación de Profesores</h1>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Nivel</th>
            <th scope="col">Aula</th>
            <th scope="col">Profesor encargado</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($aulas as $key => $aula)
            <tr>
                <th scope="row">{{ (int) $key + 1 }}</th>
                <td>{{$aula->level->level}}</td>
                <td>{{$aula->grade->grade}} {{$aula->section->section}}</td>

                <td>
                    <select id={{"select_".$key}} class="selectpicker" title="Sin profesor asignado" data-id-aula='{{$aula->id_classroom}}'>
                        @foreach($profesores as $key_s => $profesor)
                            <option value="{{ $profesor->id_user }}" {{$profesor->id_user == $aula->id_teacher ? 'selected' : ''}}>{{$profesor->first_name.' '.$profesor->last_name}}</option>
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

            alertify.confirm('Sección del profesor', '¿Actualizar encargado?', function() { 
                $.ajax({
                    type: "POST",
                    url: "{{route('api_actualizar_seccion_profesor')}}",
                    dataType: "json",
                    data: {
                        "_token": "{{csrf_token()}}",
                        "id_aula": current_select.data('id-aula'),
                        "id_profesor": current_select.val()
                    },
                    success: function(response) { 
                        console.log(response);
                        alertify.success('Encargado actualizado');
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