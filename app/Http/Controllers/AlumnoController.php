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

class AlumnoController extends Controller
{
    
    function perfil() {
        $alumno = Auth::guard('alumno')->user();
        return view('includes/menubaralternate', ['includeRoute' => 'alumno.perfil', 'optionIndex' => 0, 'alumno' => $alumno]);
    }

    function guardar_password(Request $request) {
        try {
            $usuario = tb_user::find($request->id_usuario);
            $usuario->password = Hash::make($request->password_new);
            $usuario->save();
            return response()->json(['status_code' => 200, 'message' => 'Success'], 200);
        } catch (Exception $error) {
            return response()->json(['status_code' => 500, 'message' => 'Error', 'error' => $error], 500);
        }
    }

    function inicio() {
        $alumno = Auth::guard('alumno')->user();
        return view('includes/menubaralternate', ['includeRoute' => 'alumno.inicio', 'optionIndex' => 0, 'alumno' => $alumno]);
    }
    
}
