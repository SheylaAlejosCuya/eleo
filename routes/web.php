<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inicio', function () {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.inicio']);
});

Route::get('/perfil', [UsuarioController::class, 'perfil']);

Route::get('/tutoriales/{id}', function ($id) {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.tutorialesVideo', 'title' => 'Demo ' . $id]);
}); 

Route::get('/tutoriales', function () {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.tutoriales', 'title' => 'Tutoriales']);
});

Route::get('/bar', function () {
    return view('includes/menubaralternate', ['includeRoute' => '']);
});
Route::get('/lecturas', function () {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.lecturas', 'title' => 'La momificación antiguo Egipto']);
});
Route::get('/preguntas', function () {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.eva1', 'title' => 'La momificación antiguo Egipto']);
});
Route::get('/preguntas2', function () {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.eva2', 'title' => 'La momificación antiguo Egipto']);
});
Route::get('/preguntas3', function () {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.eva3', 'title' => 'La momificación antiguo Egipto']);
});
Route::get('/preguntas4', function () {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.eva4', 'title' => 'La momificación antiguo Egipto']);
});
Route::get('/preguntas5', function () {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.eva5', 'title' => 'La momificación antiguo Egipto']);
});

/* Preguntas de Video */

Route::get('/videoPreguntas', function() {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.VideoTxt.eva1', 'title' => 'La momificación antiguo Egipto']);
});

Route::get('/videoPreguntas2', function() {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.VideoTxt.eva2', 'title' => 'La momificación antiguo Egipto']);
});

Route::get('/videoPreguntas3', function() {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.VideoTxt.eva3', 'title' => 'La momificación antiguo Egipto']);
});

Route::get('/videoPreguntas4', function() {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.VideoTxt.eva4', 'title' => 'La momificación antiguo Egipto']);
});

Route::get('/libros', function() {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.libros', 'title' => 'Mis libros y lecturas', 'subtitle' => 'Selecciona el libro de tu preferencia']);
});

Route::get('/desafios', function() {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.desafios', 'title' => 'Mis desafíos']);
});

Route::get('/comprensionAuditiva', function() {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.libros', 'title' => 'Desafíos de comprensión auditiva', 'subtitle' => 'Selecciona el libro de tu preferencia']);
});

Route::get('/gamificacion', function() {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.libros', 'title' => 'Gamificación', 'subtitle' => 'Selecciona la actividad de tu preferencia']);
});

Route::get('/desafios/{id}', function($id) {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.desafios.auditivo1', 'title' => 'La momificación antiguo Egipto']);
});