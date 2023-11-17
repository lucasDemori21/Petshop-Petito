<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin(): View
    {
        return view('auth.login');
    }

    public function showCadastrar(): View
    {
        return view('auth.cadastrar');
    }

    public function cadastrar(Request $request): View
    {

        return dd($request);
    }

    public function login(Request $request): View
    {

        $request->validate(
            [
                'email' => 'required|email',
                'senha' => 'required|min:8'
            ], [
                'email.required' => 'Campo email é obrigatório.',
                'email.email' => 'Email não é válido.',
                'senha.required' => 'Senha é obrigatória.',
                'senha.min' => 'Senha precisa ser maior que :min caracteres.']
        );

        $credentials = $request->only('email', 'senha');

        if (Auth::guard('cliente')->attempt($credentials)) {
            // Cliente autenticado com sucesso
        }
        
        // Para funcionários
        if (Auth::guard('funcionario')->attempt($credentials)) {
            // Funcionário autenticado com sucesso
        }

        return dd($request);
    }
}
