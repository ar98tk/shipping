<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
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
        if (auth('admin')->check() && auth('admin')->user()->type == 'admin')
        {
            return $next($request);
        }
        else {
            return redirect()->route('login');
        }

    }
}
