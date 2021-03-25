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

use App\Models\tb_activation_code;
use App\Models\tb_user;
use App\Models\tb_reading;
use App\Models\tb_lecturama;
use App\Models\tb_question;
use App\Models\tb_answer;
use App\Models\tb_results;
use App\Models\tb_school as schools;
use App\Models\tb_gender as gender;

use App\Models\tb_level as level;
use App\Models\tb_grade as grade;

class RegisterController extends Controller
{

    public function register() {
        $schools = schools::where('id_state', 3)->get();
        $genders = gender::all();
        $levels = level::all();
        $grades = grade::all();
        return view('register', ['schools'=>$schools, 'genders'=>$genders, 'levels' => $levels, 'grades'=>$grades]);
    }

    public function check_code(Request $request){
        try {
            $code = tb_activation_code::where('code', $request->get('code'))->where('id_state', 5)->first();
            if($code) {
                return response()->json(['status_code' => 200, 'message' => 'Code available'], 200);
            } else { 
                return response()->json(['status_code' => 500, 'message' => 'Invalid code or already used'], 500);
            }
        } catch (Exception $error) {
            return response()->json(['status_code' => 500, 'message' => 'Error', 'error' => $error], 500);
        }
    }

    public function create_new_user(Request $request){
        try {

            

            $user = new tb_user;
            $user->first_name = trim($request->get('names'));
            $user->last_name = trim($request->get('lastnames'));
            $user->email = trim($request->get('email'));
            $user->dni = trim($request->get('dni'));
            $user->id_avatar = (int) $request->get('gender');
            $user->id_gender = (int) $request->get('gender');
            if((int) $request->get('gender') == 1) {
                $user->id_avatar = 1;
            } else {
                $user->id_avatar = 2;
            }
            $user->id_rol = 2;
            $username = strtolower(substr(trim($request->get('names')),0,1).explode(' ', trim($request->get('lastnames')))[0].rand(100000, 999999));
            $user->username = $username;
            $user->password = Hash::make(trim($request->get('password')));
            $user->id_school = $request->get('school');
            $user->id_grade = $request->get('grade');
            $user->id_level = $request->get('level');
            $user->id_state = 1;
            $user->save();

            $code = tb_activation_code::where('code', $request->get('code'))->where('id_state', 5)->first();
            $code->id_school = $request->get('school');
            $code->id_user = $user->id_user;
            $code->id_state = 6;
            $code->save();
            return redirect()->route('login')->with('success', 'completed!');;
            //return response()->json(['status_code' => 200, 'message' => 'Success'], 200);
        } catch (Exception $error) {
            return redirect()->back()->with('status', 'error');
            //return response()->json(['status_code' => 500, 'message' => 'Error', 'error' => $error], 500);
        }
    }

}
