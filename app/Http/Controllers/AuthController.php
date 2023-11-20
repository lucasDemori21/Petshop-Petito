<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin():View
    {
        return view('auth.login');
    }

    public function showCadastrar():View
    {
        return view('auth.cadastrar');
    }

    public function cadastrar(Request $request): View{

        return dd($request);

    }

    public function login(Request $request)
    {

        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:8'
            ], [
                'email.required' => 'Campo email é obrigatório.',
                'email.email' => 'Email não é válido.',
                'password.required' => 'password é obrigatória.',
                'password.min' => 'password precisa ser maior que :min caracteres.']
        );

        $credentials = $request->only('email', 'password');

        if (Auth::guard('cliente')->attempt($credentials)) {
            return redirect()->route('login.show')->with('success', 'Logado com sucesso! (Cliente)');

        }

        if (Auth::guard('funcionario')->attempt($credentials)) {
            return redirect()->route('login.show')->with('success', 'Logado com sucesso! (Funcionario)');
        }

            
        return redirect()->route('login.show')->withErrors(['email' => 'Email inválidas', 'password' => 'Senha Invalida']);
    }
}
