<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

use Storage;
use File;
use DB;
use Carbon\Carbon;
use Cookie;

use App\Models\tb_user;
use App\Http\Controllers\UsuarioController;

class UsuarioController extends Controller
{

    function perfil() {
        $alumno = tb_user::find(Auth::guard('usuario')->id());
        return view('includes/menubaralternate', ['includeRoute' => 'alumno.perfil', 'alumno' => $alumno, 'optionIndex' => 0]);
    }

    function inicio() {
        //dd(Auth::guard('usuario')->user());
        return view('includes/menubaralternate', ['includeRoute' => 'alumno.inicio', 'optionIndex' => 0]);
    }

}