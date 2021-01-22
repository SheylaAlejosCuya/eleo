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

class ProfesorController extends Controller
{
    function inicio() {

        //$profesor = Auth::guard('usuario')->user();
        return view('includes/menubarProfesor', ['includeRoute' => 'profesor.inicio', 'AlternativeBackground' => "1", 'optionIndex' => 0]);
    }
}
