<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\ViewErrorBag;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ShopController extends Controller
{
    public function exibirProdutos(): View {
        
        $produtos = DB::table('produto')->get();

        return view('shop', ['produto' => $produtos]);
    }
}
