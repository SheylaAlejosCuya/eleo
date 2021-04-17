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
use App\Models\tb_gender;
use App\Models\tb_classroom;
use App\Models\tb_assignment_reading;

class ProfesorAdminController extends Controller
{
    function inicio() {
        $profesor = tb_user::find(Auth::guard('profesor_admin')->id());
        return view('includes/menubarProfesorAdmin', ['includeRoute' => 'profesor_admin.inicio', 'AlternativeBackground' => "1", 'optionIndex' => 0, 'profesor' => $profesor]);
    }

    function perfil() {
        $profesor = tb_user::find(Auth::guard('profesor_admin')->id());
        return view('includes/menubarProfesorAdmin', ['includeRoute' => 'profesor_admin.perfil', 'title' => 'Información del administrador', 'optionIndex' => 0, 'profesor' => $profesor]);
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

    function asignacion_alumnos() {

        $admin = tb_user::find(Auth::guard('profesor_admin')->id());
        $alumnos = tb_user::where('id_state', 1)->where('id_rol', 2)->where('id_school', $admin->id_school)->with('level')->orderBy('id_level', 'asc')->orderBy('id_grade', 'asc')->get();
        
        $niveles = tb_level::all();
        $grados = tb_grade::all();
        $secciones = tb_section::all();

        $aulas = tb_classroom::where('id_school', $admin->id_school)->with('level')->with('grade')->with('section')->with('teacher')->get();

        // foreach ($niveles as $key => $nivel) {
        //     foreach ($grados as $key => $grado) {
        //         $grado->alumnos = tb_user::where('id_state', 1)->where('id_rol', 2)->where('id_level', $nivel->id_level)->where('id_grade', $grado->id_grade)->get();
        //     }
        //     $nivel->grados = $grados;
        // }
        return view('includes/menubarProfesorAdmin', ['includeRoute' => 'profesor_admin.asignacionAlumnos', 'optionIndex' => 1, 'niveles' => $niveles, 'secciones' => $secciones , 'alumnos' => $alumnos, 'aulas' => $aulas]);
    }


    function asignacion_profesores() {

        $admin = tb_user::find(Auth::guard('profesor_admin')->id());

        $profesores = tb_user::where('id_state', 1)->where('id_rol', 1)->where('id_school', $admin->id_school)->get();
        $aulas = tb_classroom::where('id_school', $admin->id_school)->with('level')->with('grade')->with('section')->with('teacher')->get();
        //dd($profesores);

        $niveles = tb_level::all();
        $grados = tb_grade::all();
        $secciones = tb_section::all();

        // foreach ($niveles as $key => $nivel) {
        //     foreach ($grados as $key => $grado) {
        //         $grado->alumnos = tb_user::where('id_state', 1)->where('id_rol', 2)->where('id_level', $nivel->id_level)->where('id_grade', $grado->id_grade)->get();
        //     }
        //     $nivel->grados = $grados;
        // }
        return view('includes/menubarProfesorAdmin', ['includeRoute' => 'profesor_admin.asignacionProfesores', 'optionIndex' => 2, 'niveles' => $niveles, 'secciones' => $secciones, 'aulas' => $aulas, 'profesores' => $profesores]);
    }


    function creacion_profesores() {

        $admin = tb_user::find(Auth::guard('profesor_admin')->id());
        $profesores = tb_user::where('id_state', 1)->where('id_rol', 1)->where('id_school', $admin->id_school)->get();
        
        //dd($profesores);

        $niveles = tb_level::all();
        $grados = tb_grade::all();
        $secciones = tb_section::all();
        $genders = tb_gender::all();

        // foreach ($niveles as $key => $nivel) {
        //     foreach ($grados as $key => $grado) {
        //         $grado->alumnos = tb_user::where('id_state', 1)->where('id_rol', 2)->where('id_level', $nivel->id_level)->where('id_grade', $grado->id_grade)->get();
        //     }
        //     $nivel->grados = $grados;
        // }
        return view('includes/menubarProfesorAdmin', ['includeRoute' => 'profesor_admin.creacionProfesores', 'optionIndex' => 3, 'niveles' => $niveles, 'secciones' => $secciones, 'profesores'=>$profesores, 'genders' => $genders ]);
    }

    function creacion_aulas() {

        $admin = tb_user::find(Auth::guard('profesor_admin')->id());

        //$profesores = tb_user::where('id_state', 1)->where('id_rol', 1)->where('id_school', $admin->id_school)->get();
        
        //dd($profesores);

        $niveles = tb_level::all();
        $grados = tb_grade::all();
        $secciones = tb_section::all();

        $aulas = tb_classroom::where('id_school', $admin->id_school)->with('level')->with('grade')->with('section')->with('teacher')->get();

        // foreach ($niveles as $key => $nivel) {
        //     foreach ($grados as $key => $grado) {
        //         $grado->alumnos = tb_user::where('id_state', 1)->where('id_rol', 2)->where('id_level', $nivel->id_level)->where('id_grade', $grado->id_grade)->get();
        //     }
        //     $nivel->grados = $grados;
        // }
        return view('includes/menubarProfesorAdmin', ['includeRoute' => 'profesor_admin.creacionAula', 'optionIndex' => 4, 'niveles' => $niveles, 'secciones' => $secciones, 'grados' => $grados, 'aulas' => $aulas ]);
    }

    function actualizar_seccion_alumno(Request $request) {
        try {
            $aula = tb_classroom::find($request->id_classroom);
            $alumno = tb_user::find($request->id_alumno);
            $alumno->id_classroom = $request->id_classroom;
            $alumno->id_section = $aula->id_section;
            $alumno->save();
            return response()->json(['type' => 'success', 'message' => 'update successful'], 200);
        } catch(\Excepcion $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
        
    }

    function actualizar_seccion_profesor(Request $request) {
        try {

            $aula = tb_classroom::find($request->id_aula);
            $aula->id_teacher = $request->id_profesor;
            $aula->save();

            return response()->json(['type' => 'success', 'message' => 'update successful'], 200);
        } catch(\Excepcion $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
        
    }

    function crear_profesor(Request $request) {
        try {

            $admin = tb_user::find(Auth::guard('profesor_admin')->id());

            $user = new tb_user;
            $user->first_name = trim($request->get('first_name'));
            $user->last_name = trim($request->get('last_name'));
            $user->email = trim($request->get('email'));
            $user->dni = trim($request->get('dni'));
            $user->id_avatar = (int) $request->get('gender');
            $user->id_gender = (int) $request->get('gender');
            if((int) $request->get('gender') == 1) {
                $user->id_avatar = 1;
            } else {
                $user->id_avatar = 2;
            }
            $user->id_rol = 1;
            $username = strtolower(substr(trim($request->get('first_name')),0,1).explode(' ', trim($request->get('last_name')))[0].rand(100000, 999999));
            $user->username = $username;
            $user->password = Hash::make(trim($request->get('dni')));
            $user->id_school = $admin->id_school;
            $user->id_state = 1;
            $user->save();

            return redirect()->back()->with('status_success', 'success');
            //return response()->json(['type' => 'success', 'message' => 'update successful'], 200);
        } catch(\Excepcion $e) {
            return redirect()->back()->with('status_error', 'error');
            //return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
        
    }

    function crear_aula(Request $request) {
        try {

            $admin = tb_user::find(Auth::guard('profesor_admin')->id());
            $aula = tb_classroom::where('id_section', (int) $request->get('section'))->where('id_grade', (int) $request->get('grade'))->where('id_level', (int) $request->get('level'))->get();

            if(count($aula) == 0) {
                $aula = new tb_classroom;
                $aula->id_grade = (int) $request->get('grade');
                $aula->id_level = (int) $request->get('level');
                $aula->id_section = (int) $request->get('section');
                $aula->id_school = (int) $admin->id_school;
                $aula->id_state = (int) 3;
                $aula->save();
                
                return redirect()->back()->with('status_success', 'success');
            }
            return redirect()->back()->with('status_warning', 'warning');
            //return response()->json(['type' => 'success', 'message' => 'update successful'], 200);
        } catch(\Excepcion $e) {
            return redirect()->back()->with('status_error', 'error');
            //return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
        
    }



}
