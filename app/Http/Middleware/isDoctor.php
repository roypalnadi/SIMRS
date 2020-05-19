<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class isDoctor
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
        if (isset(auth()->user()->role)) {
            if (auth()->user()->role == 2) {
                return $next($request);
            }
        }
        Auth::logout();
        return redirect(route('login'));
    }
}
