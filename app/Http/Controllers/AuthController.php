<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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

    public function login(Request $request): View{

        return dd($request);

    }
}
