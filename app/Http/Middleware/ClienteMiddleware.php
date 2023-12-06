<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteMiddleware
{
    public function handle($request, Closure $next)
    {
        if ((Auth::guard('cliente')->check()) || (Auth::guard('funcionario')->check())) {
            return $next($request);
        }
        return redirect()->route('login.show');
    }
}
