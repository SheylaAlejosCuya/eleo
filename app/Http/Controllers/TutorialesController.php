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

class TutorialesController extends Controller
{
    
    function tutoriales() {

        $alumno = Auth::guard('usuario')->user();
        
        return view('includes/menubaralternate', ['includeRoute' => 'alumno.tutoriales', 'title' => 'Tutoriales', 'optionIndex' => 0, 'alumno' => $alumno]);
    }

    function tutoriales_video($id) {

        $alumno = Auth::guard('usuario')->user();

        return view('includes/menubaralternate', ['includeRoute' => 'alumno.tutorialesVideo', 'title' => 'Demo ' . $id, 'optionIndex' => 0, 'alumno' => $alumno]);
    }


}
