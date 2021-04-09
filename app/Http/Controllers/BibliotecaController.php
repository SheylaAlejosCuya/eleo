<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests;

use Storage;
use File;
use DB;
use Carbon\Carbon;
use Auth;

use App\Models\tb_user;
use App\Models\tb_reading;
use App\Models\tb_lecturama;

use App\Models\tb_level;
use App\Models\tb_grade;
use App\Models\tb_section;
use App\Models\tb_classroom;

class BibliotecaController extends Controller
{
    function lecturas_recursos() {
        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.biblioteca', 'subtitle' => 'Selecciona la categoría de tu preferencia', 'optionIndex' => 1]);
    }

    function lecturamas() {
        $lecturamas = tb_lecturama::where('id_state', 3)->get();
        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.maestroLecturama', 'title' => 'Guía del maestro lecturama', 'optionIndex' => 1, 'lecturamas' => $lecturamas]);
    }

    function eleo_virtual() {
        $lecturamas = tb_lecturama::where('id_state', 3)->get();
        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.eleoVirtual', 'title' => 'E-Leo virtual', 'subtitle' => 'Lecturamas disponibles', 'optionIndex' => 1, 'lecturamas' => $lecturamas]);
    }

    function lecturas_disponibles($id_lecturama) {
        $lecturas = tb_reading::where('id_lecturama', $id_lecturama)->where('id_state', 3)->get();
        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.actividadesLectura', 'subtitle' => 'Lecturas disponibles', 'optionIndex' => 1, 'lecturas' => $lecturas]);
    }

    function lectura_detalles($id_lecturama, $id_lectura) {
        $lectura = tb_reading::find($id_lectura);
        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.actividad', 'actividad' => $id_lectura, 'title' => 'Nivel n° 1', 'optionIndex' => 1, 'lectura' => $lectura]);
    }

    function lectura_detalles_preview($id_lecturama, $id_lectura) {
        $lecturama = tb_lecturama::find($id_lecturama);
        $lectura = tb_reading::find($id_lectura);
        $salones = tb_classroom::where('id_grade', $lecturama->id_grade)->where('id_teacher', '!=', null)->with('grade')->with('section')->with('level')->with('teacher')->get();
        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.actividadPreview', 'title' => 'Nivel n°'.$id_lecturama, 'optionIndex' => 1, 'lectura'=>$lectura, 'salones' => $salones]);
    }

}
