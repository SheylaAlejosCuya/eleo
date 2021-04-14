<link rel="stylesheet" href="{{asset('/css/foro.css')}}">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="{{asset('/css/bootstrap-dropdown.min.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" href="{{asset('/css/bootstrap_tables_utility_responsive.min.css')}}">
<!-- CSS - ALERT -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

<div class="infomacion">
    <h1>Creación de Profesores</h1>

    <h2>Registrar nuevo</h2>

    <div class="ui two column centered grid">
        <div class="column">
            <form action="{{route('api_crear_profesor')}}" method="POST">
                @csrf
                <div class="ui fluid large input">
                    <input type="text" placeholder="Ingresar nombres" name="first_name" required>
                </div>
                <br>
                <div class="ui fluid large input">
                    <input type="text" placeholder="Ingresar apellidos" name="last_name" required>
                </div>
                <br>
                <div class="ui fluid large input">
                    <input type="text|number" placeholder="Ingresar nro. de DNI" name="dni" required>
                </div>
                <br>
                <div class="ui fluid large input">
                    <input type="text" placeholder="Ingresar correo electrónico" name="email" required>
                </div>
                <br>
                <select class="selectpicker input_select_custom_normal" id="gender" name='gender' title="Seleccionar género" data-width="100%">
                    @foreach($genders as $key => $gender)
                        <option value="{{$gender->id_gender}}">{{$gender->gender}}</option>
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
            <th scope="col">Profesor</th>
            <th scope="col">DNI</th>
            <th scope="col">Correo</th>
            <th scope="col">Usuario</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($profesores as $key => $profesor)
            <tr>
                <th scope="row">{{ (int) $key + 1 }}</th>
                <td>{{$profesor->last_name}} {{$profesor->first_name}}</td>
                <td>{{$profesor->dni}}</td>
                <td>{{$profesor->email}}</td>
                <td>{{$profesor->username}}</td>
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
        showMessage("success", "Profesor creado correctamente");

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
        showMessage("danger", "Ha ocurrido un problema al registrar al profesor");

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