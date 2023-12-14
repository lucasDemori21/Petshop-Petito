<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return view('shop.shop', ['produto' => $produtos]);
    }

    public function searchProdutos(Request $request): View {

        if($request->search != ''){

            $produtos = DB::table('produto')->where('titulo', 'LIKE',"%{$request->search}%")->get();
            
        }else{   
            
            $produtos = DB::table('produto')->get();
        
        }
        return view('shop.shop', ['produto' => $produtos]);
    }

    public function showProduto(String|int $id): View{

        $produto = DB::table('produto')->where('id_produto', $id)->get();
        return view('shop.produto', ['dados' => $produto]);

    }

    public function addCarrinho(Request $request){
        
        $data = $request->all();

        if (Auth::guard('funcionario')->check()) {
            $data['usn_cod'] = Auth::guard('funcionario')->user()->id_func;
            $data['dono'] = '1';
        } else if (Auth::guard('cliente')->check()) {
            $data['usn_cod'] = Auth::guard('cliente')->user()->id_cliente;
            $data['dono'] = '2';
        }

        
        // dd($data);
        DB::table('carrinho')->create($data);

        $qtd = DB::table('carrinho')->where(['dono' => $data['dono'], 'usn_cod' => $data['usn_cod']])->get()->count();

        return response()->json(['qtd' => $qtd, 'cadastro' => 'concluido']);
    }
    public function qtdCarrinho(){

        $data = [];
        
        if (Auth::guard('funcionario')->check()) {
            $data['usn_cod'] = Auth::guard('funcionario')->user()->id_func;
            $data['dono'] = '1';
        } else if (Auth::guard('cliente')->check()) {
            $data['usn_cod'] = Auth::guard('cliente')->user()->id_cliente;
            $data['dono'] = '2';
        }
        
        $qtd = DB::table('carrinho')->where(['dono' => $data['dono'], 'usn_cod' => $data['usn_cod']])->get()->count();

        return response()->json(['qtd' => $qtd]);
    }
}
