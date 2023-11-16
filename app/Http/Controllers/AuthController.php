<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login():View
    {
        return view('auth.login');
    }

    public function cadastrar():View
    {
        return view('auth.cadastrar');
    }
}
