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
use App\Models\tb_question;
use App\Models\tb_answer;
use App\Models\tb_results;

class LecturasController extends Controller
{
    function libros() {

        $alumno = Auth::guard('usuario')->user();
        $lecturama = tb_lecturama::where('id_grade', $alumno->id_grade)->where('id_level', $alumno->id_level)->first();
        $lecturas = tb_reading::where('id_lecturama', $lecturama->id_lecturama)->get();

        return view('includes/menubaralternate', ['includeRoute' => 'alumno.libros', 'title' => 'Mis libros y lecturas', 'subtitle' => 'Selecciona el libro de tu preferencia', 'optionIndex' => 1, 'lecturas' => $lecturas, 'alumno' => $alumno, 'desafio' => false]);
    }

    function libros_video($id) {

        $lectura = tb_reading::find($id);
        $alumno = tb_user::find(Auth::guard('usuario')->id());

        if((int) $lectura->id_state == 4) {
            return redirect()->back()->with('status', 'La lectura seleccionada se encuentra deshabilitada');
        }
        return view('includes/menubaralternate', ['includeRoute' => 'alumno.tutorialesVideo', 'continue' => 'web_video_preguntas1', 'optionIndex' => 1, 'lectura' => $lectura, 'alumno' => $alumno]);
    }

    function video_preguntas1($id) {

        $lectura = tb_reading::find($id);
        $alumno = tb_user::find(Auth::guard('usuario')->id());

        $preguntas = tb_reading::find($id)->questions()->where('id_question_level', null)->get();

        foreach($preguntas as $pregunta) {
            $pregunta->answers = tb_answer::where('id_question', $pregunta->id_question)->get();
        }

        return view('includes/menubaralternate', ['includeRoute' => 'alumno.VideoTxt.eva1', 'title' => $lectura->video_title, 'optionIndex' => 1,'lectura' => $lectura, 'preguntas' => $preguntas, 'alumno' => $alumno]);
    }

    function video_preguntas2($id) {

        $lectura = tb_reading::find($id);
        $alumno = tb_user::find(Auth::guard('usuario')->id());

        $preguntas = tb_reading::find($id)->questions()->where('id_question_level', '1')->get();

        foreach($preguntas as $pregunta) {
            $pregunta->answers = tb_answer::where('id_question', $pregunta->id_question)->get();
        }

        return view('includes/menubaralternate', ['includeRoute' => 'alumno.VideoTxt.eva2', 'title' => $lectura->video_title, 'optionIndex' => 1,'lectura' => $lectura, 'preguntas' => $preguntas, 'alumno' => $alumno]);
    }

    function video_preguntas3($id) {

        $lectura = tb_reading::find($id);
        $alumno = tb_user::find(Auth::guard('usuario')->id());

        $preguntas = tb_reading::find($id)->questions()->where('id_question_level', '2')->get();

        foreach($preguntas as $pregunta) {
            $pregunta->answers = tb_answer::where('id_question', $pregunta->id_question)->get();
        }

        return view('includes/menubaralternate', ['includeRoute' => 'alumno.VideoTxt.eva3', 'title' => $lectura->video_title, 'optionIndex' => 1,'lectura' => $lectura, 'preguntas' => $preguntas, 'alumno' => $alumno]);
    }

    function video_preguntas4($id) {

        $lectura = tb_reading::find($id);
        $alumno = tb_user::find(Auth::guard('usuario')->id());

        $preguntas = tb_reading::find($id)->questions()->where('id_question_level', '3')->get();

        foreach($preguntas as $pregunta) {
            $pregunta->answers = tb_answer::where('id_question', $pregunta->id_question)->get();
        }

        return view('includes/menubaralternate', ['includeRoute' => 'alumno.VideoTxt.eva4', 'title' => $lectura->video_title, 'optionIndex' => 1,'lectura' => $lectura, 'preguntas' => $preguntas, 'alumno' => $alumno]);
    }


    function lecturas() {

        $alumno = tb_user::find(Auth::guard('usuario')->id());

        return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.lecturas', 'AlternativeBackground' => "1", 'optionIndex' => 1, 'alumno' => $alumno]);
    }

    function preguntas1() {

        $alumno = tb_user::find(Auth::guard('usuario')->id());
        return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.eva1', 'title' => 'La momificación en el antiguo Egipto', 'optionIndex' => 1, 'alumno' => $alumno]);
    }
    function preguntas2() {

        $alumno = tb_user::find(Auth::guard('usuario')->id());
        return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.eva2', 'title' => 'La momificación en el antiguo Egipto', 'optionIndex' => 1, 'alumno' => $alumno]);
    }
    function preguntas3() {

        $alumno = tb_user::find(Auth::guard('usuario')->id());
        return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.eva3', 'title' => 'La momificación en el antiguo Egipto', 'optionIndex' => 1, 'alumno' => $alumno]);
    }
    function preguntas4() {

        $alumno = tb_user::find(Auth::guard('usuario')->id());
        return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.eva4', 'title' => 'La momificación en el antiguo Egipto', 'optionIndex' => 1, 'alumno' => $alumno]);
    }
    function preguntas5() {

        $alumno = tb_user::find(Auth::guard('usuario')->id());
        return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.eva5', 'title' => 'La momificación en el antiguo Egipto', 'optionIndex' => 1, 'alumno' => $alumno]);
    }

    function guardar_preguntas_bloque1(Request $request) {
        try {
            
            $respuestas = explode(",", $request->questions);
            foreach($respuestas as $respuesta) {
                $results = new tb_results;
                $results->id_user = Auth::guard('usuario')->id();
                $results->free_answer = $respuesta;
                $results->create_date = Carbon::now()->isoFormat('YYYY-MM-DD');
                $results->save();
            }
            
            return response()->json($respuestas, 200);

        } catch(\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    function guardar_preguntas_bloque2(Request $request) {

    }

    function guardar_preguntas_bloque3(Request $request) {

    }

    function guardar_preguntas_bloque4(Request $request) {

    }

}
