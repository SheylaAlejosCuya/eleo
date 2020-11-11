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
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.tutorialesVideo', 'tutorialID' => $id]);
}); 

Route::get('/tutoriales', function () {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.tutoriales']);
});

Route::get('/bar', function () {
    return view('includes/menubaralternate', ['includeRoute' => '']);
});
Route::get('/lecturas', function () {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.lecturas']);
});
Route::get('/preguntas', function () {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.eva1']);
});
Route::get('/preguntas2', function () {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.eva2']);
});
Route::get('/preguntas3', function () {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.eva3']);
});
Route::get('/preguntas4', function () {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.eva4']);
});
Route::get('/preguntas5', function () {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.eva5']);
});

/* Preguntas de Video */

Route::get('/videoPreguntas', function() {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.VideoTxt.eva1']);
});

Route::get('/videoPreguntas2', function() {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.VideoTxt.eva2']);
});

Route::get('/videoPreguntas3', function() {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.VideoTxt.eva3']);
});

Route::get('/videoPreguntas4', function() {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.VideoTxt.eva4']);
});

Route::get('/libros', function() {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.libros']);
});

Route::get('/desafios', function() {
    return view('includes/menubaralternate', ['includeRoute' => 'alumno.desafios']);
});