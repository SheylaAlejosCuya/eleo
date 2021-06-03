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
use App\Models\tb_results;
use App\Models\tb_answer;
use App\Models\tb_rubric;
use App\Models\tb_rubric_type;
use App\Models\tb_rubric_criteria;
use App\Models\tb_scores_activities;

class ProfesorController extends Controller
{
    
    function inicio() {
        $profesor = tb_user::with('school')->find(Auth::guard('profesor')->id());
        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.inicio', 'AlternativeBackground' => "0", 'optionIndex' => 0, 'profesor' => $profesor]);
    }

    function perfil() {
        $profesor = tb_user::with('school')->find(Auth::guard('profesor')->id());
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
            $profesor = tb_user::find(Auth::guard('profesor')->id());

            $path = Storage::disk('s3')->putFileAs('/avatars_profesores/institucion_id_'.$profesor->id_school.'/profesor_id_'.$profesor->id_user, $request->file('foto'), 'avatar_date_'.Carbon::now()->isoFormat('YYYY_MM_DD_H_i_s').'.'.$request->file('foto')->extension());

            $profesor->photo = $path;
            $profesor->save();

            return response()->json(['status_code' => 200, 'message' => 'image saved', 'path'=>$path], 200);
        } catch (Exception $error) {
            return response()->json(['status_code' => 500, 'message' => 'Error', 'error' => $error], 500);
        }
    }

    function descargar_doc($id_reading) {
        try {

            $lectura = tb_reading::find((int) $id_reading);
            $lecturama = tb_lecturama::find((int) $lectura->id_lecturama);
            $pregunta = tb_question::where('id_reading', $lectura->id_reading)->where('id_block', 3)->where('id_question_level', 5)->where('source', 'FINAL')->first();

            //dd($pregunta);
            if($pregunta) {

                if($pregunta->final_resource != null && $pregunta->final_resource != '') {

                    //$file = Storage::disk('s3')->get('/actividades_produccion/'.$lecturama->s_name.'/'.$pregunta->final_resource);
                    file_put_contents($file, file_get_contents($pregunta->final_resource)))
                    $headers = [
                        'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 
                        'Content-Description' => 'File Transfer',
                        'Content-Disposition' => "attachment; filename=".$pregunta->final_resource,
                        'filename'=> $pregunta->final_resource
                    ];
    
                    return response($file, 200, $headers); 
                }
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
        $aula = tb_classroom::where('id_state', 3)->find($id_classroom);

        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.lecturas.opciones', 'subtitle' => 'Selecciona la categoría de tu preferencia', 'optionIndex' => 5, 'aula' => $aula]);
    }

    function resultados_alumnos($id_classroom)
    {
        $alumnos = tb_user::where('id_classroom', $id_classroom)->where('id_state', 1)->get();

        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.lecturas.alumnos', 'title' => 'Perfil del alumno','subtitle' => 'Selecciona el perfil que deseas consultar', 'optionIndex' => 5, 'alumnos'=>$alumnos]);
    }
    

    function actividades_produccion_alumno_profesor($id_classroom, $id_user, $id_reading) 
    {
        
        $alumno = tb_user::find($id_user);
        $rubricas = tb_rubric::where('id_level', $alumno->id_level)->where('id_grade', $alumno->id_grade)->get();

        $criterios_escritos = tb_rubric_criteria::where('id_rubric_type', 1)->with('criteria')->with('rubric_type')->get();
        $criterios_orales = tb_rubric_criteria::where('id_rubric_type', 2)->with('criteria')->with('rubric_type')->get();

        $puntuaciones_escritos = tb_scores_activities::where('id_user', $id_user)->where('id_reading', $id_reading)->where('id_rubric_type', 1)->orderBy('id_scores_activities')->get();
        $puntuaciones_orales = tb_scores_activities::where('id_user', $id_user)->where('id_reading', $id_reading)->where('id_rubric_type', 2)->orderBy('id_scores_activities')->get();

        $puntuacion_e = 0;
        $puntuacion_o = 0;

        if(count($puntuaciones_escritos) == 0) {
            $puntuaciones_escritos = null;
        }else{
            foreach ($puntuaciones_escritos as $key => $puntuacion_escrita) {
                $puntuacion_e = $puntuacion_e + $puntuacion_escrita->score;
            }
        }

        if(count($puntuaciones_orales) == 0) {
            $puntuaciones_orales = null;
        }else{
            foreach ($puntuaciones_orales as $key => $puntuacion_oral) {
                $puntuacion_o = $puntuacion_o + $puntuacion_oral->score;
            }
        }

        $lectura = tb_reading::find($id_reading);
        $pregunta_final = tb_question::where('id_reading', $id_reading)->where('id_question_level', '5')->where('source', 'final')->first();
        $respuesta_final = tb_results::where('id_question', $pregunta_final->id_question)->where('id_user', $id_user)->where('id_answer', 0)->first();

        $alumnoResults = [
            [
                'title' => 'Producción Escrita',
                'percent' => $puntuacion_e
            ],
            [
                'title' => 'Expresión Oral',
                'percent' => $puntuacion_o
            ]
        ];
        

        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.lecturas.ReporteActividades', 'title' => 'Actividad de Producción - '.$alumno->first_name.' '.$alumno->last_name, 'subtitle' => '', 'optionIndex' => 2, 'alumnoResults' => $alumnoResults, 'id_reading'=> $id_reading, 'alumno' => $alumno, 'rubricas' => $rubricas, 'puntuaciones_escritos' => $puntuaciones_escritos, 'puntuaciones_orales' => $puntuaciones_orales, 'criterios_escritos'=>$criterios_escritos, 'criterios_orales'=>$criterios_orales, 'respuesta_final'=>$respuesta_final]);
    }

    function resultados_alumno_detalle($id_classroom, $id_user)
    {
        $alumno = tb_user::find($id_user);

        //$aulas = tb_classroom::where('id_teacher', $profesor->id_user)->where('id_state', 3)->get();

        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.lecturas.reporteAlumno', 'title' => 'Reporte - '.$alumno->first_name.' '.$alumno->last_name, 'subtitle' => 'Selecciona la categoría', 'optionIndex' => 5, 'alumno' => $alumno]);
    }

    function resultados_alumno_detalle_actividades($id_classroom, $id_user)
    {
        $alumnoResults = [
            [
                'title' => 'Producción Escrita',
                'percent' => 50
            ],
            [
                'title' => 'Expresión Oral',
                'percent' => 100
            ]
        ];

        $alumno = tb_user::find($id_user);

        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.lecturas.ReporteActividades', 'title' => 'Reporte - '.$alumno->first_name.' '.$alumno->last_name, 'subtitle' => 'Selecciona la categoría', 'optionIndex' => 5, 'alumnoResults' => $alumnoResults, 'alumno' => $alumno ]);
    }

    function actividades_produccion_lecturas_profesor($id_classroom, $id_user) 
    {
        $alumno = tb_user::find($id_user);
        $lecturas_asignadas =tb_assignment_reading::where('id_classroom', $alumno->id_classroom)->with('reading')->get();

        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.eleccionLibro', 'subtitle' => 'Selecciona la lectura a evaluar', 'optionIndex' => 2, 'lecturas_asignadas'=>$lecturas_asignadas, 'alumno'=>$alumno]);
    }

    function resultados_alumno_detalle_promedios($id_classroom, $id_user)
    {

        $alumno = tb_user::find($id_user);
        
        $lecturas_asignadas = tb_assignment_reading::where('id_state', 3)->with('reading')->where('id_classroom', $alumno->id_classroom)->get();

        $check_questions_b1_points_literal_general = [];
        $check_questions_b1_points_inferencial_general = [];
        $check_questions_b1_points_valorativo_general = [];

        $check_questions_b2_points_literal_general = [];
        $check_questions_b2_points_inferencial_general = [];
        $check_questions_b2_points_valorativo_general = [];
        $check_questions_b2_points_intertextual_general = [];

        $check_questions_b3_points_produccion_escrita_general = [];
        $check_questions_b3_points_expresion_oral_general = [];

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

                $result = tb_results::where('id_user', $id_user)->where('id_question', $question_b1->id_question)->first();
                
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

                $result = tb_results::where('id_user', $id_user)->where('id_question', $question_b2->id_question)->first();
                
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

                $result = tb_results::where('id_user', $id_user)->where('id_question', $question_b3->id_question)->first();
                
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

                $result = tb_results::where('id_user', $id_user)->where('id_question', $question_b4->id_question)->first();
                
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

                $result = tb_results::where('id_user', $id_user)->where('id_question', $question_b5->id_question)->first();
                
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

                $result = tb_results::where('id_user', $id_user)->where('id_question', $question_b6->id_question)->first();
                
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

                $result = tb_results::where('id_user', $id_user)->where('id_question', $question_b7->id_question)->first();
                
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

            $puntuaciones_escritos = tb_scores_activities::where('id_user', $id_user)->where('id_reading', $lecturas_asignada->reading->id_reading)->where('id_rubric_type', 1)->orderBy('id_scores_activities')->get();
            $puntuaciones_orales = tb_scores_activities::where('id_user', $id_user)->where('id_reading', $lecturas_asignada->reading->id_reading)->where('id_rubric_type', 2)->orderBy('id_scores_activities')->get();
            
            $check_questions_b3_points_produccion_escrita = [];
            $check_questions_b3_points_expresion_oral = [];

            foreach ($puntuaciones_escritos as $key => $puntuacion_escrita) {
                array_push($check_questions_b3_points_produccion_escrita, (int) $puntuacion_escrita->score);
            }

            foreach ($puntuaciones_orales as $key => $puntuacion_oral) {
                array_push($check_questions_b3_points_expresion_oral, (int) $puntuacion_oral->score);
            }
            
            array_push($check_questions_b1_points_literal_general,      ((array_sum($check_questions_b1_points_literal)       * 100) / 2) );
            array_push($check_questions_b1_points_inferencial_general,  ((array_sum($check_questions_b1_points_inferencial)   * 100) / 4) );
            array_push($check_questions_b1_points_valorativo_general,   ((array_sum($check_questions_b1_points_valorativo)    * 100) / 4) );

            array_push($check_questions_b2_points_literal_general,      ((array_sum($check_questions_b2_points_literal)       * 100) / 2 ) );
            array_push($check_questions_b2_points_inferencial_general,  ((array_sum($check_questions_b2_points_inferencial)   * 100) / $suma_total_q_v5) );
            array_push($check_questions_b2_points_valorativo_general,   ((array_sum($check_questions_b2_points_valorativo)    * 100) / $suma_total_q_v6) );
            array_push($check_questions_b2_points_intertextual_general, ((array_sum($check_questions_b2_points_intertextual)  * 100) / 2) );

            array_push($check_questions_b3_points_produccion_escrita_general, round(((array_sum($check_questions_b3_points_produccion_escrita)  * 100) / 10), 0) );
            array_push($check_questions_b3_points_expresion_oral_general,     round(((array_sum($check_questions_b3_points_expresion_oral)      * 100) / 10), 0) );
        
        }

        $auditiva = [
            [
                'title' => 'Nivel Literal',
                'percent' => round((array_sum($check_questions_b1_points_literal_general))/ $nro, 0)
            ],
            [
                'title' => 'Nivel Inferencial',
                'percent' => round((array_sum($check_questions_b1_points_inferencial_general))/ $nro, 0)
            ],
            [
                'title' => 'Nivel Crítico Valorativo',
                'percent' => round((array_sum($check_questions_b1_points_valorativo_general))/ $nro, 0)
            ]
        ];

        $textos = [
            [
                'title' => 'Nivel Literal',
                'percent' => round((array_sum($check_questions_b2_points_literal_general)) / $nro, 0)
            ],
            [
                'title' => 'Nivel Inferencial',
                'percent' => round((array_sum($check_questions_b2_points_inferencial_general)) / $nro, 0)
            ],
            [
                'title' => 'Nivel Crítico Valorativo',
                'percent' => round((array_sum($check_questions_b2_points_valorativo_general)) / $nro, 0)
            ],
            [
                'title' => 'Nivel Intertextual',
                'percent' => round((array_sum($check_questions_b2_points_intertextual_general)) / $nro, 0)
            ]
        ];

        $alumnoResults = [
            [
                'title' => 'Producción Escrita',
                'percent' => round((array_sum($check_questions_b3_points_produccion_escrita_general)) / $nro, 0)
            ],
            [
                'title' => 'Expresión Oral',
                'percent' => round((array_sum($check_questions_b3_points_expresion_oral_general)) / $nro, 0)
            ]
        ];

        $alumno = tb_user::find($id_user);

        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.lecturas.promedioGeneral', 'title' => 'Reporte - '.$alumno->first_name.' '.$alumno->last_name,'subtitle' => 'Selecciona la categoría', 'optionIndex' => 5, 'textos' => $textos, 'auditiva' => $auditiva, 'alumnoResults'=>$alumnoResults]);
    }

    function resultados_alumno_detalle_evaluacion($id_classroom, $id_user)
    {
        $alumno = tb_user::find($id_user);
        //$aula = tb_classroom::find(tb_user::find($id_user)->id_classroom);

        $lecturas_asignadas =tb_assignment_reading::where('id_classroom', $alumno->id_classroom)->with('reading')->get();

        //$lecturas = tb_reading::where('id_lecturama', $id_lecturama)->where('id_state', 3)->get();

        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.eleccionLibro', 'subtitle' => 'Selecciona la lectura a evaluar', 'optionIndex' => 5, 'lecturas_asignadas'=>$lecturas_asignadas, 'alumno'=>$alumno]);
    }

    function actividades_produccion_profesor()
    {
        $profesor = tb_user::find(Auth::guard('profesor')->id());
        $aulas = tb_classroom::where('id_teacher', $profesor->id_user)->with('grade')->with('section')->with('level')->with('teacher')->get();

        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.lecturas.aulas', 'subtitle' => 'Selecciona el aula de tu preferencia', 'optionIndex' => 2, 'aulas' => $aulas]);
    }

    function actividades_produccion_aula_profesor($id_classroom) 
    {
        $alumnos = tb_user::where('id_classroom', $id_classroom)->where('id_state', 1)->get();

        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.lecturas.alumnos', 'title' => 'Perfil del alumno','subtitle' => 'Selecciona el perfil que deseas consultar', 'optionIndex' => 2, 'alumnos'=>$alumnos]);
    }


    function resultados_alumno_detalle_evaluacion_lib($id_classroom, $id_user, $id)
    {
        $auditiva = [
            [
                'title' => 'Nivel Literal',
                'percent' => 50
            ],
            [
                'title' => 'Nivel Inferencial',
                'percent' => 40
            ],
            [
                'title' => 'Nivel Crítico Valorativo',
                'percent' => 60
            ]
        ];
        $textos = [
            [
                'title' => 'Nivel Literal',
                'percent' => 50
            ],
            [
                'title' => 'Nivel Inferencial',
                'percent' => 40
            ],
            [
                'title' => 'Nivel Crítico Valorativo',
                'percent' => 60
            ],
            [
                'title' => 'Nivel Intertextual',
                'percent' => 100
            ]
        ];
        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.lecturas.promedioGeneral', 'title' => 'Evaluación de Comprensión','subtitle' => '', 'optionIndex' => 5, 'textos' => $textos, 'auditiva' => $auditiva]);
    }

    function calificar_prod_escrita(Request $request) {
        try {
            $criteria0_val = (int) $request->get('rubrica_e_0');
            $criteria1_val = (int) $request->get('rubrica_e_1');
            $criteria2_val = (int) $request->get('rubrica_e_2');
            $criteria3_val = (int) $request->get('rubrica_e_3');
            $criteria4_val = (int) $request->get('rubrica_e_4');

            $scores = new tb_scores_activities;
            $scores->id_user = (int) $request->get('id_user');
            $scores->id_reading = (int) $request->get('id_reading');
            $scores->score = $criteria0_val;
            $scores->id_criteria = 1;
            $scores->id_rubric = (int) $request->get('id_rubric');
            $scores->id_rubric_type = 1;
            $scores->save();

            $scores = new tb_scores_activities;
            $scores->id_user = (int) $request->get('id_user');
            $scores->id_reading = (int) $request->get('id_reading');
            $scores->score = $criteria1_val;
            $scores->id_criteria = 2;
            $scores->id_rubric = (int) $request->get('id_rubric');
            $scores->id_rubric_type = 1;
            $scores->save();

            $scores = new tb_scores_activities;
            $scores->id_user = (int) $request->get('id_user');
            $scores->id_reading = (int) $request->get('id_reading');
            $scores->score = $criteria2_val;
            $scores->id_criteria = 3;
            $scores->id_rubric = (int) $request->get('id_rubric');
            $scores->id_rubric_type = 1;
            $scores->save();

            $scores = new tb_scores_activities;
            $scores->id_user = (int) $request->get('id_user');
            $scores->id_reading = (int) $request->get('id_reading');
            $scores->score = $criteria3_val;
            $scores->id_criteria = 4;
            $scores->id_rubric = (int) $request->get('id_rubric');
            $scores->id_rubric_type = 1;
            $scores->save();

            $scores = new tb_scores_activities;
            $scores->id_user = (int) $request->get('id_user');
            $scores->id_reading = (int) $request->get('id_reading');
            $scores->score = $criteria4_val;
            $scores->id_criteria = 5;
            $scores->id_rubric = (int) $request->get('id_rubric');
            $scores->id_rubric_type = 1;
            $scores->save();

            return response()->json(['type' => 'success', 'message' => 'update successful score'], 200);
        } catch(\Excepcion $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    function calificar_exp_oral(Request $request) {
        try {
            $criteria0_val = (int) $request->get('rubrica_o_0');
            $criteria1_val = (int) $request->get('rubrica_o_1');
            $criteria2_val = (int) $request->get('rubrica_o_2');
            $criteria3_val = (int) $request->get('rubrica_o_3');
            $criteria4_val = (int) $request->get('rubrica_o_4');

            $scores = new tb_scores_activities;
            $scores->id_user = (int) $request->get('id_user');
            $scores->id_reading = (int) $request->get('id_reading');
            $scores->score = $criteria0_val;
            $scores->id_criteria = 6;
            $scores->id_rubric = (int) $request->get('id_rubric');
            $scores->id_rubric_type = 2;
            $scores->save();

            $scores = new tb_scores_activities;
            $scores->id_user = (int) $request->get('id_user');
            $scores->id_reading = (int) $request->get('id_reading');
            $scores->score = $criteria1_val;
            $scores->id_criteria = 3;
            $scores->id_rubric = (int) $request->get('id_rubric');
            $scores->id_rubric_type = 2;
            $scores->save();

            $scores = new tb_scores_activities;
            $scores->id_user = (int) $request->get('id_user');
            $scores->id_reading = (int) $request->get('id_reading');
            $scores->score = $criteria2_val;
            $scores->id_criteria = 4;
            $scores->id_rubric = (int) $request->get('id_rubric');
            $scores->id_rubric_type = 2;
            $scores->save();

            $scores = new tb_scores_activities;
            $scores->id_user = (int) $request->get('id_user');
            $scores->id_reading = (int) $request->get('id_reading');
            $scores->score = $criteria3_val;
            $scores->id_criteria = 7;
            $scores->id_rubric = (int) $request->get('id_rubric');
            $scores->id_rubric_type = 2;
            $scores->save();

            $scores = new tb_scores_activities;
            $scores->id_user = (int) $request->get('id_user');
            $scores->id_reading = (int) $request->get('id_reading');
            $scores->score = $criteria4_val;
            $scores->id_criteria = 8;
            $scores->id_rubric = (int) $request->get('id_rubric');
            $scores->id_rubric_type = 2;
            $scores->save();

            return response()->json(['type' => 'success', 'message' => 'update successful score'], 200);
        } catch(\Excepcion $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    function descargar_archivo_alumno($id_respuesta_final) {
        try {
            $respuesta_final = tb_results::find($id_respuesta_final);

            if($respuesta_final) {
                if($respuesta_final->file != null && $respuesta_final->file != '') {
                    $file = Storage::disk('s3')->get($respuesta_final->file);
                    return Storage::disk('s3')->download($respuesta_final->file);
                }
            }
            return redirect()->back()->with('status_not_enable', 'error');;

        } catch (Exception $error) {

            return redirect()->back()->with('status_not_enable', 'error');;
        }
    }

    

    
}
