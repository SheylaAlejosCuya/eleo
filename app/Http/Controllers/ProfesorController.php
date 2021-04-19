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
            $pregunta = tb_question::where('id_reading', $lectura->id_reading)->where('id_block', 3)->where('id_question_level', 5)->where('source', 'FINAL')->first();

            dd($pregunta);
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
        $aula = tb_classroom::where('id_state', 3)->find($id_classroom);

        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.lecturas.opciones', 'subtitle' => 'Selecciona la categoría de tu preferencia', 'optionIndex' => 5, 'aula' => $aula]);
    }

    function resultados_alumnos($id_classroom)
    {
        $alumnos = tb_user::where('id_classroom', $id_classroom)->where('id_state', 1)->get();

        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.lecturas.alumnos', 'title' => 'Perfil del alumno','subtitle' => 'Selecciona el perfil que deseas consultar', 'optionIndex' => 5, 'alumnos'=>$alumnos]);
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
                'title' => 'Expresión oral',
                'percent' => 0
            ],
            [
                'title' => 'Expresión escrita',
                'percent' => 0
            ]
        ];

        $alumno = tb_user::find($id_user);

        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.lecturas.ReporteActividades', 'title' => 'Reporte - '.$alumno->first_name.' '.$alumno->last_name, 'subtitle' => 'Selecciona la categoría', 'optionIndex' => 5, 'alumnoResults' => $alumnoResults]);
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
            
            array_push($check_questions_b1_points_literal_general, ((round(array_sum($check_questions_b1_points_literal),0) * 100) / 2));
            array_push($check_questions_b1_points_inferencial_general, ((round(array_sum($check_questions_b1_points_inferencial),0) * 100) / 4));
            //dd($num_q_v2);
            array_push($check_questions_b1_points_valorativo_general, ((round(array_sum($check_questions_b1_points_valorativo),0) * 100) / 4));

            array_push($check_questions_b2_points_literal_general, ((round(array_sum($check_questions_b2_points_literal), 0) * 100) / 2 ));
            array_push($check_questions_b2_points_inferencial_general, ((round(array_sum($check_questions_b2_points_inferencial),0) * 100) / $suma_total_q_v5));
            array_push($check_questions_b2_points_valorativo_general, ((round(array_sum($check_questions_b2_points_valorativo),0) * 100) / $suma_total_q_v6));
            array_push($check_questions_b2_points_intertextual_general, ((round(array_sum($check_questions_b2_points_intertextual),0) * 100) / 2));
        
        }

        $auditiva = [
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

        $textos = [
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

        // $tresults = [
        //     [
        //         'title' => 'Producción Escrita (Rúbrica de Producción escrita)',
        //         'percent' => 0
        //     ],
        //     [
        //         'title' => 'Producción Oral (Rúbrica de Producción oral)',
        //         'percent' => 0
        //     ]
        // ];
        

        //return view('includes/menubaralternate', ['includeRoute' => 'alumno.lecturaEstudio', 'title' => 'Lecturas de estudio', 'aresults' => $aresults, 'lresults' => $lresults, 'tresults' => $tresults, 'optionIndex' => 4, 'alumno' => $alumno]);


        $alumno = tb_user::find($id_user);

        // $auditiva = [
        //     [
        //         'title' => 'Nivel Literal',
        //         'percent' => 50
        //     ],
        //     [
        //         'title' => 'Nivel Inferencial',
        //         'percent' => 40
        //     ],
        //     [
        //         'title' => 'Nivel Crítico Valorativo',
        //         'percent' => 60
        //     ]
        // ];
        // $textos = [
        //     [
        //         'title' => 'Nivel Literal',
        //         'percent' => 50
        //     ],
        //     [
        //         'title' => 'Nivel Inferencial',
        //         'percent' => 40
        //     ],
        //     [
        //         'title' => 'Nivel Crítico Valorativo',
        //         'percent' => 60
        //     ],
        //     [
        //         'title' => 'Nivel Intertextual',
        //         'percent' => 100
        //     ]
        // ];
        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.lecturas.promedioGeneral', 'title' => 'Reporte - '.$alumno->first_name.' '.$alumno->last_name,'subtitle' => 'Selecciona la categoría', 'optionIndex' => 5, 'textos' => $textos, 'auditiva' => $auditiva]);
    }

    function resultados_alumno_detalle_evaluacion($id_classroom, $id_user)
    {
        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.eleccionLibro', 'subtitle' => 'Selecciona la categoría de tu preferencia', 'optionIndex' => 5]);
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


    
}
