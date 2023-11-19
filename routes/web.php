<?php

use App\Http\Controllers\AuthController;
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
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.show');

Route::get('/cadastrar', [AuthController::class, 'showCadastrar'])->name('cadastrar.show');

Route::post('/login/auth', [AuthController::class, 'login'])->name('auth.login');
Route::post('/cadastrar/auth', [AuthController::class, 'cadastrar'])->name('auth.cadastrar');
