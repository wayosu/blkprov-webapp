<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        if (Auth::user()->roles == 1) {
            return $next($request);
        } else if (Auth::user()->roles == 0) {
            return redirect('/penulis');
        }

        return redirect('/')->with('error',"You don't have admin access.");
    }
}
