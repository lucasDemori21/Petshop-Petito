<?php

namespace App\Http\Controllers;

use App\Mail\EmailSendInvoice;
use App\Models\Carrinho;
use App\Models\Cliente;
use App\Models\Funcionario;
use App\Models\ItemVenda;
use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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

    public function exibirCheckout(Request $request)
    {

        $data = $request->all();

        if (Auth::guard('funcionario')->check()) {

            $data['email'] = Auth::guard('funcionario')->user()->email;
            $data['nome'] = Auth::guard('funcionario')->user()->nome_func;
            $data['cpf'] = Auth::guard('funcionario')->user()->cpf;
            $data['id'] = Auth::guard('funcionario')->user()->id_func;
            $data['dono'] = 2;
        } else if (Auth::guard('cliente')->check()) {

            $data['email'] = Auth::guard('cliente')->user()->email;
            $data['nome'] = Auth::guard('cliente')->user()->nome_cliente;
            $data['cpf'] = Auth::guard('cliente')->user()->cpf;
            $data['id'] = Auth::guard('cliente')->user()->id_cliente;
            $data['dono'] = 1;
        } else {

            $script = "<script>
                            Swal.fire({
                                title: 'Erro!',
                                text: 'Email não cadastrado.',
                                icon: 'error',
                                showConfirmButton: true
                            });
                        </script>";
            return back()->with(['verify' => $script]);
        }

        $produtosQuantidades = [];

        $venda = Venda::create([
            'date_compra' => now(),
            'usn_cod' => $data['id'],
            'dono' => $data['dono'],
            'created_at' => now(),
            'updated_at' => now(),
            'valor_total' => 0,
            'forma_pagamento' => 'Cartão',
        ]);



        foreach ($data as $key => $qtd) {

            if (strpos($key, 'qtd-') === 0) {

                $idProduto = substr($key, 4);

                $produto = Produto::where('id_produto', $idProduto)->get()->first();

                ItemVenda::create([
                    'id_venda' => $venda->id_venda,
                    'id_produto' => $produto->id_produto,
                    'qtd_produto' => $qtd,
                    'valor_unitario' => $produto->valor,
                ]);

                Produto::where('id_produto', $idProduto)->update(['qtd_produto' => ($produto->qtd_produto - $qtd)]);

                $produtosQuantidades[] = [
                    'id_produto' => $produto->id_produto,
                    'name' => $produto->titulo,
                    'qtd' => $qtd,
                    'valorUnitario' => $produto->valor,
                    'total' => $qtd * $produto->valor
                ];
            }
        }

        $totalVenda = ItemVenda::where('id_venda', $venda->id)->sum('valor_unitario');

        if ($venda->update(['valor_total' => $totalVenda])) {

            if (Auth::guard('funcionario')->check()) {
                Carrinho::where(['dono' => 1, 'usn_cod' => $data['id']])->delete();
            } else if (Auth::guard('cliente')->check()) {
                Carrinho::where(['dono' => 2, 'usn_cod' => $data['id']])->delete();
            }

            $data = [
                'email' => $data['email'],
                'nome' => $data['nome'],
                'cpf' => $data['cpf'],
                'title' => 'NOTA FISCAL ELETRÔNICA - PETITO-PETSHOP',
                'resume' => 'Seguir NFe(NOTA FISCAL ELETRÔNICA) de compra realizada na PETITO-PETSHOP.',
                'resumeProd' => $produtosQuantidades
            ];

            Mail::to($data['email'])->send(new EmailSendInvoice($data));

            $script = "<script>
                            Swal.fire({
                                title: 'Sucesso!',
                                text: 'Verifique seu email e clique no link enviado para realizar a alteração da senha.',
                                icon: 'success',
                                showConfirmButton: true
                            });
                        </script>";

            return back()->with(['verify' => $script]);
        } else {

            $script = "<script>
                            Swal.fire({
                                title: 'Erro!',
                                text: 'Email não cadastrado.',
                                icon: 'error',
                                showConfirmButton: true
                            });
                        </script>";
            return back()->with(['verify' => $script]);
        }

        return view('shop.checkout.checkout', ['checkout' => $produtosQuantidades]);
    }
}
