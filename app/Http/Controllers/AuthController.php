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

            $credentials = $request->only('email', 'password');

            if (Auth::guard('usuario')->attempt(['email'=> $request->email, 'password' => $request->password, 'id_state' => 1 ])) {
                
                return redirect()->intended('inicio');
                // return response()->json([
                //     'status_code' => 200,
                //     'message' => 'Success'
                // ], 200);
            }

            //$user = tb_user::where('email', $request->email)->first();
            
            //cookie(['user' => $user]);

            //if(!Hash::check($request->password, $user->password, [])) {
                //throw new \Exception('Error');
            //}

            //$tokenResult = $user->createToken('authToken')->plainTextToken;

            // return response()->json([
            //     'status_code' => 500,
            //     'message' => 'Unauthorized'
            // ], 500);
            
            return redirect()->back()->withInput($request->only('email'));

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
        return redirect()->intended('inicio');
    }

}
