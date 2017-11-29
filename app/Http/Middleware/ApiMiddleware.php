<?php

namespace App\Http\Middleware;

use Closure;

class ApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(env("APP_ENV") != "local"):
            $userApiKey = $request->header("acm4a-key",null);
            $apiKey = env("API_KEY",null);

            if(is_null($userApiKey) || is_null($apiKey) || $apiKey != $userApiKey)
                return response()->json("No autorizado: Falta apikey", 403);
        endif;


            return $next($request)
                    ->header("Access-Control-Allow-Origin","*")
                    ->header("Access-Control-Allow-Methods","*");
    }
}
