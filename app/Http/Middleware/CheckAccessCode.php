<?php

namespace App\Http\Middleware;

use Closure;

class CheckAccessCode
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

       $response = $next($request);


        if (!$request->user()->configurations->app_id) {
           flash("<strong>Atenção</strong>, Para iniciar é necessário adicionar o APP_ID para acessar a aplicação.")->warning()->important();
           return redirect()->route('notification');
        }

       return $response;

    }
}
