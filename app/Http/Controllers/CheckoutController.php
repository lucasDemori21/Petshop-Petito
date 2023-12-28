<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\Produto;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function exibirCarrinho(): View
    {

        $data = [];

        if (Auth::guard('funcionario')->check()) {
            $data['usn_cod'] = Auth::guard('funcionario')->user()->id_func;
            $data['dono'] = '1';
        } else if (Auth::guard('cliente')->check()) {
            $data['usn_cod'] = Auth::guard('cliente')->user()->id_cliente;
            $data['dono'] = '2';
        }

        $produtos = Carrinho::join('produto', 'carrinho.id_produto', '=', 'produto.id_produto')
            ->where(['carrinho.dono' => $data['dono'], 'carrinho.usn_cod' => $data['usn_cod']])
            ->get(['carrinho.*', 'produto.*']);


        return view('shop.checkout.carrinho', ['produtos' => $produtos]);
    }

    public function exibirCheckout(Request $request): View {

        

        return view('shop.checkout.checkout', ['checkout' => $request]);
    }
}
