<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showCadastrarProduto(): View{

        return view('admin.cadastro_produto');

    }

    public function cadastrarProduto(Request $request){

        $request->validate([
            'tituto' => 'string',
            'descricao' => 'text',
            'id_categoria' => 'number',
            'img_produto' => 'image',
            'valor' => 'float',
        ]);

        if(Produto::create($request->all())){
               
        }
    }
}
