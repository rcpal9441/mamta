<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class CheckAdmin
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
        //print_r(Auth::user()->role[0]->role);die;
        if (Auth::user() &&  Auth::user()->role[0]->role != 'Registered User') {
           return $next($request);
        }
        
        return redirect('/'); 
        
    }
}
