<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Si el usuario está logueado y su tipo es 'admin', lo dejamos pasar
        if (Auth::check() && Auth::user()->tipo == 'admin') {
            return $next($request);
        }

        // Si no es admin, lo mandamos de regreso al inicio o menú
        return redirect('/menu')->with('error', 'No tienes permisos de administrador.');
    }
}