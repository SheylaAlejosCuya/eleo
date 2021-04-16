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
use App\Models\tb_classroom;

use App\Models\tb_question;
use App\Models\tb_answer;

class BibliotecaController extends Controller
{
    function lecturas_recursos() {
        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.biblioteca', 'subtitle' => 'Selecciona la categoría de tu preferencia', 'optionIndex' => 1]);
    }

    function lecturamas() {
        $lecturamas = tb_lecturama::where('id_state', 3)->get();
        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.maestroLecturama', 'title' => 'Guía del maestro lecturama', 'optionIndex' => 1, 'lecturamas' => $lecturamas]);
    }

    function eleo_virtual() {

        $profesor = tb_user::find(Auth::guard('profesor')->id());

        $salones = tb_classroom::where('id_teacher', $profesor->id_user)->get();

        $lecturamas = tb_lecturama::where('id_state', 3)->get();
        //dd($salones);

        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.eleoVirtual', 'title' => 'E-Leo virtual', 'subtitle' => 'Lecturamas disponibles', 'optionIndex' => 1, 'lecturamas' => $lecturamas]);
    }

    function lecturas_disponibles($id_lecturama) {
        $lecturas = tb_reading::where('id_lecturama', $id_lecturama)->where('id_state', 3)->get();
        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.actividadesLectura', 'subtitle' => 'Lecturas disponibles', 'optionIndex' => 1, 'lecturas' => $lecturas]);
    }

    function lectura_detalles($id_lecturama, $id_lectura) {
        $lectura = tb_reading::find($id_lectura);
        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.actividad', 'actividad' => $id_lectura, 'title' => 'Nivel n° 1', 'optionIndex' => 1, 'lectura' => $lectura]);
    }

    function lectura_detalles_preview($id_lecturama, $id_lectura) {
        $lecturama = tb_lecturama::find($id_lecturama);
        $lectura = tb_reading::find($id_lectura);

        $profesor = tb_user::find(Auth::guard('profesor')->id());

        $preguntas_bloque0_texto = tb_question::where('id_reading', $lectura->id_reading)->where('id_question_level', null)->where('id_block', 0)->with('answers')->get();

        $preguntas_bloque1_literal = tb_question::where('id_reading', $lectura->id_reading)->where('id_question_level', 1)->where('id_block', 1)->with('answers')->get();
        $preguntas_bloque1_inferencial = tb_question::where('id_reading', $lectura->id_reading)->where('id_question_level', 2)->where('id_block', 1)->with('answers')->get();
        $preguntas_bloque1_critico = tb_question::where('id_reading', $lectura->id_reading)->where('id_question_level', 3)->where('id_block', 1)->with('answers')->get();

        $preguntas_bloque2_literal = tb_question::where('id_reading', $lectura->id_reading)->where('id_question_level', 1)->where('id_block', 2)->with('answers')->get();
        $preguntas_bloque2_inferencial = tb_question::where('id_reading', $lectura->id_reading)->where('id_question_level', 2)->where('id_block', 2)->with('answers')->get();
        $preguntas_bloque2_critico = tb_question::where('id_reading', $lectura->id_reading)->where('id_question_level', 3)->where('id_block', 2)->with('answers')->get();

        $salones = tb_classroom::where('id_grade', $lecturama->id_grade)->where('id_teacher', $profesor->id_user)->with('grade')->with('section')->with('level')->with('teacher')->get();

        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.actividadPreview', 'title' => 'Nivel n°'.$id_lecturama, 'optionIndex' => 1, 'lectura' => $lectura, 'salones' => $salones, 'preguntas_bloque1_literal' => $preguntas_bloque1_literal, 'preguntas_bloque1_inferencial' => $preguntas_bloque1_inferencial, 'preguntas_bloque1_critico'=>$preguntas_bloque1_critico, 'preguntas_bloque2_literal' => $preguntas_bloque2_literal, 'preguntas_bloque2_inferencial' => $preguntas_bloque2_inferencial, 'preguntas_bloque2_critico'=>$preguntas_bloque2_critico, 'preguntas_bloque0_texto' => $preguntas_bloque0_texto]);
    }

}