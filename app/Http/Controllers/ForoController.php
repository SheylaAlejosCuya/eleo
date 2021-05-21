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
        $alumno = Auth::guard('alumno')->user();
        $foros = tb_forum::with('classroom')->with('comments')->with('users')->where('id_state', 3)->where('id_classroom', $alumno->id_classroom)->orderBy('created', 'DESC')->orderBy('updated', 'DESC')->get();
        return view('includes/menubaralternate', ['includeRoute' => 'alumno.foro', 'title' => 'Foro', 'optionIndex' => 3, 'alumno' => $alumno, 'foros' => $foros]);
    }

    function foro($id_forum) {
        $alumno = Auth::guard('alumno')->user();
        $foro = tb_forum::with('comments')->find($id_forum);
        return view('includes/menubaralternate', ['includeRoute' => 'alumno.foroPublicacion', 'optionIndex' => 3, 'alumno' => $alumno, 'foro' => $foro]);
    }

    function publicar_comentario_alumno(Request $request, $id_forum) {
        try {

            $comentario = new tb_comment;
            $comentario->id_user = Auth::guard('alumno')->id();
            $comentario->id_forum = $id_forum;
            $comentario->message = $request->get('comentario');
            $comentario->created = Carbon::now()->timezone('America/Lima')->isoFormat('YYYY-MM-DD HH:mm:ss');
            $comentario->id_state = 9;
            $comentario->save();
            
            return redirect()->back();

        } catch (\Exception $e) {
            //dd($e);
            return redirect()->back();
        }
    }

    function foros_profesor() {

        $profesor = tb_user::find(Auth::guard('profesor')->id());
        $aulas = tb_classroom::where('id_teacher', $profesor->id_user)->get();

        $foros_filtrados = [];

        foreach($aulas as $aula) {
            $foros = tb_forum::with('classroom')->with('comments')->with('users')->where('id_state', 3)->where('id_classroom', $aula->id_classroom)->orderBy('created', 'DESC')->orderBy('updated', 'DESC')->get();
            
            foreach ($foros as $foro) {
                array_push($foros_filtrados, $foro);
            }
        }
        //dd($foros_filtrados);
        //dd($foros_filtrados);
        //dd($foros_filtrados);
        // $lecturamas = array_values(Arr::sort(array_unique($lecturamas_filtrados), function ($value) {
        //     return $value['id_lecturama'];
        // }));

        // $foros = tb_forum::all();
        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.foro', 'title' => 'Foro', 'optionIndex' => 4, 'foros' => $foros_filtrados]);
    }

    function foro_profesor_detalle($id_forum) {
        $foro = tb_forum::find($id_forum);
        $aula = tb_classroom::where('id_state', 3)->with('level')->with('grade')->with('section')->with('teacher')->where('id_teacher', Auth::guard('profesor')->id())->find($foro->id_classroom);
        $comentarios = tb_comment::where('id_forum', $id_forum)->get();

        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.foroDetalle', 'title' => 'Foro', 'optionIndex' => 4, 'foro'=> $foro, 'comentarios' => $comentarios, 'aula'=>$aula]);
        /*     $profesor = Auth::guard('profesor')->user();
        $foro = tb_forum::find($id_foro);
        $comentarios = tb_comment::where('id_forum', $id_foro)->get();
        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.foroDetalle', 'title' => 'Foro', 'optionIndex' => 4, 'foro'->$foro, 'comentarios' => $comentarios]);*/
    }

    function foro_profesor_crear() {

        $aulas = tb_classroom::where('id_state', 3)->with('level')->with('grade')->with('section')->with('teacher')->where('id_teacher', Auth::guard('profesor')->id())->get();

        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.foroCrear', 'title' => 'Nuevo Foro', 'optionIndex' => 4, 'aulas' => $aulas]);
    }

    function crear_nuevo_foro(Request $request) {
        try {
            $foro = new tb_forum;
            $foro->id_classroom = $request->get('id_classroom');
            $foro->title = $request->get('forum_title');
            $foro->content = $request->get('forum_content');
            $foro->id_classroom = (int) $request->get('aula');
            $foro->created = Carbon::now()->timezone('America/Lima')->isoFormat('YYYY-MM-DD HH:mm:ss'); 
            $foro->updated = Carbon::now()->timezone('America/Lima')->isoFormat('YYYY-MM-DD HH:mm:ss'); 
            
            $path = Storage::disk('s3')->putFileAs('/foros/institucion_id_'.Auth::guard('profesor')->id().'/aula_id_'.$request->get('aula'), $request->file('forum_image'), 'foro_date_'.Carbon::now()->isoFormat('YYYY_MM_DD_H_i_s').'.'.$request->file('forum_image')->extension());
            $foro->image = $path;

            $foro->save();

            return redirect()->route('web_foros_profesor');
        } catch(\Excepcion $e) {
            return redirect()->back();
        }

        
    }
    public function foro_profesor_eliminar($id_forum){
        try {
            $foro = tb_forum::find($id_forum);
            $foro->delete();
            $comentarios = tb_comment::where('id_forum', $id_forum)->get();
            foreach ($comentarios as $comentario) {
                $comentario->delete();
            }
            return redirect()->route('web_foros_profesor');
        } catch (\Exception $e) {
            return redirect()->back();
        }
        
    }

    public function foro_profesor_publicar_comentario($id_comment) {
        try {

            $comentario = tb_comment::find($id_comment);
            $comentario->id_state = 7;
            $comentario->save();

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function foro_profesor_cancelar_comentario($id_comment) {
        try {

            $comentario = tb_comment::find($id_comment);
            $comentario->id_state = 8;
            $comentario->save();

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    public function foro_profesor_responder_comentario(Request $request) {
        try {

            $comentario_prev = tb_comment::find($request->id_comment);

            $comentario = new tb_comment;
            $comentario->id_forum = $request->id_forum;
            $comentario->id_user = Auth::guard('profesor')->id();
            $comentario->message = $request->comment;
            $comentario->id_response_comment = $comentario_prev->id_comment;
            $comentario->created = Carbon::now()->timezone('America/Lima')->isoFormat('YYYY-MM-DD HH:mm:ss');
            $comentario->id_state = 7;
            $comentario->save();

            return response()->json(['type' => 'success', 'message' => 'Success'], 200);
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

}
