<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\TelefoneController;
use App\Http\Controllers\Auth\LoginController;

// Página inicial redireciona para login
Route::get('/', function () {
    return redirect()->route('login');
});

// Rotas de autenticação
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rotas protegidas por login
Route::middleware('auth')->group(function () {

    // CRUD completo de usuários
    Route::resource('usuarios', UsuarioController::class);

    // Endereços vinculados ao usuário, com rotas shallow
    Route::resource('usuarios.enderecos', EnderecoController::class)->shallow();

    // Telefones vinculados ao usuário, com rotas shallow
    Route::resource('usuarios.telefones', TelefoneController::class)->shallow();
});
