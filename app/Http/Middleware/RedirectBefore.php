<?php

namespace App\Http\Middleware;

use Closure;

class RedirectBefore
{
    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
    public function handle($request, Closure $next, $route)
    {
        if (strtotime(config('date.date_to_verify')) > strtotime('today')) {
            return redirect()->route($route);
        } else {
            return $next($request);
        }

    }
}
