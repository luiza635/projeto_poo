<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class JournalistMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 'journalist') {
            return $next($request);
        }

        return redirect('/home');
    }
}