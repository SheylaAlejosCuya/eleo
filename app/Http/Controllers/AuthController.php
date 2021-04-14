<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use Hash;
use Exception;
use App\Http\Requests;

use App\Models\User;
use App\Models\tb_user;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        try {

            if (Auth::guard('alumno')->attempt(['dni'=> $request->email, 'password' => $request->password, 'id_rol' => '2'])) {

                $alumno = Auth::guard('alumno')->user();
                if( $alumno->id_state == 2 ) {
                    Auth::guard('alumno')->logout();
                    return redirect()->back()->with('status_disable', 'error');
                } else {
                    return redirect()->intended('inicio');
                }
                
            } else if (Auth::guard('profesor')->attempt(['dni'=> $request->email, 'password' => $request->password, 'id_rol' => '1'])) {

                $profesor = Auth::guard('profesor')->user();
                if( $profesor->id_state == 2 ) {
                    Auth::guard('profesor')->logout();
                    return redirect()->back()->with('status_disable', 'error');
                } else {
                    return redirect()->intended('profesor/inicio');
                }

            } else if (Auth::guard('profesor_admin')->attempt(['dni'=> $request->email, 'password' => $request->password, 'id_rol' => '3'])) {

                $profesor = Auth::guard('profesor_admin')->user();
                if( $profesor->id_state == 2 ) {
                    Auth::guard('profesor_admin')->logout();
                    return redirect()->back()->with('status_disable', 'error');
                } else {
                    return redirect()->intended('profesor-administrativo/inicio');
                }

            }
            
            return redirect()->back()->with('status', 'error');

        } catch (Exception $error) {
            //dd($error);
            return response()->json([
                'status_code' => 500,
                'message' => 'Error',
                'error' => $error,
            ], 500);

        }

    }

    public function logout()
    {
        Auth::guard('alumno')->logout();
        Auth::guard('profesor')->logout();
        Auth::guard('profesor_admin')->logout();
        return redirect()->intended('/');
    }

}
