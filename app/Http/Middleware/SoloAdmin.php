<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoloAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        switch (Auth::user()->usertype) { //usertype es el campo que se creo en la tabla users
            case '1': // 1 es el valor que se le asigno al administrador
                return $next($request); 
                break;
            case '2': // 2 es el valor que se le asigno al mentor
                return redirect('vendedor'); // redirecciona a la ruta vendedor
                break;
            case '3': // 3 es el valor que se le asigno al alumno
                return redirect('cliente'); // redirecciona a la ruta cliente
                break;
        }
    }
}
