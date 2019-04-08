<?php

namespace App\Http\Middleware;
use Closure;

class CheckAge
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
        if ($request->age < 20) {

          return redirect(route('dashboard'))->with('error','Age must be equal or greater than 20: ');
        }
        return $next($request);
    }
}
