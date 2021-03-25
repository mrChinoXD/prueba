<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\facades\Auth;
use App\User;


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
        if(Auth::check() && Auth::user()->role() == 'admin'){
            return $next($request);
        }else{
            return redirect()->route('login');
        }
        return $next($request);
    }
}
