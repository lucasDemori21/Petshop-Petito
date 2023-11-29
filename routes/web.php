<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ShopController;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

    Route::get('/', function () {
        return view('index');
    })->name('index');
        
    Route::get('/shop/{categoria}', [ShopController::class, 'exibirProdutos'])->name('shop.produtos');
    Route::get('/shop', [ShopController::class, 'searchProdutos'])->name('shop.search');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login.show');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::post('/login/auth', [AuthController::class, 'login'])->name('auth.login');    
    Route::post('/cadastrar/auth', [AuthController::class, 'cadastrar'])->name('auth.cadastrar');


    Route::middleware(['funcionario'])->group(function () {
        
        
        Route::get('admin/cadastrar_produto', [AdminController::class, 'showCadastrarProduto'])->name('show.cadastrar_produto');
        Route::post('admin/cadastrarProduto', [AdminController::class, 'cadastrarProduto'])->name('cadastro.cadastrar_produto');


    });
    
    

// });