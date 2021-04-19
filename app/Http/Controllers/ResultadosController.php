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
use App\Models\tb_classroom;
use App\Models\tb_assignment_reading;

class ResultadosController extends Controller
{
    
    function resultados() {
        $alumno = Auth::guard('alumno')->user();       
        return view('includes/menubaralternate', ['includeRoute' => 'alumno.resultados', 'title' => 'Mis resultados', 'subtitle' => 'Selecciona la categoría de tu preferencia', 'optionIndex' => 4, 'alumno' => $alumno]);
    }

    function resultados_estudio() {
        $alumno = Auth::guard('alumno')->user();
        
        $lecturas_asignadas = tb_assignment_reading::where('id_state', 3)->with('reading')->where('id_classroom', $alumno->id_classroom)->get();

        $check_questions_b1_points_literal_general = [];
        $check_questions_b1_points_inferencial_general = [];
        $check_questions_b1_points_valorativo_general = [];

        $check_questions_b2_points_literal_general = [];
        $check_questions_b2_points_inferencial_general = [];
        $check_questions_b2_points_valorativo_general = [];
        $check_questions_b2_points_intertextual_general = [];

        $nro = count($lecturas_asignadas);

        if($nro == 0){
            $nro = 1;
        }
       
        foreach ($lecturas_asignadas as $key_lectura_a => $lecturas_asignada) {
            
            $questions_b1 = tb_question::where('type', 'closed')->where('id_state', 3)->where('id_question_level', 1)->where('id_block', 1)->where('id_reading', $lecturas_asignada->reading->id_reading)->get();
            $questions_b2 = tb_question::where('type', 'closed')->where('id_state', 3)->where('id_question_level', 2)->where('id_block', 1)->where('id_reading', $lecturas_asignada->reading->id_reading)->get();
            $questions_b3 = tb_question::where('type', 'closed')->where('id_state', 3)->where('id_question_level', 3)->where('id_block', 1)->where('id_reading', $lecturas_asignada->reading->id_reading)->get();

            $check_questions_b1_points_literal = [];
            $check_questions_b1_points_inferencial = [];
            $check_questions_b1_points_valorativo = [];

            $num_q_v1 = count($questions_b1);
            //Max. puntos bloque 1 -> 2
            $points_q_b1 = 2 / $num_q_v1;

            foreach ($questions_b1 as $key => $question_b1) {

                $result = tb_results::where('id_user', Auth::guard('alumno')->id())->where('id_question', $question_b1->id_question)->first();
                
                if($result) {
                    $check = tb_answer::find($result->id_answer);
                    if($check->correct == "true"){
                        array_push($check_questions_b1_points_literal, $points_q_b1);
                    }else{
                        array_push($check_questions_b1_points_literal, 0);
                    }
                } else {
                    array_push($check_questions_b1_points_literal, 0);
                }
            }

            $num_q_v2 = count($questions_b2);
            //Max. puntos bloque 2 -> 4
            $points_q_b2 = 4 / $num_q_v2;

            foreach ($questions_b2 as $key => $question_b2) {

                $result = tb_results::where('id_user', Auth::guard('alumno')->id())->where('id_question', $question_b2->id_question)->first();
                
                if($result) {
                    $check = tb_answer::find($result->id_answer);
                    if($check->correct == "true"){
                        array_push($check_questions_b1_points_inferencial, $points_q_b2);
                    }else{
                        array_push($check_questions_b1_points_inferencial, 0);
                    }
                } else {
                    array_push($check_questions_b1_points_inferencial, 0);
                }
            }

            $num_q_v3 = count($questions_b3);
            //Max. puntos bloque 2 -> 4
            $points_q_b3 = 4 / $num_q_v3;

            foreach ($questions_b3 as $key => $question_b3) {

                $result = tb_results::where('id_user', Auth::guard('alumno')->id())->where('id_question', $question_b3->id_question)->first();
                
                if($result) {
                    $check = tb_answer::find($result->id_answer);
                    if($check->correct == "true"){
                        array_push($check_questions_b1_points_valorativo, $points_q_b3);
                    }else{
                        array_push($check_questions_b1_points_valorativo, 0);
                    }
                } else {
                    array_push($check_questions_b1_points_valorativo, 0);
                }
            }

            $questions_b4 = tb_question::where('type', 'closed')->where('id_state', 3)->where('id_question_level', 1)->where('id_block', 2)->where('id_reading', $lecturas_asignada->reading->id_reading)->get();
            $questions_b5 = tb_question::where('type', 'closed')->where('id_state', 3)->where('id_question_level', 2)->where('id_block', 2)->where('id_reading', $lecturas_asignada->reading->id_reading)->get();
            $questions_b6 = tb_question::where('type', 'closed')->where('id_state', 3)->where('id_question_level', 3)->where('id_block', 2)->where('id_reading', $lecturas_asignada->reading->id_reading)->get();
            $questions_b7 = tb_question::where('type', 'closed')->where('id_state', 3)->where('id_question_level', 4)->where('id_block', 2)->where('id_reading', $lecturas_asignada->reading->id_reading)->get();

            $check_questions_b2_points_literal = [];
            $check_questions_b2_points_inferencial = [];
            $check_questions_b2_points_valorativo = [];
            $check_questions_b2_points_intertextual = [];


            $num_q_v4 = count($questions_b4);
            //Max. puntos bloque 1 -> 2
            $points_q_b4 = 2 / $num_q_v4;

            foreach ($questions_b4 as $key => $question_b4) {

                $result = tb_results::where('id_user', Auth::guard('alumno')->id())->where('id_question', $question_b4->id_question)->first();
                
                if($result) {
                    $check = tb_answer::find($result->id_answer);
                    if($check->correct == "true"){
                        array_push($check_questions_b2_points_literal, $points_q_b4);
                    }else{
                        array_push($check_questions_b2_points_literal, 0);
                    }
                } else {
                    array_push($check_questions_b2_points_literal, 0);
                }
            }

            $num_q_v5 = count($questions_b5);
            $suma_total_q_v5 = 0;
            //Max. puntos bloque 1 -> 2
            $points_q_b5 = 0;
            if($alumno->id_level == 1) {
                $points_q_b5 = 4 / $num_q_v5;
                $suma_total_q_v5 = 4;
            } else {
                $points_q_b5 = 3 / $num_q_v5;
                $suma_total_q_v5 = 3;
            }
            

            foreach ($questions_b5 as $key => $question_b5) {

                $result = tb_results::where('id_user', Auth::guard('alumno')->id())->where('id_question', $question_b5->id_question)->first();
                
                if($result) {
                    $check = tb_answer::find($result->id_answer);
                    if($check->correct == "true"){
                        array_push($check_questions_b2_points_inferencial, $points_q_b5);
                    }else{
                        array_push($check_questions_b2_points_inferencial, 0);
                    }
                } else {
                    array_push($check_questions_b2_points_inferencial, 0);
                }
            }

            $num_q_v6 = count($questions_b6);
            $suma_total_q_v6 = 0;
            //Max. puntos bloque 1 -> 2
            $points_q_b6 = 0;
            if($alumno->id_level == 1) {
                $points_q_b6 = 4 / $num_q_v6;
                $suma_total_q_v6 = 4;
            } else {
                $points_q_b6 = 3 / $num_q_v6;
                $suma_total_q_v6 = 3;
            }

            foreach ($questions_b6 as $key => $question_b6) {

                $result = tb_results::where('id_user', Auth::guard('alumno')->id())->where('id_question', $question_b6->id_question)->first();
                
                if($result) {
                    $check = tb_answer::find($result->id_answer);
                    if($check->correct == "true"){
                        array_push($check_questions_b2_points_valorativo, $points_q_b6);
                    }else{
                        array_push($check_questions_b2_points_valorativo, 0);
                    }
                } else {
                    array_push($check_questions_b2_points_valorativo, 0);
                }
            }


            $num_q_v7 = count($questions_b7);
            //Max. puntos bloque 1 -> 2
            $points_q_b7 = 0;
            if($alumno->id_level == 1) {
                $points_q_b7 = 0;
                $num_q_v7 = 1;
            } else {
                $points_q_b7 = 2 / $num_q_v7;
            }

            foreach ($questions_b7 as $key => $question_b7) {

                $result = tb_results::where('id_user', Auth::guard('alumno')->id())->where('id_question', $question_b7->id_question)->first();
                
                if($result) {
                    $check = tb_answer::find($result->id_answer);
                    if($check->correct == "true"){
                        array_push($check_questions_b2_points_intertextual, $points_q_b7);
                    }else{
                        array_push($check_questions_b2_points_intertextual, 0);
                    }
                } else {
                    array_push($check_questions_b2_points_intertextual, 0);
                }
            }
            
            array_push($check_questions_b1_points_literal_general, ((round(array_sum($check_questions_b1_points_literal),0) * 100) / 2));
            array_push($check_questions_b1_points_inferencial_general, ((round(array_sum($check_questions_b1_points_inferencial),0) * 100) / 4));
            //dd($num_q_v2);
            array_push($check_questions_b1_points_valorativo_general, ((round(array_sum($check_questions_b1_points_valorativo),0) * 100) / 4));

            array_push($check_questions_b2_points_literal_general, ((round(array_sum($check_questions_b2_points_literal), 0) * 100) / 2 ));
            array_push($check_questions_b2_points_inferencial_general, ((round(array_sum($check_questions_b2_points_inferencial),0) * 100) / $suma_total_q_v5));
            array_push($check_questions_b2_points_valorativo_general, ((round(array_sum($check_questions_b2_points_valorativo),0) * 100) / $suma_total_q_v6));
            array_push($check_questions_b2_points_intertextual_general, ((round(array_sum($check_questions_b2_points_intertextual),0) * 100) / 2));
        
        }

        $aresults = [
            [
                'title' => 'Nivel Literal',
                'percent' => (array_sum($check_questions_b1_points_literal_general))/ $nro
            ],
            [
                'title' => 'Nivel Inferencial',
                'percent' => (array_sum($check_questions_b1_points_inferencial_general))/ $nro
            ],
            [
                'title' => 'Nivel Crítico Valorativo',
                'percent' => (array_sum($check_questions_b1_points_valorativo_general))/ $nro
            ]
        ];

        $lresults = [
            [
                'title' => 'Nivel Literal',
                'percent' => (round(array_sum($check_questions_b2_points_literal_general), 0)) / $nro 
            ],
            [
                'title' => 'Nivel Inferencial',
                'percent' => (array_sum($check_questions_b2_points_inferencial_general)) / $nro
            ],
            [
                'title' => 'Nivel Crítico Valorativo',
                'percent' => (array_sum($check_questions_b2_points_valorativo_general)) / $nro
            ],
            [
                'title' => 'Nivel Intertextual',
                'percent' => (array_sum($check_questions_b2_points_intertextual_general)) / $nro
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
