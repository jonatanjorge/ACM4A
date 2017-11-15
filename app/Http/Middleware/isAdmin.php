<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $data = null)
    {

        /*
         * Si el nivel del usuario logueado es lo que me llega en $data (1) lo redirecciono al dashboard del admin, sino que la app siga su curso
         */
        if(Auth::user()->nivel == $data){
            return redirect()->route("dashboard");
        }


        // Esto dice que se ejecute la siguiente acción
        return $next($request);
    }
}
