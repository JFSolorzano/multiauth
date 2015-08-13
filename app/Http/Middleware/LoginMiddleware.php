<?php

namespace App\Http\Middleware;
use App\Login;
//use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;


use Closure;

class LoginMiddleware
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
        
        if(Auth::client()->get()){
            return $next($request);
            
        }else{ 
            return redirect()->guest('user');
        }
    }
}
    
