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

class ResultadosController extends Controller
{
    function resultados() {

        $alumno = Auth::guard('usuario')->user();
        return view('includes/menubaralternate', ['includeRoute' => 'alumno.resultados', 'title' => 'Mis resultados', 'subtitle' => 'Selecciona la categoría de tu preferencia', 'optionIndex' => 4, 'alumno' => $alumno]);
    }

    function resultados_estudio() {

        $alumno = Auth::guard('usuario')->user();
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
        return view('includes/menubaralternate', ['includeRoute' => 'alumno.lecturaEstudio', 'title' => 'Lecturas de estudio', 'aresults' => $aresults, 'lresults' => $lresults, 'tresults' => $tresults, 'optionIndex' => 4, 'alumno' => $alumno]);
    }
}
