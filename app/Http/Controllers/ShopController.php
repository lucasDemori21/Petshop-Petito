<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\ViewErrorBag;
use Illuminate\View\View;

class ShopController extends Controller
{
    public function exibirProdutos(): View {
        return view('shop');
    }
}
