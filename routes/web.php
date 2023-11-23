<?php

use App\Http\Controllers\AuthController;
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
        
    Route::get('/shop', [ShopController::class, 'exibirProdutos'])->name('shop.produtos');
    
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login.show');
    
    Route::post('/login/auth', [AuthController::class, 'login'])->name('auth.login');
    
    Route::post('/cadastrar/auth', [AuthController::class, 'cadastrar'])->name('auth.cadastrar');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    
// });