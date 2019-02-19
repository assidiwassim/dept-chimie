<?php

namespace App\Http\Middleware;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\URL;
use Closure;
use Auth;
class Check_Admin
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
        $str= URL::current();
        // c'est une page d'administration 
       if((strpos($str, "/labo")==false) && (Auth::user()->role == 'user'))
         {
             return response('Page autorisé  ');
        }

         // c'est une page de simple utilisateur 
         if((strpos($str, "/admin")==false) && (Auth::user()->role == 'admin'))
         {  return response('Page autorisé ');}

         return $next($request);   
                
        
    }
}
