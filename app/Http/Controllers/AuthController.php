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
            if (Auth::guard('usuario')->attempt(['email'=> $request->email, 'password' => $request->password, 'id_state' => 1, 'id_rol' => 2])) {

                return redirect()->intended('inicio');

            } else if (Auth::guard('profesor')->attempt(['email'=> $request->email, 'password' => $request->password, 'id_state' => 1, 'id_rol' => 1])) {

                return redirect()->intended('profesor-inicio');
            }

            return redirect()->back()->with('status', 'error');

        } catch (Exception $error) {
            return response()->json([
                'status_code' => 500,
                'message' => 'Error',
                'error' => $error,
            ], 500);
        }
    }

    public function logout()
    {
        Auth::guard('usuario')->logout();
        Auth::guard('profesor')->logout();
        return redirect()->intended('/');
    }

}
