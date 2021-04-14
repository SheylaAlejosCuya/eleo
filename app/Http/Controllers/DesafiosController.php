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

class DesafiosController extends Controller
{
    function desafios() {

        $alumno = Auth::guard('alumno')->user();
        return view('includes/menubaralternate', ['includeRoute' => 'alumno.desafios', 'd1url' => './comprensionAuditiva', 'd2url' => './gamificacion', 'title' => 'Mis desafíos', 'subtitle' => 'Selecciona la categoría de tu preferencia', 'optionIndex' => 2, 'alumno' => $alumno]);
    }

    function comprension_auditiva() {

        $alumno = Auth::guard('alumno')->user();
        $lecturama = tb_lecturama::where('id_grade', $alumno->id_grade)->where('id_level', $alumno->id_level)->first();
        $lecturas = tb_reading::where('id_lecturama', $lecturama->id_lecturama)->where('id_state', 3)->get();

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
        return view('includes/menubaralternate', ['includeRoute' => 'alumno.libros', 'data' => $data, 'title' => 'Desafíos de comprensión auditiva', 'subtitle' => 'Selecciona el libro de tu preferencia', 'optionIndex' => 2, 'lecturas' => $lecturas,  'alumno' => $alumno, 'type' => 'desafios']);
    }

    function gamificacion() {

        $alumno = Auth::guard('alumno')->user();
        $lecturama = tb_lecturama::where('id_grade', $alumno->id_grade)->where('id_level', $alumno->id_level)->first();
        $lecturas = tb_reading::where('id_lecturama', $lecturama->id_lecturama)->where('id_state', 3)->get();

        $data = [
            [
                'url' => "./gamificacion/pupiletras",
                'img' => "images/e.png"
            ]
        ];
        return view('includes/menubaralternate', ['includeRoute' => 'alumno.libros', 'data' => $data, 'title' => 'Gamificación', 'subtitle' => 'Selecciona la actividad de tu preferencia', 'optionIndex' => 2, 'alumno' => $alumno, 'lecturas' => $lecturas, 'type' => 'gamificacion']);
    }

    function gamificacion_pupiletras() {

        $alumno = Auth::guard('alumno')->user();
        return view('includes/menubaralternate', ['includeRoute' => 'alumno.pupiletras', 'title' => 'Pupiletras', 'subtitle' => 'Encuentra las palabras', 'optionIndex' => 2, 'alumno' => $alumno]);
    }

    function desafios_audios($id) {

        $alumno = Auth::guard('alumno')->user();
        $lectura = tb_reading::find($id);

        return view('includes/menubaralternate', ['includeRoute' => 'alumno.desafios.auditivo1', 'title' => 'La momificación en el antiguo Egipto', 'optionIndex' => 2, 'alumno' => $alumno, 'lectura'=>$lectura]);
    }
}
