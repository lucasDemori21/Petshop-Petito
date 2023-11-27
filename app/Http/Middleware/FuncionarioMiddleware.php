<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FuncionarioMiddleware
{
    public function handle($request, Closure $next)
    {
        // Verifica se o usuário está autenticado com o guard 'funcionario'
        dd(Auth::guard('funcionario')->check());

        if (Auth::guard('funcionario')->check()) {
            return $next($request);
        }

        // Caso não esteja autenticado, redireciona para a página de login
        return redirect(route('login.show'));
    }
}
