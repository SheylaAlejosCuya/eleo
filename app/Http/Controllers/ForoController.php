<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;

use Storage;
use File;
use DB;
use Carbon\Carbon;
use Auth;

use App\Models\tb_user;
use App\Models\tb_reading;
use App\Models\tb_lecturama;

class ForoController extends Controller
{
    function foros() {

        $alumno = Auth::guard('usuario')->user();
        return view('includes/menubaralternate', ['includeRoute' => 'alumno.foro', 'title' => 'Foro', 'optionIndex' => 3, 'alumno' => $alumno]);
    }

    function foro($id) {

        $alumno = Auth::guard('usuario')->user();
        return view('includes/menubaralternate', ['includeRoute' => 'alumno.foroPublicacion', 'optionIndex' => 3, 'alumno' => $alumno]);
    }


    function foros_profesor() {
        $alumno = Auth::guard('profesor')->user();
        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.foro', 'title' => 'Foro', 'optionIndex' => 4]);
    }

    function foro_profesor_crear() {
        $alumno = Auth::guard('profesor')->user();
        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.foroCrear', 'title' => 'Nuevo Foro', 'optionIndex' => 4]);
    }
}
