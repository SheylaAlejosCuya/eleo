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

class ProfesorController extends Controller
{
    
    function inicio() {
        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.inicio', 'AlternativeBackground' => "1", 'optionIndex' => 0]);
    }

    function perfil() {
        $profesor = tb_user::find(Auth::guard('profesor')->id());
        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.perfil', 'title' => 'Información Básica', 'optionIndex' => 0, 'profesor' => $profesor]);
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

    function guardar_foto(Request $request) {
        try {
            $path = Storage::disk('perfil_fotos')->putFile('perfil_profesor', $request->file('foto'));
            $usuario = tb_user::find($request->id_usuario);
            $usuario->photo = $path;
            $usuario->save();
            return response()->json(['status_code' => 200, 'message' => 'image saved', 'path'=>$path], 200);
        } catch (Exception $error) {
            return response()->json(['status_code' => 500, 'message' => 'Error', 'error' => $error], 500);
        }
    }

    function asignacion_alumnos() {

        $alumnos = tb_user::where('id_state', 1)->where('id_rol', 2)->get();
        
        $niveles = tb_level::all();
        $grados = tb_grade::all();
        $secciones = tb_section::all();

        foreach ($niveles as $key => $nivel) {
            foreach ($grados as $key => $grado) {
                $grado->alumnos = tb_user::where('id_state', 1)->where('id_rol', 2)->where('id_level', $nivel->id_level)->where('id_grade', $grado->id_grade)->get();
            }
            $nivel->grados = $grados;
        }
        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.asignacionAlumnos', 'optionIndex' => 6, 'niveles' => $niveles, 'secciones' => $secciones ]);
    }

    function actualizar_seccion_alumno(Request $request) {
        try {
            $alumno = tb_user::find($request->id_alumno);
            $alumno->id_section = $request->id_seccion;
            $alumno->save();
            return response()->json(['type' => 'success', 'message' => 'update successful'], 200);
        } catch(\Excepcion $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
        
    }

}
