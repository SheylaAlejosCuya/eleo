<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;

/* Login */
Route::get('/', function () {
    return view('welcome');
});

/* Menú Inicio */
Route::get('/inicio', function () {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.inicio', 'optionIndex' => 0]);
});

/* Perfil de Usuario */
Route::get('/perfil', [UsuarioController::class, 'perfil']);

/* Tutoriales */
Route::get('/tutoriales/{id}', function ($id) {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.tutorialesVideo', 'title' => 'Demo ' . $id, 'optionIndex' => 0]);
}); 
Route::get('/tutoriales', function () {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.tutoriales', 'title' => 'Tutoriales', 'optionIndex' => 0]);
});

Route::get('/bar', function () {
    return view('includes/menubaralternate', ['optionIndex' => 0]);
});

/* Lecturas y recursos */
Route::get('/libros', function() {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.libros', 'title' => 'Mis libros y lecturas', 'subtitle' => 'Selecciona el libro de tu preferencia', 'optionIndex' => 1]);
});

Route::get('/lecturas', function () {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.lecturas', 'AlternativeBackground' => "1", 'optionIndex' => 1]);
});
Route::get('/preguntas', function () {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.eva1', 'title' => 'La momificación antiguo Egipto', 'optionIndex' => 1]);
});
Route::get('/preguntas2', function () {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.eva2', 'title' => 'La momificación antiguo Egipto', 'optionIndex' => 1]);
});
Route::get('/preguntas3', function () {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.eva3', 'title' => 'La momificación antiguo Egipto', 'optionIndex' => 1]);
});
Route::get('/preguntas4', function () {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.eva4', 'title' => 'La momificación antiguo Egipto', 'optionIndex' => 1]);
});
Route::get('/preguntas5', function () {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.eva5', 'title' => 'La momificación antiguo Egipto', 'optionIndex' => 1]);
});

/* Preguntas de Video */

Route::get('/videoPreguntas', function() {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.VideoTxt.eva1', 'title' => 'La momificación antiguo Egipto', 'optionIndex' => 1]);
});

Route::get('/videoPreguntas2', function() {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.VideoTxt.eva2', 'title' => 'La momificación antiguo Egipto', 'optionIndex' => 1]);
});

Route::get('/videoPreguntas3', function() {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.VideoTxt.eva3', 'title' => 'La momificación antiguo Egipto', 'optionIndex' => 1]);
});

Route::get('/videoPreguntas4', function() {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.VideoTxt.eva4', 'title' => 'La momificación antiguo Egipto', 'optionIndex' => 1]);
});

Route::get('/desafios', function() {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.desafios', 'title' => 'Mis desafíos', 'subtitle' => 'Selecciona la categoría de tu preferencia', 'optionIndex' => 2]);
});

Route::get('/comprensionAuditiva', function() {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.libros', 'title' => 'Desafíos de comprensión auditiva', 'subtitle' => 'Selecciona el libro de tu preferencia', 'optionIndex' => 2]);
});

Route::get('/gamificacion', function() {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.libros', 'title' => 'Gamificación', 'subtitle' => 'Selecciona la actividad de tu preferencia', 'optionIndex' => 2]);
});

Route::get('/gamificacion/pupiletras', function() {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.pupiletras', 'title' => 'Pupiletras', 'subtitle' => 'Encuentra las palabras', 'optionIndex' => 2]);
});

Route::get('/desafios/{id}', function($id) {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.desafios.auditivo1', 'title' => 'La momificación antiguo Egipto', 'optionIndex' => 2]);
});

Route::get('/foro', function() {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.foro', 'title' => 'Foro', 'optionIndex' => 3]);
});

Route::get('/foro/{id}', function($id) {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.foroPublicacion', 'optionIndex' => 3]);
});

Route::get('/resultados', function() {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.desafios', 'title' => 'Mis resultados', 'subtitle' => 'Selecciona la categoría de tu preferencia', 'optionIndex' => 3]);
});

Route::get('/resultados/estudio', function() {
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
            'title' => 'Producción Escrita (Rúbrica de Producción escrita)',
            'percent' => 50
        ],
        [
            'title' => 'Producción Oral (Rúbrica de Producción oral)',
            'percent' => 40
        ]
    ];
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.lecturaEstudio', 'title' => 'Lecturas de estudio', 'aresults' => $aresults, 'lresults' => $lresults, 'tresults' => $tresults, 'optionIndex' => 3]);
});

/* Rutas de Profesor */

Route::get('/profesor', function () {
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.inicio', 'AlternativeBackground' => "1", 'optionIndex' => 0]);
});

Route::get('/profesor/tutoriales', function () {
    return view('includes/menubarProfesor', ['includeRoute' => 'alumno.tutoriales', 'title' => 'Tutoriales', 'optionIndex' => 0]);
});

Route::get('/profesor/perfil', function () {
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.perfil', 'title' => 'Información Básica', 'optionIndex' => 0]);
});

Route::get('/profesor/tutoriales', function () {
    return view('includes/menubarProfesor', ['includeRoute' => 'alumno.tutoriales', 'title' => 'Tutoriales', 'optionIndex' => 0]);
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

Route::get('/profesor/biblioteca/eleoVirtual/{lectura}', function($lectura) {
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.actividadesLectura', 'subtitle' => 'Actividades por lectura', 'optionIndex' => 1]);
});

Route::get('/profesor/biblioteca/eleoVirtual/{lectura}/{actividad}', function($lectura, $actividad) {
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.actividad', 'title' => 'Nivel n° 1', 'optionIndex' => 1]);
});

Route::get('/profesor/biblioteca/eleoVirtual/{lectura}/{actividad}/preview', function($lectura, $actividad) {
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.actividadPreview', 'title' => 'Nivel n° 1', 'optionIndex' => 1]);
});

/* Lecturas de Estudio */

Route::get('/profesor/lecturasEstudio', function() {
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.lecturas.aulas', 'subtitle' => 'Selecciona el aula de tu preferencia', 'optionIndex' => 2]);
});

Route::get('/profesor/lecturasEstudio/opciones', function() {
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.lecturas.opciones', 'subtitle' => 'Selecciona la categoría de tu preferencia', 'optionIndex' => 2]);
});

Route::get('/profesor/lecturasEstudio/opciones/perfilAlumno', function() {
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.lecturas.alumnos', 'title' => 'Perfil del alumno','subtitle' => 'Selecciona el perfil que deseas consultar', 'optionIndex' => 2]);
});

Route::get('/profesor/lecturasEstudio/opciones/perfilAlumno/{id}', function($id) {
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.lecturas.reporteAlumno', 'title' => 'Reporte - Camila','subtitle' => 'Selecciona la categoría', 'optionIndex' => 2]);
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