<?php

namespace App\Http\Middleware;

use Closure;

class CORS
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
        $resposta = $next($request);
        $resposta->header("Access-Control-Allow-Origin","");
        $reposta->header("Access-Control-Allow-Methods","GET,POST,PUT,DELETE,OPTIONS");
        $reposta->header("Access-Control-Allow-Headers","Authorization, Content-Type");
    }
}
