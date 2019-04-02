<?php

namespace App\Http\Middleware;

use Closure;

class IsCoe
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
       if (\Auth::user()->login == 'coe') {
            return $next($request);
        }

        return redirect()->back();
    }
}
