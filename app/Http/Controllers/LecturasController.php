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
        $lecturas = tb_reading::where('id_lecturama', $lecturama->id_lecturama)->where('id_state', 3)->get();

        return view('includes/menubaralternate', ['includeRoute' => 'alumno.libros', 'title' => 'Mis libros y lecturas', 'subtitle' => 'Selecciona el libro de tu preferencia', 'optionIndex' => 1, 'lecturas' => $lecturas, 'alumno' => $alumno, 'type' => 'libros']);
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

        return view('includes/menubaralternate', ['includeRoute' => 'alumno.VideoTxt.eva1', 'title' => $lectura->video_title, 'optionIndex' => 1,'lectura' => $lectura, 'preguntas' => $preguntas, 'alumno' => $alumno, ]);
    }

    function video_preguntas2($id) {

        $lectura = tb_reading::find($id);
        $alumno = tb_user::find(Auth::guard('usuario')->id());

        $preguntas = tb_reading::find($id)->questions()->where('id_question_level', '1')->where('source', 'video')->get();

        foreach($preguntas as $pregunta) {
            $pregunta->answers = tb_answer::where('id_question', $pregunta->id_question)->get();
            $answer_completed = tb_results::where('id_user', Auth::guard('usuario')->id())->where('id_question', $pregunta->id_question)->first();
            if($answer_completed){
                $pregunta->answer_completed = $answer_completed;
            }else{
                $pregunta->answer_completed = null;
            }
        }
        //dd($preguntas);

        return view('includes/menubaralternate', ['includeRoute' => 'alumno.VideoTxt.eva2', 'title' => $lectura->video_title, 'optionIndex' => 1,'lectura' => $lectura, 'preguntas' => $preguntas, 'alumno' => $alumno]);
    }

    function video_preguntas3($id) {

        $lectura = tb_reading::find($id);
        $alumno = tb_user::find(Auth::guard('usuario')->id());

        $preguntas = tb_reading::find($id)->questions()->where('id_question_level', '2')->where('source', 'video')->get();

        foreach($preguntas as $pregunta) {
            $pregunta->answers = tb_answer::where('id_question', $pregunta->id_question)->get();
        }

        return view('includes/menubaralternate', ['includeRoute' => 'alumno.VideoTxt.eva3', 'title' => $lectura->video_title, 'optionIndex' => 1,'lectura' => $lectura, 'preguntas' => $preguntas, 'alumno' => $alumno]);
    }

    function video_preguntas4($id) {
        
        $alumno = tb_user::find(Auth::guard('usuario')->id());

        $lectura = tb_reading::find($id);
        $preguntas = tb_reading::find($id)->questions()->where('id_question_level', '3')->where('source', 'video')->get();

        foreach($preguntas as $pregunta) {
            $pregunta->answers = tb_answer::where('id_question', $pregunta->id_question)->get();
        }

        return view('includes/menubaralternate', ['includeRoute' => 'alumno.VideoTxt.eva4', 'title' => $lectura->video_title, 'optionIndex' => 1,'lectura' => $lectura, 'preguntas' => $preguntas, 'alumno' => $alumno]);
    }


    function lecturas($id_reading) {

        $alumno = tb_user::find(Auth::guard('usuario')->id());

        return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.lecturas', 'AlternativeBackground' => "1", 'optionIndex' => 1, 'alumno' => $alumno]);
    }

    function texto_preguntas1($id_reading) {

        $alumno = tb_user::find(Auth::guard('usuario')->id());

        $lectura = tb_reading::find($id_reading);
        $preguntas = tb_reading::find($id_reading)->questions()->where('id_question_level', '1')->where('source', 'texto')->get();

        foreach($preguntas as $pregunta) {
            $pregunta->answers = tb_answer::where('id_question', $pregunta->id_question)->get();
        }

       

        return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.eva1', 'title' => $lectura->video_title, 'optionIndex' => 1, 'alumno' => $alumno, 'preguntas' => $preguntas, 'alumno' => $alumno]);
    }
    function texto_preguntas2($id_reading) {

        $alumno = tb_user::find(Auth::guard('usuario')->id());

        $lectura = tb_reading::find($id_reading);
        $preguntas = tb_reading::find($id_reading)->questions()->where('id_question_level', '2')->where('source', 'texto')->get();

        foreach($preguntas as $pregunta) {
            $pregunta->answers = tb_answer::where('id_question', $pregunta->id_question)->get();
            // $answer_completed = tb_answers::where('id_user', Auth::guard('usuario')->id())->where('id_question', $pregunta->id_question)->first();
            // if($answer_completed){
            //     $pregunta->answer_completed = $answer_completed;
            // }else{
            //     $pregunta->answer_completed = null;
            // }
        }
        //dd($preguntas);
        return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.eva2', 'title' => $lectura->video_title, 'optionIndex' => 1, 'alumno' => $alumno, 'preguntas' => $preguntas, 'alumno' => $alumno]);
    }
    function texto_preguntas3($id_reading) {

        $alumno = tb_user::find(Auth::guard('usuario')->id());

        $lectura = tb_reading::find($id_reading);
        $preguntas = tb_reading::find($id_reading)->questions()->where('id_question_level', '3')->where('source', 'texto')->get();

        foreach($preguntas as $pregunta) {
            $pregunta->answers = tb_answer::where('id_question', $pregunta->id_question)->get();
        }

        
        return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.eva3', 'title' => $lectura->video_title, 'optionIndex' => 1, 'alumno' => $alumno, 'preguntas' => $preguntas, 'alumno' => $alumno]);
    }

    function texto_preguntas4($id_reading) {

        $alumno = tb_user::find(Auth::guard('usuario')->id());

        $lectura = tb_reading::find($id_reading);
        $preguntas = tb_reading::find($id_reading)->questions()->where('id_question_level', '4')->where('source', 'texto')->get();

        foreach($preguntas as $pregunta) {
            $pregunta->answers = tb_answer::where('id_question', $pregunta->id_question)->get();
        }

        return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.eva4', 'title' => $lectura->video_title, 'optionIndex' => 1, 'alumno' => $alumno, 'preguntas' => $preguntas, 'alumno' => $alumno]);
    }
    
    function texto_preguntas5($id_reading) {

        $alumno = tb_user::find(Auth::guard('usuario')->id());
        $lectura = tb_reading::find($id_reading);

        $pregunta_final = tb_reading::find($id_reading)->questions()->where('id_question_level', '5')->where('source', 'final')->first();

        return view('includes/menubaralternate', ['includeRoute' => 'alumno.LecturaTxt.eva5', 'title' => $lectura->video_title, 'optionIndex' => 1, 'alumno' => $alumno, 'pregunta_final' => $pregunta_final]);
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
        try {
            $respuestas = explode(",", $request->answers);
            $preguntas = explode(",", $request->questions);
            foreach($respuestas as $index => $respuesta) {
                $results_prev = tb_results::where('id_user', Auth::guard('usuario')->id())->where('id_question', $preguntas[$index])->get();
                if(count($results_prev) != 1) {
                    $results = new tb_results;
                    $results->id_user = Auth::guard('usuario')->id();
                    $results->id_answer = $respuesta;
                    $results->create_date = Carbon::now()->isoFormat('YYYY-MM-DD');
                    $results->id_question = $preguntas[$index];
                    $results->save();
                }
            }
            return response()->json(['type' => 'success', 'message' => $preguntas], 200);
        } catch(\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    function guardar_preguntas_bloque3(Request $request) {

    }

    function guardar_preguntas_bloque4(Request $request) {

    }

    function guardar_preguntas_bloque5(Request $request) {
        try {

            $results_prev = tb_results::where('id_user', Auth::guard('usuario')->id())->where('id_question', (int) $request->file('id_question'))->get();
            if(count($results_prev) != 1) {
                $path = Storage::disk('archivos_alumnos_p_final')->putFile('pregunta_final', $request->file('custom_file'));

                $results = new tb_results;
                $results->id_user = Auth::guard('usuario')->id();
                $results->file = $path;
                $results->create_date = Carbon::now()->isoFormat('YYYY-MM-DD');
                $results->id_question = (int) $request->get('id_question');
                $results->save();
            }

            return response()->json(['status_code' => 200, 'message' => 'file saved'], 200);
        } catch (Exception $error) {
            return response()->json(['status_code' => 500, 'message' => 'Error', 'error' => $error], 500);
        }
    }

}
