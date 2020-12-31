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

class AlumnoController extends Controller
{
    function perfil(){

        $alumno = Auth::guard('usuario')->user();
        return view('includes/menubaralternate', ['includeRoute' => 'alumno.perfil', 'optionIndex' => 0, 'alumno' => $alumno]);
    }

    function inicio() {

        $alumno = Auth::guard('usuario')->user();
        return view('includes/menubaralternate', ['includeRoute' => 'alumno.inicio', 'optionIndex' => 0, 'alumno' => $alumno]);
    }
}
