<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CompanyMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        if (auth('admin')->check() && auth('admin')->user()->type == 'company')
        {
            return $next($request);
        }
        else {
            return redirect()->route('login');
        }
    }
}
