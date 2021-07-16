<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!auth()->user())
        {
            return redirect('/')->with('status','Kamu harus login telebih dahulu');
        }
        if(auth()->user()->role == 'admin')
        {
            abort('404');
        }



        return $next($request);
    }
}
