<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\LecturasController;
use App\Http\Controllers\ResultadosController;
use App\Http\Controllers\ForoController;
use App\Http\Controllers\DesafiosController;
use App\Http\Controllers\TutorialesController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BibliotecaController;
use App\Http\Controllers\ProfesorAdminController;
use App\Http\Controllers\ChatController;


/* Login */
Route::get('/', function () { return view('welcome'); })->name('login')->middleware('guest:alumno')->middleware('guest:profesor')->middleware('guest:profesor_admin');

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'create_new_user'])->name('api_register');
Route::post('/register/check/code', [RegisterController::class, 'check_code'])->name('api_check_code');

Route::post('/login', [AuthController::class, 'login'])->name('api_login');
Route::get('/logout', [AuthController::class, 'logout'])->name('api_logout');

/* Menú Inicio */
Route::get('/inicio', [AlumnoController::class, 'inicio'])->name('web_inicio')->middleware('auth:alumno');

/* Perfil de Usuario */
Route::get('/perfil', [AlumnoController::class, 'perfil'])->name('web_perfil')->middleware('auth:alumno');
Route::post('/save/password/alumno', [AlumnoController::class, 'guardar_password'])->name('api_save_password')->middleware('auth:alumno');

/* Tutoriales */
Route::get('/tutoriales/{id}', [TutorialesController::class, 'tutoriales_video'])->name('web_tutoriales_video')->middleware('auth:alumno');
Route::get('/tutoriales',      [TutorialesController::class, 'tutoriales'])->name('web_tutoriales')->middleware('auth:alumno');

Route::get('/bar', function () { return view('includes/menubaralternate', ['optionIndex' => 0]); });

/* Lecturas y recursos */
/* URL - Imagen - Titulo */
Route::get('/libros', [LecturasController::class, 'libros'])->name('web_libros')->middleware('auth:alumno');

/* Preguntas de Video */
Route::get('/libros/video/{id}', [LecturasController::class, 'libros_video'])->name('web_libros_video')->middleware('auth:alumno');

Route::get('/preguntas/video/{id}/bloque-1', [LecturasController::class, 'video_preguntas1'])->name('web_video_preguntas1')->middleware('auth:alumno');
Route::get('/preguntas/video/{id}/bloque-2', [LecturasController::class, 'video_preguntas2'])->name('web_video_preguntas2')->middleware('auth:alumno');
Route::get('/preguntas/video/{id}/bloque-3', [LecturasController::class, 'video_preguntas3'])->name('web_video_preguntas3')->middleware('auth:alumno');
Route::get('/preguntas/video/{id}/bloque-4', [LecturasController::class, 'video_preguntas4'])->name('web_video_preguntas4')->middleware('auth:alumno');

/* Lecturas */
Route::get('/lecturas/{id_reading}', [LecturasController::class, 'lecturas'])->name('web_lecturas')->middleware('auth:alumno');

Route::get('/preguntas/texto/{id_reading}/bloque-1', [LecturasController::class, 'texto_preguntas1'])->name('web_texto_preguntas1')->middleware('auth:alumno');
Route::get('/preguntas/texto/{id_reading}/bloque-2', [LecturasController::class, 'texto_preguntas2'])->name('web_texto_preguntas2')->middleware('auth:alumno');
Route::get('/preguntas/texto/{id_reading}/bloque-3', [LecturasController::class, 'texto_preguntas3'])->name('web_texto_preguntas3')->middleware('auth:alumno');
Route::get('/preguntas/texto/{id_reading}/bloque-4', [LecturasController::class, 'texto_preguntas4'])->name('web_texto_preguntas4')->middleware('auth:alumno');
Route::get('/preguntas/texto/{id_reading}/bloque-5', [LecturasController::class, 'texto_preguntas5'])->name('web_texto_preguntas5')->middleware('auth:alumno');

Route::get('/desafios',                [DesafiosController::class, 'desafios'])->name('web_desafios')->middleware('auth:alumno');
Route::get('/comprensionAuditiva',     [DesafiosController::class, 'comprension_auditiva'])->name('web_comprension_auditiva')->middleware('auth:alumno');
Route::get('/gamificacion',            [DesafiosController::class, 'gamificacion'])->name('web_gamificacion')->middleware('auth:alumno');
Route::get('/gamificacion/pupiletras', [DesafiosController::class, 'gamificacion_pupiletras'])->name('web_gamificacion_pupiletras')->middleware('auth:alumno');
Route::get('/desafios/{id}',           [DesafiosController::class, 'desafios_audios'])->name('web_desafios_audios')->middleware('auth:alumno');

Route::get('/foro',      [ForoController::class, 'foros'])->name('web_foros')->middleware('auth:alumno');
Route::get('/foro/{id}', [ForoController::class, 'foro'])->name('web_foro')->middleware('auth:alumno');

Route::get('/resultados', [ResultadosController::class, 'resultados'])->name('web_resultados')->middleware('auth:alumno');
Route::get('/resultados/estudio', [ResultadosController::class, 'resultados_estudio'])->name('web_resultados_estudio')->middleware('auth:alumno');

/* Rutas de Profesor */
Route::get('/profesor/inicio', [ProfesorController::class, 'inicio'])->name('web_inicio_profesor')->middleware('auth:profesor');

/* Rutas de Profesor Administrativo*/
Route::get('/profesor-administrativo/inicio', [ProfesorAdminController::class, 'inicio'])->name('web_inicio_profesor_admin')->middleware('auth:profesor_admin');
Route::get('/profesor-administrativo/perfil', [ProfesorAdminController::class, 'perfil'])->name('web_profesor_admin_perfil')->middleware('auth:profesor_admin');
Route::post('/save/password/profesor-administrativo', [ProfesorAdminController::class, 'guardar_password'])->name('api_save_password_profesor_admin')->middleware('auth:profesor_admin');

/* Asignación de Profesor */
Route::get('/profesor-administrativo/asignacion/alumnos', [ProfesorAdminController::class, 'asignacion_alumnos'])->name('web_asignacion_alumnos')->middleware('auth:profesor_admin');
Route::post('/alumno/update/section', [ProfesorAdminController::class, 'actualizar_seccion_alumno'])->name('api_actualizar_seccion_alumno')->middleware('auth:profesor_admin');

Route::get('/profesor-administrativo/asignacion/profesores', [ProfesorAdminController::class, 'asignacion_profesores'])->name('web_asignacion_profesores')->middleware('auth:profesor_admin');
Route::post('/profesor/update/section', [ProfesorAdminController::class, 'actualizar_seccion_profesor'])->name('api_actualizar_seccion_profesor')->middleware('auth:profesor_admin');

Route::get('/profesor-administrativo/creacion/profesores', [ProfesorAdminController::class, 'creacion_profesores'])->name('web_creacion_profesores')->middleware('auth:profesor_admin');
Route::post('/profesor/create', [ProfesorAdminController::class, 'crear_profesor'])->name('api_crear_profesor')->middleware('auth:profesor_admin');

Route::get('/profesor-administrativo/creacion/aulas', [ProfesorAdminController::class, 'creacion_aulas'])->name('web_creacion_aulas')->middleware('auth:profesor_admin');
Route::post('/aulas/create', [ProfesorAdminController::class, 'crear_aula'])->name('api_crear_aula')->middleware('auth:profesor_admin');

Route::get('/profesor/perfil', [ProfesorController::class, 'perfil'])->name('web_profesor_perfil')->middleware('auth:profesor');
Route::post('/save/password/profesor', [ProfesorController::class, 'guardar_password'])->name('api_save_password_profesor')->middleware('auth:profesor');
Route::post('/save/avatar/profesor', [ProfesorController::class, 'guardar_foto'])->name('api_save_avatar_profesor')->middleware('auth:profesor');

Route::get('/profesor/tutoriales', function () {
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.tutoriales', 'title' => 'Tutoriales', 'optionIndex' => 0]);
});

Route::get('/profesor/tutoriales/{id}', function ($id) {
    return view('includes/menubarProfesor', ['includeRoute' => 'alumno.tutorialesVideo', 'title' => 'Demo ' . $id, 'optionIndex' => 0]);
});

Route::get('/profesor/biblioteca', [BibliotecaController::class, 'lecturas_recursos'])->name('web_lecturas_recursos')->middleware('auth:profesor');

Route::get('/profesor/biblioteca/lecturamas', [BibliotecaController::class, 'lecturamas'])->name('web_lecturamas')->middleware('auth:profesor');

Route::get('/profesor/biblioteca/eleo-virtual', [BibliotecaController::class, 'eleo_virtual'])->name('web_eleo_virtual')->middleware('auth:profesor');

Route::get('/profesor/biblioteca/eleo-virtual/{id_lecturama}/lecturas', [BibliotecaController::class, 'lecturas_disponibles'])->name('web_lecturas_disponibles')->middleware('auth:profesor');

Route::get('/profesor/biblioteca/eleo-virtual/{id_lecturama}/lectura/{id_lectura}', [BibliotecaController::class, 'lectura_detalles'])->name('web_lectura_detalles')->middleware('auth:profesor');

Route::get('/profesor/biblioteca/eleo-virtual/{id_lecturama}/lectura/{id_lectura}/previsualizacion', [BibliotecaController::class, 'lectura_detalles_preview'])->name('web_lectura_detalles_preview')->middleware('auth:profesor');

/* Lecturas de Estudio */
Route::get('/profesor/lecturas/resultados/aulas', [ProfesorController::class, 'resultados'])->name('web_resultados_profesor')->middleware('auth:profesor');

Route::get('/profesor/lecturas/resultados/aula/{id_classroom}', [ProfesorController::class, 'resultados_aulas'])->name('web_resultados_aulas')->middleware('auth:profesor');

Route::get('/profesor/lecturas/resultados/aula/{id_classroom}/alumnos', [ProfesorController::class, 'resultados_alumnos'])->name('web_resultados_alumnos')->middleware('auth:profesor');

Route::get('/profesor/lecturas/resultados/aula/{id_classroom}/alumno/{id_user}', [ProfesorController::class, 'resultados_alumno_detalle'])->name('web_resultados_alumno_detalle')->middleware('auth:profesor');

Route::get('/profesor/lecturas/resultados/aula/{id_classroom}/alumno/{id_user}/actividades', [ProfesorController::class, 'resultados_alumno_detalle_actividades'])->name('web_resultados_alumno_detalle_actividades')->middleware('auth:profesor');

Route::get('/profesor/lecturas/resultados/aula/{id_classroom}/alumno/{id_user}/promedio-general', [ProfesorController::class, 'resultados_alumno_detalle_promedios'])->name('web_resultados_alumno_detalle_promedios')->middleware('auth:profesor');

Route::get('/profesor/lecturas/resultados/aula/{id_classroom}/alumno/{id_user}/evaluacion-comprension', [ProfesorController::class, 'resultados_alumno_detalle_evaluacion'])->name('web_resultados_alumno_detalle_evaluacion')->middleware('auth:profesor');

Route::get('/profesor/produccion/aulas', [ProfesorController::class, 'actividades_produccion_profesor'])->name('web_actividades_produccion_profesor')->middleware('auth:profesor');

Route::get('/profesor/produccion/aula/{id_classroom}/alumnos', [ProfesorController::class, 'actividades_produccion_aula_profesor'])->name('web_actividades_produccion_aula_profesor')->middleware('auth:profesor');

Route::get('/profesor/produccion/aula/{id_classroom}/alumno/{id_user}/lecturas', [ProfesorController::class, 'actividades_produccion_lecturas_profesor'])->name('web_actividades_produccion_lecturas_profesor')->middleware('auth:profesor');

Route::get('/profesor/produccion/aula/{id_classroom}/alumno/{id_user}/lectura/{id_reading}', [ProfesorController::class, 'actividades_produccion_alumno_profesor'])->name('web_actividades_produccion_alumno_profesor')->middleware('auth:profesor');

Route::get('/profesor/lecturas/resultados/aula/{id_classroom}/alumno/{id_user}/evaluacion-comprension/{id}', [ProfesorController::class, 'resultados_alumno_detalle_evaluacion_lib'])->name('web_resultados_alumno_detalle_evaluacion_lib')->middleware('auth:profesor');

Route::get('/profesor/lecturasAutogestion', function() {
    $data = [
        [
            'url' => "./lecturasAutogestion/1/lecturas",
            'grado' => '1ro "A"' 
        ]
    ];
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.lecturas.aulas', 'data' => $data, 'subtitle' => 'Selecciona el aula de tu preferencia', 'optionIndex' => 3]);
});

Route::get('/profesor/lecturasAutogestion/{aula}/lecturas', function($aula) {
    $data = [
        [
            'url' => "./lecturas/1/alumnos",
            'grado' => '1ro "A"' 
        ],
        [
            'url' => "./lecturas/2/alumnos",
            'grado' => '1ro "A"' 
        ],
        [
            'url' => "./lecturas/3/alumnos",
            'grado' => '1ro "A"' 
        ],
        [
            'url' => "./lecturas/4/alumnos",
            'grado' => '1ro "A"' 
        ],
        [
            'url' => "./lecturas/5/alumnos",
            'grado' => '1ro "A"' 
        ]
    ];
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.actividadesLectura', 'data' => $data, 'subtitle' => 'Selecciona el aula de tu preferencia', 'optionIndex' => 3]);
});

Route::get('/profesor/lecturasAutogestion/{aula}/lecturas/{lectura}/alumnos', function($aula, $lectura) {
    $data = [
        [
            'url' => "./alumnos/1/desafios",
            'nombre' => 'Jaimito' 
        ],
        [
            'url' => "./alumnos/2/desafios",
            'nombre' => 'Jaimito' 
        ],
        [
            'url' => "./alumnos/3/desafios",
            'nombre' => 'Jaimito' 
        ],
        [
            'url' => "./alumnos/1/desafios",
            'nombre' => 'Jaimito' 
        ]
    ];
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.lecturas.alumnos', 'data' => $data ,'subtitle' => 'Selecciona el aula de tu preferencia', 'optionIndex' => 3]);
});

Route::get('/profesor/lecturasAutogestion/{aula}/lecturas/{lectura}/alumnos/{alumno}/desafios', function($aula, $lectura, $alumno) {
    return view('includes/menubarProfesor', ['includeRoute' => 'alumno.desafios', 'd1url' => './desafios/comprensionAuditiva', 'd2url' => './desafios/gamificacion', 'title' => 'Mis desafíos', 'subtitle' => 'Selecciona la categoría de tu preferencia', 'optionIndex' => 3]);
});

Route::get('/profesor/lecturasAutogestion/{aula}/lecturas/{lectura}/alumnos/{alumno}/desafios/comprensionAuditiva', function($aula, $lectura, $alumno) {
    $prom = [
        [
            'title' => 'Nivel Literal',
            'percent' => 50
        ],
        [
            'title' => 'Nivel Inferencial',
            'percent' => 40
        ],
        [
            'title' => 'Nivel Crítico Valorativo',
            'percent' => 60
        ],
        [
            'title' => 'Nivel Intertextual',
            'percent' => 100
        ]
    ];
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.autogestionPromedio', 'prom' => $prom, 'title' => 'Desafíos de comprensión auditiva', 'optionIndex' => 3]);
});

Route::get('/profesor/lecturasAutogestion/{aula}/lecturas/{lectura}/alumnos/{alumno}/desafios/gamificacion', function($aula, $lectura, $alumno) {
    $prom = [
        [
            'title' => 'Nivel Literal',
            'percent' => 50
        ],
        [
            'title' => 'Nivel Inferencial',
            'percent' => 40
        ],
        [
            'title' => 'Nivel Crítico Valorativo',
            'percent' => 60
        ],
        [
            'title' => 'Nivel Intertextual',
            'percent' => 100
        ]
    ];
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.autogestionPromedio', 'prom' => $prom, 'title' => 'Desafíos de comprensión auditiva', 'optionIndex' => 3]);
});

/* Foro */
Route::get('/profesor/foro', [ForoController::class, 'foros_profesor'])->name('web_foros_profesor')->middleware('auth:profesor');
Route::get('/profesor/foro/crear', [ForoController::class, 'foro_profesor_crear'])->name('web_foro_profesor_crear')->middleware('auth:profesor');

Route::post('/profesor/foro/crear', [ForoController::class, 'crear_nuevo_foro'])->name('api_crear_nuevo_foro')->middleware('auth:profesor');

Route::get('/profesor/foro/{id_forum}', [ForoController::class, 'foro_profesor_detalle'])->name('web_foro_profesor_detalle')->middleware('auth:profesor');

Route::delete('/profesor/foro/{id_forum}', [ForoController::class, 'foro_profesor_eliminar'])->name('web_foro_profesor_eliminar')->middleware('auth:profesor');
/* Fin Foro */
Route::get('/profesor/recursos', function() {
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.recursos', 'subtitle' => 'Selecciona la categoría de tu preferencia', 'optionIndex' => 5]);
});

Route::get('/resultadosNuevo', function () {
    return view('includes/menubarProfesor', ['includeRoute' => 'alumno.resultadosNuevo', 'title' => 'Mis Resultados', 'subtitle' => 'Selecciona la categoría de tu preferencia', 'optionIndex' => 4]);
});

Route::get('/resultadosNuevo/promedioGeneral', function () {
    $aresults = [
        [
            'title' => 'Nivel Literal',
            'percent' => 50
        ],
        [
            'title' => 'Nivel Inferencial',
            'percent' => 40
        ],
        [
            'title' => 'Nivel Crítico Valorativo',
            'percent' => 60
        ]
    ];
    $lresults = [
        [
            'title' => 'Nivel Literal',
            'percent' => 50
        ],
        [
            'title' => 'Nivel Inferencial',
            'percent' => 40
        ],
        [
            'title' => 'Nivel Crítico Valorativo',
            'percent' => 60
        ],
        [
            'title' => 'Nivel Intertextual',
            'percent' => 100
        ]
    ];
    $tresults = [
        [
            'title' => 'Producción escrita (Rúbrica de Producción escrita)',
            'percent' => 50
        ],
        [
            'title' => 'Producción oral (Rúbrica de Producción oral)',
            'percent' => 40
        ]
    ];
    return view('includes/menubarProfesor', ['includeRoute' => 'alumno.resultadosPromedio', 'title' => 'Mis Promedio General', 'subtitle' => 'Selecciona la categoría de tu preferencia', 'optionIndex' => 4, 'aresults' => $aresults, 'lresults' => $lresults, 'tresults' => $tresults]);
});

Route::get('/eva1prueba', function () {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.eva1prueba', 'title' => 'Mis Resultados', 'subtitle' => 'Selecciona la categoría de tu preferencia', 'optionIndex' => 4]);
});

Route::get('/gamificacionPruebas', function () {
    return view('includes/menubarProfesor', ['includeRoute' => 'alumno.gamificacion', 'title' => 'Gamificación', 'subtitle' => 'AOIDNAOSIDNAOIDNAOS', 'optionIndex' => 4]);
});

/* ============================================================================================= */
// NOT VIEW RETURN - FUNCTIONS
/* ============================================================================================= */

Route::post('/guardar/preguntas/bloque1', [LecturasController::class, 'guardar_preguntas_bloque1'])->name('api_preguntas_bloque1');
Route::post('/guardar/preguntas/bloque2', [LecturasController::class, 'guardar_preguntas_bloque2'])->name('api_preguntas_bloque2');
Route::post('/guardar/preguntas/bloque3', [LecturasController::class, 'guardar_preguntas_bloque3'])->name('api_preguntas_bloque3');
Route::post('/guardar/preguntas/bloque4', [LecturasController::class, 'guardar_preguntas_bloque4'])->name('api_preguntas_bloque4');

Route::post('/guardar/preguntas/bloque5', [LecturasController::class, 'guardar_preguntas_bloque5'])->name('api_preguntas_bloque5');

Route::post('/asignacion/aulas', [ProfesorController::class, 'asignacion_lecturas'])->name('api_asignacion_lecturas');

Route::get('/descargar/actividad/final/{id_reading}', [ProfesorController::class, 'descargar_doc'])->name('api_descargar_doc');
Route::get('/descargar/actividad/alumno/{id_respuesta_final}', [ProfesorController::class, 'descargar_archivo_alumno'])->name('api_descargar_archivo_alumno');

Route::post('/calificacion/expresion/oral', [ProfesorController::class, 'calificar_exp_oral'])->name('api_calificar_exp_oral');
Route::post('/calificacion/produccion/escrita', [ProfesorController::class, 'calificar_prod_escrita'])->name('api_calificar_prod_escrita');
Route::get('/descargar/lecturama/{id_lecturama}', [BibliotecaController::class, 'descargar_pdf_lecturama'])->name('api_descargar_pdf_lecturama');

/* ============================================================================================= */
// CHAT
/* ============================================================================================= */

Route::group(['middleware' => ['auth:profesor,alumno']], function() {
    Route::get('/messagesUser/{id}', [ChatController::class, 'fetchUserMessages']);
    Route::post('/messagesTo', [ChatController::class, 'saveMessage']);
    Route::post('/updateUnread', [ChatController::class, 'updateUnreadMessages']);
});


