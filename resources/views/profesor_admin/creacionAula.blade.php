<link rel="stylesheet" href="{{asset('/css/foro.css')}}">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="{{asset('/css/bootstrap-dropdown.min.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" href="{{asset('/css/bootstrap_tables_utility_responsive.min.css')}}">
<!-- CSS - ALERT -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

<div class="infomacion">
    <h1>Creación de Aulas</h1>

    <h2>Registrar nuevo</h2>

    <div class="ui two column centered grid">
        <div class="column">
            <form action="{{route('api_crear_aula')}}" method="POST">
                @csrf
                <select class="selectpicker input_select_custom_normal" id="level" name='level' title="Seleccionar nivel" data-width="100%">
                    @foreach($niveles as $key => $nivel)
                        <option value="{{$nivel->id_level}}">{{$nivel->level}}</option>
                    @endforeach
                </select>
                <br>
                <br>
                <select class="selectpicker input_select_custom_normal" id="grade" name='grade' title="Seleccionar grado" data-width="100%">
                    @foreach($grados as $key => $grado)
                        <option value="{{$grado->id_grade}}">{{$grado->grade}}</option>
                    @endforeach
                </select>
                <br>
                <br>
                <select class="selectpicker input_select_custom_normal" id="section" name='section' title="Seleccionar sección" data-width="100%">
                    @foreach($secciones as $key => $seccion)
                        <option value="{{$seccion->id_section}}">{{$seccion->section}}</option>
                    @endforeach
                </select>
                <br>
                <hr>
                <button type="submit"  class="big blue fluid ui button">Registrar</button>

            </form>
        </div>
    </div>

    <h2>Listado</h2>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Nivel</th>
            <th scope="col">Grado</th>
            <th scope="col">Sección</th>
            <th scope="col">Profesor encargado</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($aulas as $key => $aula)
            <tr>
                <th scope="row">{{ (int) $key + 1 }}</th>
                <td>{{$aula->level->level}}</td>
                <td>{{$aula->grade->grade}}</td>
                <td>{{$aula->section->section}}</td>
                @if($aula->id_teacher != 0 || $aula->id_teacher != null || $aula->id_teacher != "")
                    <td>{{$aula->teacher->first_name}} {{$aula->teacher->last_name}}</td>
                @else
                    <td>Sin profesor asignado</td>
                @endif
                
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

    @if (session('status_success'))
    <script>
        showMessage("success", "Aula creada correctamente");

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
    @endif

    @if (session('status_error'))
    <script>
        showMessage("danger", "Ha ocurrido un problema al crear el aula");

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
    @endif

    @if (session('status_warning'))
    <script>
        showMessage("warning", "El aula ya existe");

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
    @endif

    @if (session('status_alert'))
    <script>
        showMessage("warning", "Aula no permitida");

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
    @endif


@endprepend