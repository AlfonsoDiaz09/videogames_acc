<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoloCliente
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
        switch (Auth::user()->usertype) {
            case '1':
                return redirect('cliente');
                break;
            case '2':
                return redirect('vendedor');
                break;
            case '3': // 3 es el valor que se le asigno al cliente
                return $next($request); // redirecciona a la ruta cliente
                break;
        }
    }
}
