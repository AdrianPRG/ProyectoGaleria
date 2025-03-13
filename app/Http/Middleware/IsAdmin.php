<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si el usuario está autenticado y tiene la propiedad is_admin en true
        if (!Auth::check() || Auth::user()->is_admin != true) {
            // Si no está autenticado o no es admin, redirige a la de piezas
            return redirect('/piezas');
        }

        // Si todo está bien, pasa la solicitud al siguiente middleware/controlador
        return $next($request);
    }
}
