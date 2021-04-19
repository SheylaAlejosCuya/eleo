<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response as Download;
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
use App\Models\tb_question;
use App\Models\tb_classroom;
use App\Models\tb_assignment_reading;

class ProfesorController extends Controller
{
    
    function inicio() {
        $profesor = tb_user::find(Auth::guard('profesor')->id());
        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.inicio', 'AlternativeBackground' => "1", 'optionIndex' => 0, 'profesor' => $profesor]);
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

    function descargar_doc($id_reading) {
        try {

            $lectura = tb_reading::find((int) $id_reading);
            $lecturama = tb_lecturama::find((int) $lectura->id_lecturama);
            $pregunta = tb_question::where('id_reading', $lectura->id_reading)->where('id_block', 3)->where('id_question_level', 5)->where('source', 'final')->first();

            if($pregunta) {
                $file = Storage::disk('s3')->get('/actividades_produccion/'.$lecturama->s_name.'/'.$pregunta->final_resource);

                $headers = [
                    'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 
                    'Content-Description' => 'File Transfer',
                    'Content-Disposition' => "attachment; filename=".$pregunta->final_resource,
                    'filename'=> $pregunta->final_resource
                ];

                return response($file, 200, $headers);
            }
            return redirect()->back()->with('status_not_enable', 'error');;

        } catch (Exception $error) {

            return redirect()->back()->with('status_not_enable', 'error');;
        }
    }

    function asignacion_lecturas(Request $request) {
        try {
            $salones = explode(",", $request->classrooms);
            foreach ($salones as $key => $salon) {

                $check_asignacion = tb_assignment_reading::where('id_reading', $request->id_reading)->where('id_classroom', $salon)->first();
                
                if($check_asignacion == null){
                    $asignacion= new tb_assignment_reading();
                    $asignacion->id_reading = $request->id_reading;
                    $asignacion->id_classroom = $salon;
                    $asignacion->id_state = 3;
                    $asignacion->save();
                }
            }
            return response()->json(['type' => 'success', 'message' => $check_asignacion], 200);
        } catch(\Excepcion $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    function resultados()
    {
        $profesor = tb_user::find(Auth::guard('profesor')->id());
        $aulas = tb_classroom::where('id_teacher', $profesor->id_user)->with('grade')->with('section')->with('level')->with('teacher')->get();

        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.lecturas.aulas', 'subtitle' => 'Selecciona el aula de tu preferencia', 'optionIndex' => 5, 'aulas' => $aulas]);
    }

    function resultados_aulas($id_classroom)
    {
        $profesor = tb_user::find(Auth::guard('profesor')->id());

        $aula = tb_classroom::where('id_state', 3)->find($id_classroom);
        //$salones = tb_classroom::where('id_teacher', $profesor->id_user)->get();

        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.lecturas.opciones', 'subtitle' => 'Selecciona la categoría de tu preferencia', 'optionIndex' => 5, 'aula' => $aula]);
    }

    function resultados_alumnos($id_classroom)
    {
        $profesor = tb_user::find(Auth::guard('profesor')->id());

        $aulas = tb_classroom::where('id_teacher', $profesor->id_user)->where('id_state', 3)->get();
        $salones = tb_classroom::where('id_teacher', $profesor->id_user)->get();

        $data = [
            [
                'url' => "./perfilAlumno/1",
                'nombre' => 'Jaimito' 
            ],
            [
                'url' => "./perfilAlumno/2",
                'nombre' => 'Jaimito' 
            ],
            [
                'url' => "./perfilAlumno/3",
                'nombre' => 'Jaimito' 
            ],
            [
                'url' => "./perfilAlumno/1",
                'nombre' => 'Jaimito' 
            ]
        ];
        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.lecturas.alumnos', 'data' => $data,'title' => 'Perfil del alumno','subtitle' => 'Selecciona el perfil que deseas consultar', 'optionIndex' => 5]);
    }

    function resultados_alumnos_test($id_classroom)
    {
        $profesor = tb_user::find(Auth::guard('profesor')->id());

        $aulas = tb_classroom::where('id_teacher', $profesor->id_user)->where('id_state', 3)->get();
        $salones = tb_classroom::where('id_teacher', $profesor->id_user)->get();

        $data = [
            [
                'url' => "./perfilAlumno/1",
                'nombre' => 'Jaimito' 
            ],
            [
                'url' => "./perfilAlumno/2",
                'nombre' => 'Jaimito' 
            ],
            [
                'url' => "./perfilAlumno/3",
                'nombre' => 'Jaimito' 
            ],
            [
                'url' => "./perfilAlumno/1",
                'nombre' => 'Jaimito' 
            ]
        ];
        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.lecturas.alumnos', 'data' => $data,'title' => 'Perfil del alumno','subtitle' => 'Selecciona el perfil que deseas consultar', 'optionIndex' => 5]);
    }
    
}
