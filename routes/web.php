<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmprestimoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Perfil do Usuário (Admin)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD de Livros
    Route::resource('livros', LivroController::class);

    // CRUD de Clientes (Leitores)
    Route::resource('clientes', ClienteController::class);

    // Empréstimos
    Route::get('/emprestimos', [EmprestimoController::class, 'index'])->name('emprestimos.index');
    Route::get('/emprestimos/novo', [EmprestimoController::class, 'create'])->name('emprestimos.create');
    Route::post('/emprestimos', [EmprestimoController::class, 'store'])->name('emprestimos.store');
    Route::post('/emprestimos/{id}/devolver', [EmprestimoController::class, 'devolver'])->name('emprestimos.devolver');
});

require __DIR__.'/auth.php';