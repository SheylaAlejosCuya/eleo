<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <title>e-Leo</title>
        <link rel="icon" href="{{asset('images/logo_mini.png')}}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
            html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>
        <link href="{{asset('/plugins/toastr/toastr.min.css')}}" rel="stylesheet">
       <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="{{asset('/css/bootstrap-dropdown.min.css')}}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
        <style type="text/css">
            body {
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
   
                /* Aquí el origen de la imagen */

                background-image: url(images/fondologin.jpg);

                /* Fijar la imagen de fondo este vertical y
                horizontalmente y centrado */
                background-position: center center;

                /* Esta imagen no debe de repetirse */
                background-repeat: no-repeat;

                /* COn esta regla fijamos la imagen en la pantalla. */
                background-attachment: fixed;

                /* La imagen ocupa el 100% y se reescala */
                background-size: cover;

                /* Damos un color de fondo mientras la imagen está cargando  */
                background-color: #464646;

                color: rgba(0, 0, 0, 0.5);
            }
        </style>
    </head>

    <body class="antialiased">
        <section class="container-fluid" >
            
            <div class="row text-center" >
                <div class="col">
                </div>
                <div class="col-lg-4" style="background: white; height: 900px;  align-items: center;display: flex; justify-content: center;">
                    <form id="formRegister" method="POST" action="{{route('api_register')}}" style="background: white; width: 320px;">
                        {{ csrf_field() }}
                        <a href="/"><img src="images/logo.png" style="width: 262px; padding: 16px 0" alt=""></a> 
                        <p style="color: black;  font-size: 28px; line-height: 0.5em; padding-top: 10%;">Registro de usuarios</p>
                        <br>
                        <input type="text" name='code' id='code' placeholder="Ingresar código de validación" style="margin-top: 8%;padding-left: 15px;  border: none; border-bottom: 0.5px solid rgb(4, 135, 58); width: 100%;" required>
                        <br>
                        <br>
                        <hr>
                        <input type="email" name='email' id='email' placeholder="Ingresar correo electrónico" style="margin-top: 0%;padding-left: 15px;  border: none; border-bottom: 0.5px solid rgb(131, 123, 123); width: 100%;" required>
                        <br>
                        <input type="password" name='password' id='password' placeholder="Ingresar contraseña" style="margin-top: 8%;padding-left: 15px;  border: none; border-bottom: 0.5px solid rgb(131, 123, 123); width: 100%;" required>
                        <br>
                        <input type="password" name='confirm_password' id='confirm_password' placeholder="Confirmar contraseña" style="margin-top: 8%; padding-left: 15px;  border: none; border-bottom: 0.5px solid rgb(131, 123, 123); width: 100%;" required>
                        <br>
                        <br>
                        <hr>
                        <input type="text" name='names' id='names' placeholder="Ingresar nombres" style="margin-top: 0%;padding-left: 15px;  border: none; border-bottom: 0.5px solid rgb(131, 123, 123); width: 100%;" required>
                        <br>
                        <input type="text" name='lastnames' id='lastnames' placeholder="Ingresar apellidos" style="margin-top: 8%;padding-left: 15px;  border: none; border-bottom: 0.5px solid rgb(131, 123, 123); width: 100%;" required>
                        <br>
                        <br>
                        <select id="gender" name='gender' class="selectpicker" title="Seleccionar género" data-width="100%">
                            @foreach($genders as $key => $gender)
                                <option value="{{$gender->id_gender}}">{{$gender->gender}}</option>
                            @endforeach
                        </select>
                        <br>
                        <hr>
                        <select id="school" name='school' class="selectpicker" title="Seleccionar institución educativa" data-width="100%">
                            @foreach($schools as $key => $school)
                                <option value="{{$school->id_school}}">{{$school->name}}</option>
                            @endforeach
                        </select>
                        <br>
                        <br>
                        <br>
                        <input type="button" id="button_login" onclick="verificar()" style="background: #8DC63F; border-radius: 10px; padding: 2%; width: 300px; color: white;" value="Registrar"/>
                    </form>
                </div>
            </div>
        </section>

        <script src="{{asset('/plugins/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
        <script src="{{asset('/js/bootstrap-dropdown.min.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
        
        <script>

            function verificar() {

                if($('#code').val() == null || $('#code').val() == "") {
                    showMessage("warning", "Se debe ingresar un código");
                    return;
                }

                if($('#email').val() == null || $('#names').val() == "") {
                    showMessage("warning", "Se debe ingresar un nombre");
                    return;
                }

                if($('#lastnames').val() == null || $('#lastnames').val() == "") {
                    showMessage("warning", "Se debe ingresar un apellido");
                    return;
                }

                if($('#gender').val() == null || $('#gender').val() == "") {
                    showMessage("warning", "Se debe seleccionar un género");
                    return;
                }

                if($('#school').val() == null || $('#school').val() == "") {
                    showMessage("warning", "Se debe seleccionar una institución educativa");
                    return;
                }

                if($('#password').val() == null || $('#password').val() == "") {
                    showMessage("warning", "Se debe ingresar una contraseña");
                    return;
                }

                if($('#confirm_password').val() == null || $('#confirm_password').val() == "") {
                    showMessage("warning", "Se debe confirmar la contraseña");
                    return;
                }

                if($('#confirm_password').val() != $('#password').val()) {
                    showMessage("error", "Las contraseñas no coinciden");
                    return;
                }

                $.ajax({
                    url  : "{{route('api_check_code')}}",
                    type : "POST",
                    data : {
                        "_token": "{{ csrf_token() }}",
                        "code"  : $('#code').val()
                    },
                    dataType: 'json',
                    success : function(data) {
                        document.querySelector("#formRegister").submit();
                        console.log(data);
                    },
                    error : function(request) {
                        showMessage("warning", "Código inválido o ya se encuentra en uso");
                        console.log(request);
                    }
                });
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
    
        @if (session('status'))
            <script>
                showMessage("warning", "Ha ocurrido un problema al registrar el usuario");

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

       
    </body>
</html>
