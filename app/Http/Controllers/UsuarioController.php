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

class UsuarioController extends Controller
{

    function perfil(){
        $alumno = Auth::guard('usuario')->user();
        //dd($alumno);
        return view('includes/menubaralternate', ['includeRoute' => 'alumno.perfil', 'optionIndex' => 0, 'alumno' => $alumno]);
    }

    function inicio() {
        $alumno = Auth::guard('usuario')->user();
        return view('includes/menubaralternate', ['includeRoute' => 'alumno.inicio', 'optionIndex' => 0, 'alumno' => $alumno]);
    }

    function libros() {
        $alumno = Auth::guard('usuario')->user();
        $lecturama = tb_lecturama::where('id_grade', $alumno->id_grade)->where('id_level', $alumno->id_level)->first();
        $lecturas = tb_reading::where('id_lecturama', $lecturama->id_lecturama)->get();

        // $data = [
        //     [
        //         'url' => "./libros/video/1",
        //         'img' => "images/Lecturas/4to 1 FABULEANDO.jpeg",
        //         'title' => 'FABULEANDO'
        //     ],
        //     [
        //         'url' => "./libros/video/2",
        //         'img' => "images/Lecturas/4to 2 APRENDIENDO A MONTAR.jpeg",
        //         'title' => "APRENDIENDO A MONTAR"
        //     ],
        //     [
        //         'url' => "./libros/video/3",
        //         'img' => "images/Lecturas/4to 3 UN GUSANO FABRICANTE.jpg",
        //         'title' => "UN GUSANO FABRICANTE"
        //     ],
        //     [
        //         'url' => "./libros/video/4",
        //         'img' => "images/Lecturas/4to 4 TRABAJANDO POR LA NIÑEZ.jpg",
        //         'title' => "TRABAJANDO POR LA NIÑEZ"
        //     ],
        //     [
        //         'url' => "./libros/video/5",
        //         'img' => "images/Lecturas/4to 5 ALEGRE AL AIRE LIBRE.jpg",
        //         'title' => "ALEGRE AL AIRE LIBRE"
        //     ],
        //     [
        //         'url' => "./libros/video/6",
        //         'img' => "images/Lecturas/4to 6 EL DOCTOR SABELOTODO.jpg",
        //         'title' => "EL DOCTOR SABELOTODO"
        //     ],
        //     [
        //         'url' => "./libros/video/7",
        //         'img' => "images/Lecturas/4to 7 ADOLESCENCIA, UN MOMENTO DE LA VIDA.jpg",
        //         'title' => "ADOLESCENCIA, UN MOMENTO DE LA VIDA"
        //     ],
        //     [
        //         'url' => "./libros/video/8",
        //         'img' => "images/Lecturas/4to 8 PERÚ MÁGIA Y BIODIVERSIDAD.jpeg",
        //         'title' => "PERÚ MÁGIA Y BIODIVERSIDAD"
        //     ],
        //     [
        //         'url' => "./libros/video/9",
        //         'img' => "images/Lecturas/4to 9 I CONVERSANDO CON LA HISTORIA.jpeg",
        //         'title' => "CONVERSANDO CON LA HISTORIA I"
        //     ],
        //     [
        //         'url' => "./libros/video/10",
        //         'img' => "images/Lecturas/4to 9 II CONVERSANDO CON LA HISTORIA.jpeg",
        //         'title' => "CONVERSANDO CON LA HISTORIA II"
        //     ],
        //     [
        //         'url' => "./libros/video/11",
        //         'img' => "images/Lecturas/4to 10 TIERNA Y DULCE POR SIEMPRE.jpg",
        //         'title' => "TIERNA Y DULCE POR SIEMPRE"
        //     ],
        //     [
        //         'url' => "./libros/video/12",
        //         'img' => "images/Lecturas/4to 11 UNIÓN Y PODER.jpg",
        //         'title' => "UNIÓN Y PODER"
        //     ],
        //     [
        //         'url' => "./libros/video/13",
        //         'img' => "images/Lecturas/4to 12 CONOCIENDO EL ANTIGUO EGIPTO.jpg",
        //         'title' => "CONOCIENDO EL ANTIGUO EGIPTO"
        //     ],
        //     [
        //         'url' => "./libros/video/14",
        //         'img' => "images/Lecturas/4to 13 COMO HACER UN SEÑOR CABEZA DE PASTO.jpeg",
        //         'title' => "COMO HACER UN SEÑOR CABEZA DE PASTO"
        //     ],
        //     [
        //         'url' => "./libros/video/15",
        //         'img' => "images/Lecturas/4to 14 METRO EL CABALLO PINTOR.jpg",
        //         'title' => "METRO EL CABALLO PINTOR"
        //     ],
        //     [
        //         'url' => "./libros/video/16",
        //         'img' => "images/Lecturas/4to 15¿DE QUÉ TE BURLAS¿.jpg",
        //         'title' => "¿DE QUÉ TE BURLAS?"
        //     ],
        //     [
        //         'url' => "./libros/video/17",
        //         'img' => "images/Lecturas/4to 16 VOZ, CANTO Y SENTIMIENTO.jpg",
        //         'title' => "VOZ, CANTO Y SENTIMIENTO"
        //     ],
        //     [
        //         'url' => "./libros/video/18",
        //         'img' => "images/Lecturas/4to 17 I EL ORIGEN DE LOS ATRAPASUEÑOS.jpeg",
        //         'title' => "EL ORIGEN DE LOS ATRAPASUEÑOS I"
        //     ],
        //     [
        //         'url' => "./libros/video/19",
        //         'img' => "images/Lecturas/4to 17 II EL ORIGEN DE LOS ATRAPASUEÑOS.jpeg",
        //         'title' => "EL ORIGEN DE LOS ATRAPASUEÑOS II"
        //     ],
        //     [
        //         'url' => "./libros/video/20",
        //         'img' => "images/Lecturas/4to 18 RECETAS ROJAS.jpg",
        //         'title' => "RECETAS ROJAS"
        //     ],
        //     [
        //         'url' => "./libros/video/21",
        //         'img' => "images/Lecturas/4to 19 UN GENIO DE LA DIVERSIÓN.jpg",
        //         'title' => "UN GENIO DE LA DIVERSIÓN"
        //     ],
        //     [
        //         'url' => "./libros/video/22",
        //         'img' => "images/Lecturas/4to 20 NO QUIERO CRECER.jpg",
        //         'title' => "NO QUIERO CRECER"
        //     ]
        // ];
        return view('includes/menubaralternate', ['includeRoute' => 'alumno.libros', 'lecturas' => $lecturas, 'title' => 'Mis libros y lecturas', 'subtitle' => 'Selecciona el libro de tu preferencia', 'optionIndex' => 1, 'alumno' => $alumno]);
    }

    function libros_video($id) {
        $lectura = tb_reading::find($id);
        $alumno = tb_user::find(Auth::guard('usuario')->id());
        if((int) $lectura->id_state == 4) {
            return redirect()->back()->with('status', 'La lectura seleccionada se encuentra deshabilitada');
        }
        return view('includes/menubaralternate', ['includeRoute' => 'alumno.tutorialesVideo', 'continue' => '../../videoPreguntas', 'optionIndex' => 1, 'lectura' => $lectura, 'alumno' => $alumno]);
    }

}