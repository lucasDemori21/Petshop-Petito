<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('show/produto/{id}', [ShopController::class, 'showProduto'])->name('show.produto');
Route::get('/shop/categoria/{categoria}', [ShopController::class, 'exibirProdutos'])->name('shop.produtos');
Route::get('/shop', [ShopController::class, 'searchProdutos'])->name('shop.search');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.show');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/reset-password', [AuthController::class, 'showResetPassword'])->name('show.resetpassword');
Route::post('/login/auth', [AuthController::class, 'login'])->name('auth.login');
Route::post('/cadastrar/auth', [AuthController::class, 'cadastrar'])->name('auth.cadastrar');
Route::post('/forgot-password', [AuthController::class, 'sendEmailResetPassword'])->name('forgot.password');
Route::post('update-password', [AuthController::class, 'updatePassword'])->name('update.password');

Route::middleware(['cliente'])->group(function () {
    Route::post('/checkout', [CheckoutController::class, 'exibirCheckout'])->name('show.checkout');
    Route::get('/carrinho', [CheckoutController::class, 'exibirCarrinho'])->name('show.carrinho');

    Route::post('/add/carrinho', [ShopController::class, 'addCarrinho'])->name('add.carrinho');
    Route::get('/qtd/carrinho', [ShopController::class, 'qtdCarrinho'])->name('qtd.carrinho');
    Route::get('/remover-do-carrinho/{id}', [ShopController::class, 'destroyCar'])->name('remover.carrinho');
    Route::get('/exibir/compras', [ShopController::class, 'exibirCompras'])->name('show.compras');

    Route::post('/servicos/cadastrar-pet', [PetController::class, 'cadastrarPets'])->name('cadastrar.pet');
    Route::post('/agendar/pet/{id}', [PetController::class, 'agendar'])->name('agendar.pet');
    Route::get('/servicos', [PetController::class, 'exibirPets'])->name('show.servicos');
    Route::get('/agendamento/pet/{id}', [PetController::class, 'showAgendamento'])->name('agendamento.pet');
    Route::get('/exibir/pets', [PetController::class, 'exibirPet'])->name('show.pets'); 
    Route::get('/exibir/agendamento', [PetController::class, 'exibirAgendamento'])->name('show.agendas'); 
    Route::get('/show/update/pet/{id}', [PetController::class, 'showUpdatePet'])->name('show.update.pet'); 
    Route::get('/update/pet/{id}', [PetController::class, 'updatePet'])->name('update.pet');
    Route::get('/excluir/pet/{id}', [PetController::class, 'excluirPet'])->name('excluir.pet');

});

Route::middleware(['funcionario'])->group(function () {
    Route::get('admin/estoque', [AdminController::class, 'index'])->name('show.estoque');
    Route::get('admin/dashboard', [AdminController::class, 'showDash'])->name('admin.dashboard');
    Route::get('admin/update/{id}', [AdminController::class, 'showUpdate'])->name('show.update');
    Route::get('admin/cadastrar_produto', [AdminController::class, 'showCadastrarProduto'])->name('show.cadastrar_produto');
    Route::post('admin/cadastrarProduto', [AdminController::class, 'cadastrarProduto'])->name('cadastro.cadastrar_produto');
    Route::get('admin/produto/delete/{id}', [AdminController::class, 'destroyProduto'])->name('admin.produto.destroy');
    Route::post('admin/update/produto/{id}', [AdminController::class, 'updateProduto'])->name('admin.update');
});
