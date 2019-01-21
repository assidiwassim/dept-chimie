<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class labo
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
        if(Auth::user()->role=="user"){
            return $next($request);
        }
        else{
            return Response::view('errors.missing', array(), 404);
        }
    }
}
