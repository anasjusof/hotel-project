<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if(Auth::check()){                      // If user logged in
            if(Auth::user()->roles_id == 1){    // if authenticate user rolesHQ is true
                return $next($request);         //Goto next request
            }
            else{
                return redirect('/home');
            }
        }
        else{                                   // If user not logged in
            return redirect('/');
        }
        
        
    }
}
