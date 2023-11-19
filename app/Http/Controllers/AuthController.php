<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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

    public function login(Request $request)
    {

        $request->validate(
            [
                'email' => 'required|email',
                'senha' => 'required|min:4'
            ],
            [
                'email.required' => 'Campo email é obrigatório.',
                'email.email' => 'Email não é válido.',
                'senha.required' => 'Senha é obrigatória.',
                'senha.min' => 'Senha precisa ser maior que :min caracteres.'
            ]
        );

        $credentials = $request->only('email', 'senha');

        $cliente = \App\Models\Cliente::where('email', $credentials['email'])->first();

        if ($cliente && Hash::check($credentials['senha'], $cliente->senha)) {
            return redirect()->route('login.show')->with('success', 'Login bem-sucedido! (Cliente)');
        } 

        $funcionario = \App\Models\Funcionario::where('email', $credentials['email'])->first();

        if ($funcionario && Hash::check($credentials['senha'], $funcionario->senha)) {
            return redirect()->route('login.show')->with('success', 'Login bem-sucedido! (Funcionario)');
        } 

        return redirect()->route('login.show')->withErrors(['email' => 'Credenciais inválidas']);

        // $credentials = $request->only('email', 'senha');

        // if (Auth::guard('cliente')->attempt($credentials)) {
        //     // Cliente autenticado com sucesso
        //     return dd('LOGIN CLIENTE');
        // }

        // if (Auth::guard('funcionario')->attempt($credentials)) {
        //     // Funcionário autenticado com sucesso
        //     return dd('LOGIN FUNCIONARIO');
        // }

        // return dd($credentials);
    }
}
