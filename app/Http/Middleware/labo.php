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
        if(Auth::user()->role=="labo"){
            return $next($request);
        }
        return 'You are not labo';

        
    }
}
