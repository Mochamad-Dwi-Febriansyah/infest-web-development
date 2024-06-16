<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class MitraMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!empty(Auth::guard('mitra')->check())){
            if (Auth::guard('mitra')->user()->user_type == 1){
                return $next($request);
            }
            else{
                Auth::logout();
                return redirect('/login');
            }
        }
        else{
            Auth::logout();
            return redirect('/login');
        }
    }
}
