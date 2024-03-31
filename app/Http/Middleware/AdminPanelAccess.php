<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminPanelAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Verificar si el usuario esta autenticado
        if (Auth::check()) {
            // Obtener el rol de usuario
            $userRol = Auth::user()->rol;

            // Verificar si el rol es 'admin' o 'super_admin'
            if ($userRol === 'admin' || $userRol === 'super_admin') {
                return $next($request);
            } else {
                return redirect('/');
            }
        }

        // Si el usuario no está autenticado, redirigir al home
        return redirect('/');
    }
}
