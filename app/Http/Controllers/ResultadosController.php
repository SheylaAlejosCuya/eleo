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

class ResultadosController extends Controller
{
    
    function resultados() {
        $alumno = Auth::guard('alumno')->user();       
        return view('includes/menubaralternate', ['includeRoute' => 'alumno.resultados', 'title' => 'Mis resultados', 'subtitle' => 'Selecciona la categoría de tu preferencia', 'optionIndex' => 4, 'alumno' => $alumno]);
    }

    function resultados_estudio() {
        $alumno = Auth::guard('alumno')->user();
        //$results = tb_results::where('id_user', Auth::guard('usuario')->id())->get();
        $questions_b1 = tb_question::where('type', 'closed')->where('id_state', 3)->where('id_block', 1)->get();
        $questions_b2 = tb_question::where('type', 'closed')->where('id_state', 3)->where('id_block', 2)->get();
        $questions_b3 = tb_question::where('type', 'closed')->where('id_state', 3)->where('id_block', 3)->get();

        $check_questions_b1_points_literal = [];
        $check_questions_b1_points_inferencial = [];
        $check_questions_b1_points_valorativo = [];

        $test_array = [];

        foreach ($questions_b1 as $key => $question_b1) {

            $result = tb_results::where('id_user', Auth::guard('alumno')->id())->where('id_question', $question_b1->id_question)->first();
            
            if($result) {
                
                $check = tb_answer::find($result->id_answer);

                if($key == 0 || $key == 1) {
                    if($check->correct == "true"){
                        array_push($check_questions_b1_points_literal, 1);
                    }else{
                        array_push($check_questions_b1_points_literal, 0);
                    }
                }

                if($key == 2 || $key == 3) {
                    if($check->correct == "true"){
                        array_push($check_questions_b1_points_inferencial, 2);
                    }else{
                        array_push($check_questions_b1_points_inferencial, 0);
                    }
                }
    
                if($key == 4 || $key == 5) {
                    if($check->correct == "true"){
                        array_push($check_questions_b1_points_valorativo, 2);
                    }else{
                        array_push($check_questions_b1_points_valorativo, 0);
                    }
                }

            } else {

                if($key == 0 || $key == 1) {
                    array_push($check_questions_b1_points_literal, 0);
                }
                
                if($key == 2 || $key == 3) {
                    array_push($check_questions_b1_points_inferencial, 0);
                }

                if($key == 4 || $key == 5) {
                    array_push($check_questions_b1_points_valorativo, 0);
                }

            }

        }

        $check_questions_b2_points_literal = [];
        $check_questions_b2_points_inferencial = [];
        $check_questions_b2_points_valorativo = [];
        $check_questions_b2_points_intertextual = [];

        foreach ($questions_b2 as $key => $question_b2) {
            
            $result = tb_results::where('id_user', Auth::guard('alumno')->id())->where('id_question', $question_b2->id_question)->first();
            
            if($result) {
                
                $check = tb_answer::find($result->id_answer);

                if($key == 0 || $key == 1 || $key == 2 ) {
                    if($check->correct == "true"){
                        array_push($check_questions_b2_points_literal, 0.66);
                    }else{
                        array_push($check_questions_b1_points_literal, 0);
                    }
                }
    
                if($key == 3 || $key == 4 || $key == 5 || $key == 6 || $key == 7) {
                    if($check->correct == "true"){
                        array_push($check_questions_b2_points_inferencial, 0.6);
                    }else{
                        array_push($check_questions_b2_points_inferencial, 0);
                    }
                }
    
                if($key == 8 || $key == 9 || $key == 10 || $key == 11) {
                    if($check->correct == "true"){
                        array_push($check_questions_b2_points_valorativo, 0.75);
                    }else{
                        array_push($check_questions_b2_points_valorativo, 0);
                    }
                }
    
                if($key == 12 || $key == 13) {
                    if($check->correct == "true"){
                        array_push($check_questions_b2_points_intertextual, 1);
                    }else{
                        array_push($check_questions_b2_points_intertextual, 0);
                    }
                }

            } else {

                if($key == 0 || $key == 1 || $key == 2 ) {
                    array_push($check_questions_b1_points_literal, 0);
                }
    
                if($key == 3 || $key == 4 || $key == 5 || $key == 6 || $key == 7) {
                    array_push($check_questions_b2_points_inferencial, 0);
                }
    
                if($key == 8 || $key == 9 || $key == 10 || $key == 11) {
                    array_push($check_questions_b2_points_valorativo, 0);
                }
    
                if($key == 12 || $key == 13) {
                    array_push($check_questions_b2_points_intertextual, 0);
                }

            }
            
        }

        //dd($test_array);

        $aresults = [
            [
                'title' => 'Nivel Literal',
                'percent' => (array_sum($check_questions_b1_points_literal) * 100)/2
            ],
            [
                'title' => 'Nivel Inferencial',
                'percent' => (array_sum($check_questions_b1_points_inferencial) * 100)/4
            ],
            [
                'title' => 'Nivel Crítico Valorativo',
                'percent' => (array_sum($check_questions_b1_points_valorativo) * 100)/4
            ]
        ];

        $lresults = [
            [
                'title' => 'Nivel Literal',
                'percent' => (round(array_sum($check_questions_b2_points_literal), 0) * 100) / 2 
            ],
            [
                'title' => 'Nivel Inferencial',
                'percent' => (array_sum($check_questions_b2_points_inferencial) * 100) / 3
            ],
            [
                'title' => 'Nivel Crítico Valorativo',
                'percent' => (array_sum($check_questions_b2_points_valorativo) * 100) / 3
            ],
            [
                'title' => 'Nivel Intertextual',
                'percent' => (array_sum($check_questions_b2_points_intertextual) * 100) / 2
            ]
        ];

        $tresults = [
            [
                'title' => 'Producción Escrita (Rúbrica de Producción escrita)',
                'percent' => 0
            ],
            [
                'title' => 'Producción Oral (Rúbrica de Producción oral)',
                'percent' => 0
            ]
        ];
        return view('includes/menubaralternate', ['includeRoute' => 'alumno.lecturaEstudio', 'title' => 'Lecturas de estudio', 'aresults' => $aresults, 'lresults' => $lresults, 'tresults' => $tresults, 'optionIndex' => 4, 'alumno' => $alumno]);
    }

}
