<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\ViewErrorBag;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ShopController extends Controller
{
    public function exibirProdutos(String|int $categoria): View {

        if($categoria != ''){

            $produtos = DB::table('produto')->where('id_categoria', $categoria)->get();
            
        }else{   
            
            $produtos = DB::table('produto')->get();
        
        }

        return view('shop', ['produto' => $produtos]);
    }

    public function searchProdutos(Request $request): View {

        if($request->search != ''){

            $produtos = DB::table('produto')->where('titulo', 'LIKE',"%{$request->search}%")->get();
            
        }else{   
            
            $produtos = DB::table('produto')->get();
        
        }

        return view('shop', ['produto' => $produtos]);
    }
}
