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

        $fileNames = '';
        foreach ($request->file('img_produto') as $file) {

            $hashFile = md5($file->getClientOriginalName().microtime()).'.'.$file->getClientOriginalExtension();
            $filePath = $file->storeAs('images/produtos/' , $hashFile);
            $fileNames .= $hashFile . ',';
            
        }
        $fileNames= rtrim($fileNames, ',');

        // $request->validate([
        //     'tituto' => 'string',
        //     'descricao' => 'text',
        //     'id_categoria' => 'number',
        //     'img_produto' => 'image',
        //     'valor' => 'float',
        // ]);

        $data = $request->all();
        $data['img_produto'] = $fileNames;

        dd($data);

        if(Produto::create($data)){
               
        }
    }
}
