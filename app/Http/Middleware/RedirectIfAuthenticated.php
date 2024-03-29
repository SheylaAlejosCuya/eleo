<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\tb_user;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if($guard == 'alumno'){
                    return redirect(RouteServiceProvider::HOME_ALUMNO);
                } else if ($guard == 'profesor') { 
                    return redirect(RouteServiceProvider::HOME_PROFESOR);
                } else if ($guard == 'profesor_admin') { 
                    return redirect(RouteServiceProvider::HOME_PROFESOR_ADMIN);
                }
            }
        }

        return $next($request);
    }
}
