<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Carrinho;
use App\Models\Cliente;
use App\Models\Funcionario;
use App\Models\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ShopController extends Controller
{
    public function exibirProdutos(String|int $categoria): View
    {

        if ($categoria != '') {

            $produtos = DB::table('produto')->where('id_categoria', $categoria)->paginate(25);
        } else {

            $produtos = DB::table('produto')->paginate(25);
        }
        return view('shop.shop', ['produto' => $produtos]);
    }

    public function searchProdutos(Request $request): View
    {

        if ($request->search != '') {

            $produtos = DB::table('produto')->where('titulo', 'LIKE', "%{$request->search}%")->paginate(25);
        } else {

            $produtos = DB::table('produto')->paginate(25);
        }
        return view('shop.shop', ['produto' => $produtos]);
    }

    public function showProduto(String|int $id): View
    {

        $produto = DB::table('produto')->where('id_produto', $id)->get();
        return view('shop.produto', ['dados' => $produto]);
    }

    public function addCarrinho(Request $request)
    {

        $data = $request->all();

        if (Auth::guard('funcionario')->check()) {
            $data['usn_cod'] = Auth::guard('funcionario')->user()->id_func;
            $data['dono'] = '1';
        } else if (Auth::guard('cliente')->check()) {
            $data['usn_cod'] = Auth::guard('cliente')->user()->id_cliente;
            $data['dono'] = '2';
        }

        $produto = Carrinho::where(['dono' => $data['dono'], 'usn_cod' => $data['usn_cod'], 'id_produto' => $data['id_produto']])->get()->count();

        if ($produto > 0) {

            return response()->json(['cadastro' => '2']);
        } else {

            Carrinho::create($data);
            $qtd = DB::table('carrinho')->where(['dono' => $data['dono'], 'usn_cod' => $data['usn_cod']])->get()->count();
            return response()->json(['qtd' => $qtd, 'cadastro' => 'concluido']);
        }
    }
    public function qtdCarrinho()
    {

        $data = [];

        if (Auth::guard('funcionario')->check()) {
            $data['usn_cod'] = Auth::guard('funcionario')->user()->id_func;
            $data['dono'] = '1';
        } else if (Auth::guard('cliente')->check()) {
            $data['usn_cod'] = Auth::guard('cliente')->user()->id_cliente;
            $data['dono'] = '2';
        }

        $qtd = Carrinho::where(['dono' => $data['dono'], 'usn_cod' => $data['usn_cod']])->get()->count();

        return response()->json(['qtd' => $qtd]);
    }

    public function destroyCar(String|int $id)
    {

        if (Auth::guard('funcionario')->check()) {
            $data['usn_cod'] = Auth::guard('funcionario')->user()->id_func;
            $data['dono'] = '1';
        } else if (Auth::guard('cliente')->check()) {
            $data['usn_cod'] = Auth::guard('cliente')->user()->id_cliente;
            $data['dono'] = '2';
        }

        Carrinho::where(['id_produto' => $id, 'usn_cod' => $data['usn_cod'], 'dono' => $data['dono']])->delete();

        return response()->json(['status' => 1]);
    }

    public function exibirCompras()
    {
        $data = [];

        if (Auth::guard('funcionario')->check()) {
            $data['usn_cod'] = Auth::guard('funcionario')->user()->id_func;
            $data['dono'] = '1';
        } else if (Auth::guard('cliente')->check()) {
            $data['usn_cod'] = Auth::guard('cliente')->user()->id_cliente;
            $data['dono'] = '2';
        }

        $compras = Venda::join('item_venda', 'item_venda.id_venda', '=', 'venda.id_venda')
            ->join('produto', 'produto.id_produto', '=', 'item_venda.id_produto')
            ->where(['dono' => $data['dono'], 'usn_cod' => $data['usn_cod']])->get();

        return view('conta.compras', ['compra' => $compras]);
    }

    public function showPurchasingInfo(String|int $id)
    {


        $info = Venda::join('item_venda', 'item_venda.id_venda', '=', 'venda.id_venda')
            ->join('produto', 'produto.id_produto', '=', 'item_venda.id_produto')
            ->where('venda.id_venda', $id)
            ->select('venda.*', 'item_venda.qtd_produto as quantidade', 'produto.*')
            ->first();

        // dd($info);
        if ($info) {
            if ($info->dono == 1) {
                $comprador = Funcionario::where('id_func', $info->usn_cod)->first();
                $nome = $comprador ? $comprador->nome_func : 'Funcionário não encontrado';
            } elseif ($info->dono == 2) {
                $comprador = Cliente::where('id_cliente', $info->usn_cod)->first();
                $nome = $comprador ? $comprador->nome_cliente : 'Cliente não encontrado';
            }
        } else {
            $nome = 'Venda não encontrada';
        }


        $data['id_venda'] = $info->id_venda;
        $data['created_at'] = $info->created_at->format('d/m/Y - H:i:s');
        $data['forma_pagamento'] = $info->forma_pagamento;
        $data['valor_unitario'] = $info->valor_unitario;
        $data['quantidade'] = $info->quantidade;
        $data['titulo'] = $info->titulo;
        $data['descricao'] = $info->descricao;
        $data['comprador'] = $nome;
        $data['email'] = $comprador->email;
        $data['img_produto'] = $info->img_produto;

        return view('conta.purchaseInfo', ['info' => $data]);
    }
}
