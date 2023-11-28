<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showCadastrarProduto(): View{

        return view('admin.cadastro_produto');

    }
}
