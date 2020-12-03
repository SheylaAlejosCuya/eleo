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
/* Url - Imagen - Titulo */
Route::get('/libros', function() {
    $data = [
        [
            'url' => "./libros/video/1",
            'img' => "images/Lecturas/4to 1 FABULEANDO.jpeg",
            'title' => 'FABULEANDO'
        ],
        [
            'url' => "./libros/video/2",
            'img' => "images/Lecturas/4to 2 APRENDIENDO A MONTAR.jpeg",
            'title' => "APRENDIENDO A MONTAR"
        ],
        [
            'url' => "./libros/video/3",
            'img' => "images/Lecturas/4to 3 UN GUSANO FABRICANTE.jpg",
            'title' => "UN GUSANO FABRICANTE"
        ],
        [
            'url' => "./libros/video/4",
            'img' => "images/Lecturas/4to 4 TRABAJANDO POR LA NIÑEZ.jpg",
            'title' => "TRABAJANDO POR LA NIÑEZ"
        ],
        [
            'url' => "./libros/video/5",
            'img' => "images/Lecturas/4to 5 ALEGRE AL AIRE LIBRE.jpg",
            'title' => "ALEGRE AL AIRE LIBRE"
        ],
        [
            'url' => "./libros/video/6",
            'img' => "images/Lecturas/4to 6 EL DOCTOR SABELOTODO.jpg",
            'title' => "EL DOCTOR SABELOTODO"
        ],
        [
            'url' => "./libros/video/7",
            'img' => "images/Lecturas/4to 7 ADOLESCENCIA, UN MOMENTO DE LA VIDA.jpg",
            'title' => "ADOLESCENCIA, UN MOMENTO DE LA VIDA"
        ],
        [
            'url' => "./libros/video/8",
            'img' => "images/Lecturas/4to 8 PERÚ MÁGIA Y BIODIVERSIDAD.jpeg",
            'title' => "PERÚ MÁGIA Y BIODIVERSIDAD"
        ],
        [
            'url' => "./libros/video/9",
            'img' => "images/Lecturas/4to 9 I CONVERSANDO CON LA HISTORIA.jpeg",
            'title' => "CONVERSANDO CON LA HISTORIA I"
        ],
        [
            'url' => "./libros/video/10",
            'img' => "images/Lecturas/4to 9 II CONVERSANDO CON LA HISTORIA.jpeg",
            'title' => "CONVERSANDO CON LA HISTORIA II"
        ],
        [
            'url' => "./libros/video/11",
            'img' => "images/Lecturas/4to 10 TIERNA Y DULCE POR SIEMPRE.jpg",
            'title' => "TIERNA Y DULCE POR SIEMPRE"
        ],
        [
            'url' => "./libros/video/12",
            'img' => "images/Lecturas/4to 11 UNIÓN Y PODER.jpg",
            'title' => "UNIÓN Y PODER"
        ],
        [
            'url' => "./libros/video/13",
            'img' => "images/Lecturas/4to 12 CONOCIENDO EL ANTIGUO EGIPTO.jpg",
            'title' => "CONOCIENDO EL ANTIGUO EGIPTO"
        ],
        [
            'url' => "./libros/video/14",
            'img' => "images/Lecturas/4to 13 COMO HACER UN SEÑOR CABEZA DE PASTO.jpeg",
            'title' => "COMO HACER UN SEÑOR CABEZA DE PASTO"
        ],
        [
            'url' => "./libros/video/15",
            'img' => "images/Lecturas/4to 14 METRO EL CABALLO PINTOR.jpg",
            'title' => "METRO EL CABALLO PINTOR"
        ],
        [
            'url' => "./libros/video/16",
            'img' => "images/Lecturas/4to 15¿DE QUÉ TE BURLAS¿.jpg",
            'title' => "¿DE QUÉ TE BURLAS?"
        ],
        [
            'url' => "./libros/video/17",
            'img' => "images/Lecturas/4to 16 VOZ, CANTO Y SENTIMIENTO.jpg",
            'title' => "VOZ, CANTO Y SENTIMIENTO"
        ],
        [
            'url' => "./libros/video/18",
            'img' => "images/Lecturas/4to 17 I EL ORIGEN DE LOS ATRAPASUEÑOS.jpeg",
            'title' => "EL ORIGEN DE LOS ATRAPASUEÑOS I"
        ],
        [
            'url' => "./libros/video/19",
            'img' => "images/Lecturas/4to 17 II EL ORIGEN DE LOS ATRAPASUEÑOS.jpeg",
            'title' => "EL ORIGEN DE LOS ATRAPASUEÑOS II"
        ],
        [
            'url' => "./libros/video/20",
            'img' => "images/Lecturas/4to 18 RECETAS ROJAS.jpg",
            'title' => "RECETAS ROJAS"
        ],
        [
            'url' => "./libros/video/21",
            'img' => "images/Lecturas/4to 19 UN GENIO DE LA DIVERSIÓN.jpg",
            'title' => "UN GENIO DE LA DIVERSIÓN"
        ],
        [
            'url' => "./libros/video/22",
            'img' => "images/Lecturas/4to 20 NO QUIERO CRECER.jpg",
            'title' => "NO QUIERO CRECER"
        ]
    ];
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.libros', 'data' => $data, 'title' => 'Mis libros y lecturas', 'subtitle' => 'Selecciona el libro de tu preferencia', 'optionIndex' => 1]);
});

/* Preguntas de Video */

Route::get('/libros/video/{id}', function ($id) {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.tutorialesVideo', 'continue' => '../../videoPreguntas', 'title' => 'La momificación en el antiguo Egipto', 'optionIndex' => 1]);
});

Route::get('/videoPreguntas', function() {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.VideoTxt.eva1', 'title' => 'La momificación en el antiguo Egipto', 'optionIndex' => 1]);
});

Route::get('/videoPreguntas2', function() {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.VideoTxt.eva2', 'title' => 'La momificación en el antiguo Egipto', 'optionIndex' => 1]);
});

Route::get('/videoPreguntas3', function() {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.VideoTxt.eva3', 'title' => 'La momificación en el antiguo Egipto', 'optionIndex' => 1]);
});

Route::get('/videoPreguntas4', function() {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.VideoTxt.eva4', 'title' => 'La momificación en el antiguo Egipto', 'optionIndex' => 1]);
});

/* Lecturas */

Route::get('/lecturas', function () {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.lecturas', 'AlternativeBackground' => "1", 'optionIndex' => 1]);
});
Route::get('/preguntas', function () {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.eva1', 'title' => 'La momificación en el antiguo Egipto', 'optionIndex' => 1]);
});
Route::get('/preguntas2', function () {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.eva2', 'title' => 'La momificación en el antiguo Egipto', 'optionIndex' => 1]);
});
Route::get('/preguntas3', function () {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.eva3', 'title' => 'La momificación en el antiguo Egipto', 'optionIndex' => 1]);
});
Route::get('/preguntas4', function () {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.eva4', 'title' => 'La momificación en el antiguo Egipto', 'optionIndex' => 1]);
});
Route::get('/preguntas5', function () {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.eva5', 'title' => 'La momificación en el antiguo Egipto', 'optionIndex' => 1]);
});

Route::get('/desafios', function() {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.desafios', 'd1url' => './comprensionAuditiva', 'd2url' => './gamificacion', 'title' => 'Mis desafíos', 'subtitle' => 'Selecciona la categoría de tu preferencia', 'optionIndex' => 2]);
});

Route::get('/comprensionAuditiva', function() {
    $data = [
        [
            'url' => "./desafios/1",
            'img' => "images/a.png"
        ],
        [
            'url' => "./desafios/2",
            'img' => "images/b.png"
        ],
        [
            'url' => "./desafios/3",
            'img' => "images/c.png"
        ],
        [
            'url' => "./desafios/4",
            'img' => "images/e.png"
        ]
    ];
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.libros', 'data' => $data, 'title' => 'Desafíos de comprensión auditiva', 'subtitle' => 'Selecciona el libro de tu preferencia', 'optionIndex' => 2]);
});

Route::get('/gamificacion', function() {
    $data = [
        [
            'url' => "./gamificacion/pupiletras",
            'img' => "images/e.png"
        ]
    ];
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.libros', 'data' => $data, 'title' => 'Gamificación', 'subtitle' => 'Selecciona la actividad de tu preferencia', 'optionIndex' => 2]);
});

Route::get('/gamificacion/pupiletras', function() {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.pupiletras', 'title' => 'Pupiletras', 'subtitle' => 'Encuentra las palabras', 'optionIndex' => 2]);
});

Route::get('/desafios/{id}', function($id) {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.desafios.auditivo1', 'title' => 'La momificación en el antiguo Egipto', 'optionIndex' => 2]);
});

Route::get('/foro', function() {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.foro', 'title' => 'Foro', 'optionIndex' => 3]);
});

Route::get('/foro/{id}', function($id) {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.foroPublicacion', 'optionIndex' => 3]);
});

Route::get('/resultados', function() {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.resultados', 'title' => 'Mis resultados', 'subtitle' => 'Selecciona la categoría de tu preferencia', 'optionIndex' => 4]);
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
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.lecturaEstudio', 'title' => 'Lecturas de estudio', 'aresults' => $aresults, 'lresults' => $lresults, 'tresults' => $tresults, 'optionIndex' => 4]);
});

/* Rutas de Profesor */

Route::get('/profesor', function () {
    return view('includes/menubarProfesor', ['includeRoute' => 'profesor.inicio', 'AlternativeBackground' => "1", 'optionIndex' => 0]);
});

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