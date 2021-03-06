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
use App\Models\tb_forum;
use App\Models\tb_comment;
use App\Models\tb_classroom;


class ForoController extends Controller
{
    function foros() {

        $alumno = Auth::guard('usuario')->user();
        return view('includes/menubaralternate', ['includeRoute' => 'alumno.foro', 'title' => 'Foro', 'optionIndex' => 3, 'alumno' => $alumno]);
    }

    function foro($id) {

        $alumno = Auth::guard('usuario')->user();
        return view('includes/menubaralternate', ['includeRoute' => 'alumno.foroPublicacion', 'optionIndex' => 3, 'alumno' => $alumno]);
    }

    function foros_profesor() {
        $alumno = Auth::guard('profesor')->user();
        $foros = tb_forum::all();
        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.foro', 'title' => 'Foro', 'optionIndex' => 4, 'foros' => $foros]);
    }

    function foro_profesor_detalle(tb_forum $foro, tb_comment $comentarios) {
        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.foroDetalle', 'title' => 'Foro', 'optionIndex' => 4, 'foro'->$foro, 'comentarios' => $comentarios]);
   /*     $profesor = Auth::guard('profesor')->user();
        $foro = tb_forum::find($id_foro);
        $comentarios = tb_comment::where('id_forum', $id_foro)->get();
        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.foroDetalle', 'title' => 'Foro', 'optionIndex' => 4, 'foro'->$foro, 'comentarios' => $comentarios]);*/

    }

    function foro_profesor_crear() {
        $salones = tb_classroom::where('id_state', 3)->with('level')->with('grade')->with('section')->with('teacher')->get();
        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.foroCrear', 'title' => 'Nuevo Foro', 'optionIndex' => 4, 'salones' => $salones]);
    }

    function crear_nuevo_foro(Request $request) {
        try {
            $foro = new tb_forum;
            $foro->id_classroom = $request->id_classroom;
            $foro->title = $request->title;
            $foro->content = $request->content;            
            $foro->save();
            return redirect()->route('web_foros_profesor');
        } catch(\Excepcion $e) {
            return redirect()->back();
        }

        
    }
    public function foro_profesor_eliminar(tb_forum $foro){
        try {
            $foro->delete();
        return redirect()->route('web_foros_profesor');
        } catch (\Exception $e) {
            return response()->json(['type' => 'success', 'message' => 'Tendero eliminado!'], 200);
        }
        
    }

}
