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

/* Login */
Route::get('/', function () { return view('welcome'); })->name('login')->middleware('guest:usuario')->middleware('guest:profesor');
Route::post('/login', [AuthController::class, 'login'])->name('api_login');
Route::get('/logout', [AuthController::class, 'logout'])->name('api_logout');

/* Menú Inicio */
Route::get('/inicio', [AlumnoController::class, 'inicio'])->name('web_inicio')->middleware('auth:usuario');

/* Perfil de Usuario */
Route::get('/perfil', [AlumnoController::class, 'perfil'])->name('web_perfil')->middleware('auth:usuario');
Route::post('/save/password/alumno', [AlumnoController::class, 'guardar_password'])->name('api_save_password');

/* Tutoriales */
Route::get('/tutoriales/{id}', [TutorialesController::class, 'tutoriales_video'])->name('web_tutoriales_video')->middleware('auth:usuario');
Route::get('/tutoriales',      [TutorialesController::class, 'tutoriales'])->name('web_tutoriales')->middleware('auth:usuario');

Route::get('/bar', function () { return view('includes/menubaralternate', ['optionIndex' => 0]); });

/* Lecturas y recursos */
/* Url - Imagen - Titulo */
Route::get('/libros', [LecturasController::class, 'libros'])->name('web_libros')->middleware('auth:usuario');

/* Preguntas de Video */
Route::get('/libros/video/{id}', [LecturasController::class, 'libros_video'])->name('web_libros_video')->middleware('auth:usuario');

Route::get('/preguntas/video/{id}/bloque-1', [LecturasController::class, 'video_preguntas1'])->name('web_video_preguntas1')->middleware('auth:usuario');
Route::get('/preguntas/video/{id}/bloque-2', [LecturasController::class, 'video_preguntas2'])->name('web_video_preguntas2')->middleware('auth:usuario');
Route::get('/preguntas/video/{id}/bloque-3', [LecturasController::class, 'video_preguntas3'])->name('web_video_preguntas3')->middleware('auth:usuario');
Route::get('/preguntas/video/{id}/bloque-4', [LecturasController::class, 'video_preguntas4'])->name('web_video_preguntas4')->middleware('auth:usuario');

/* Lecturas */
Route::get('/lecturas/{id_reading}', [LecturasController::class, 'lecturas'])->name('web_lecturas')->middleware('auth:usuario');

Route::get('/preguntas/texto/{id_reading}/bloque-1', [LecturasController::class, 'texto_preguntas1'])->name('web_texto_preguntas1')->middleware('auth:usuario');
Route::get('/preguntas/texto/{id_reading}/bloque-2', [LecturasController::class, 'texto_preguntas2'])->name('web_texto_preguntas2')->middleware('auth:usuario');
Route::get('/preguntas/texto/{id_reading}/bloque-3', [LecturasController::class, 'texto_preguntas3'])->name('web_texto_preguntas3')->middleware('auth:usuario');
Route::get('/preguntas/texto/{id_reading}/bloque-4', [LecturasController::class, 'texto_preguntas4'])->name('web_texto_preguntas4')->middleware('auth:usuario');
Route::get('/preguntas/texto/{id_reading}/bloque-5', [LecturasController::class, 'texto_preguntas5'])->name('web_texto_preguntas5')->middleware('auth:usuario');

Route::get('/desafios',                [DesafiosController::class, 'desafios'])->name('web_desafios')->middleware('auth:usuario');
Route::get('/comprensionAuditiva',     [DesafiosController::class, 'comprension_auditiva'])->name('web_comprension_auditiva')->middleware('auth:usuario');
Route::get('/gamificacion',            [DesafiosController::class, 'gamificacion'])->name('web_gamificacion')->middleware('auth:usuario');
Route::get('/gamificacion/pupiletras', [DesafiosController::class, 'gamificacion_pupiletras'])->name('web_gamificacion_pupiletras')->middleware('auth:usuario');
Route::get('/desafios/{id}',           [DesafiosController::class, 'desafios_audios'])->name('web_desafios_audios')->middleware('auth:usuario');

Route::get('/foro',      [ForoController::class, 'foros'])->name('web_foros')->middleware('auth:usuario');
Route::get('/foro/{id}', [ForoController::class, 'foro'])->name('web_foro')->middleware('auth:usuario');

Route::get('/resultados', [ResultadosController::class, 'resultados'])->name('web_resultados')->middleware('auth:usuario');
Route::get('/resultados/estudio', [ResultadosController::class, 'resultados_estudio'])->name('web_resultados_estudio')->middleware('auth:usuario');

/* Rutas de Profesor */
Route::get('/profesor-inicio', [ProfesorController::class, 'inicio'])->name('web_inicio_profesor')->middleware('auth:profesor');

Route::get('/profesor/tutoriales', function () {
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.tutoriales', 'title' => 'Tutoriales', 'optionIndex' => 0]);
});

Route::get('/profesor/perfil', function () {
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.perfil', 'title' => 'Información Básica', 'optionIndex' => 0]);
});

Route::get('/profesor/tutoriales/{id}', function ($id) {
    return view('includes/menubarProfesor', ['includeRoute' => 'alumno.tutorialesVideo', 'title' => 'Demo ' . $id, 'optionIndex' => 0]);
});

Route::get('/profesor/biblioteca', function() {
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.biblioteca', 'subtitle' => 'Selecciona la categoría de tu preferencia', 'optionIndex' => 1]);
});

Route::get('/profesor/biblioteca/maestroLecturama', function() {
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.maestroLecturama', 'title' => 'Guía del maestro lecturama', 'optionIndex' => 1]);
});

Route::get('/profesor/biblioteca/eleoVirtual', function() {
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.eleoVirtual', 'title' => 'E - Leo virtual', 'subtitle' => 'Escoge la lectura de tu preferencia', 'optionIndex' => 1]);
});

Route::get('/profesor/biblioteca/eleoVirtual/{lectura}/actividades', function($lectura) {
    $data = [
        [
            'url' => "./actividades/1",
            'grado' => '1ro "A"' 
        ],
        [
            'url' => "./actividades/2",
            'grado' => '1ro "A"' 
        ],
        [
            'url' => "./actividades/3",
            'grado' => '1ro "A"' 
        ],
        [
            'url' => "./actividades/4",
            'grado' => '1ro "A"' 
        ],
        [
            'url' => "./actividades/5",
            'grado' => '1ro "A"' 
        ]
    ];
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.actividadesLectura', 'data' => $data, 'subtitle' => 'Actividades por lectura', 'optionIndex' => 1]);
});

Route::get('/profesor/biblioteca/eleoVirtual/{lectura}/actividades/{actividad}', function($lectura, $actividad) {
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.actividad', 'actividad' => $actividad, 'title' => 'Nivel n° 1', 'optionIndex' => 1]);
});

Route::get('/profesor/biblioteca/eleoVirtual/{lectura}/actividades/{actividad}/preview', function($lectura, $actividad) {
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.actividadPreview', 'title' => 'Nivel n° 1', 'optionIndex' => 1]);
});

/* Lecturas de Estudio */

Route::get('/profesor/lecturasEstudio', function() {
    $data = [
        [
            'url' => "./lecturasEstudio/opciones",
            'grado' => '1ro "A"' 
        ]
    ];
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.lecturas.aulas', 'data' => $data, 'subtitle' => 'Selecciona el aula de tu preferencia', 'optionIndex' => 2]);
});

Route::get('/profesor/lecturasEstudio/opciones', function() {
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.lecturas.opciones', 'subtitle' => 'Selecciona la categoría de tu preferencia', 'optionIndex' => 2]);
});

Route::get('/profesor/lecturasEstudio/opciones/perfilAlumno', function() {
    $data = [
        [
            'url' => "./perfilAlumno/1",
            'nombre' => 'Jaimito' 
        ],
        [
            'url' => "./perfilAlumno/2",
            'nombre' => 'Jaimito' 
        ],
        [
            'url' => "./perfilAlumno/3",
            'nombre' => 'Jaimito' 
        ],
        [
            'url' => "./perfilAlumno/1",
            'nombre' => 'Jaimito' 
        ]
    ];
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.lecturas.alumnos', 'data' => $data,'title' => 'Perfil del alumno','subtitle' => 'Selecciona el perfil que deseas consultar', 'optionIndex' => 2]);
});

Route::get('/profesor/lecturasEstudio/opciones/perfilAlumno/{id}', function($id) {
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.lecturas.reporteAlumno', 'alumno' => $id, 'title' => 'Reporte - Camila','subtitle' => 'Selecciona la categoría', 'optionIndex' => 2]);
});

Route::get('/profesor/lecturasEstudio/opciones/perfilAlumno/{id}/actividades', function($id) {
    $alumnoResults = [
        [
            'title' => 'Expresión oral',
            'percent' => 50
        ],
        [
            'title' => 'Expresión escrita',
            'percent' => 40
        ]
    ];
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.lecturas.ReporteActividades', 'title' => 'Reporte - Camila','subtitle' => 'Selecciona la categoría', 'optionIndex' => 2, 'alumnoResults' => $alumnoResults]);
});

Route::get('/profesor/lecturasEstudio/opciones/perfilAlumno/{id}/promedioGeneral', function($id) {
    $auditiva = [
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
    $textos = [
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
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.lecturas.promedioGeneral', 'title' => 'Reporte - Camila','subtitle' => 'Selecciona la categoría', 'optionIndex' => 2, 'textos' => $textos, 'auditiva' => $auditiva]);
});

Route::get('/profesor/lecturasEstudio/opciones/perfilAlumno/{id}/evaluacionComprension', function() {
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.eleccionLibro', 'subtitle' => 'Selecciona la categoría de tu preferencia', 'optionIndex' => 2]);
});

Route::get('/profesor/lecturasEstudio/opciones/perfilAlumno/{id}/evaluacionComprension/{libro}', function($id) {
    $auditiva = [
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
    $textos = [
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
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.lecturas.promedioGeneral', 'title' => 'Evaluación de Comprensión','subtitle' => '', 'optionIndex' => 2, 'textos' => $textos, 'auditiva' => $auditiva]);
});

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

Route::get('/profesor/foro', function() {
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.foro', 'title' => 'Foro', 'optionIndex' => 4]);
});

Route::get('/profesor/foro/crear', function() {
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.foroCrear', 'title' => 'Nuevo Foro', 'optionIndex' => 4]);
});

Route::get('/profesor/foro/{id}', function($id) {
    return view('includes/menubarProfesor', ['includeRoute' => 'alumno.foroPublicacion', 'optionIndex' => 4]);
});

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

/* ============================================================================================= */
// NOT VIEW RETURN - FUNCTIONS
/* ============================================================================================= */

Route::post('/guardar/preguntas/bloque1', [LecturasController::class, 'guardar_preguntas_bloque1'])->name('api_preguntas_bloque1');
