<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [CustomerController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/incluir-cliente', [CustomerController::class, 'addCustomer'])->name('incluir-cliente');
    Route::post('/salvar-cliente', [CustomerController::class, 'saveCustomer'])->name('salvar-cliente');
    Route::post('/excluir-cliente', [CustomerController::class, 'deleteCustomer'])->name('excluir-cliente');
    Route::get('/editar-cliente/{id}', [CustomerController::class, 'editCustomer'])->name('editar-cliente');
    Route::post('/atualizar-cliente', [CustomerController::class, 'updateCustomer'])->name('atualizar-cliente');
});



require __DIR__.'/auth.php';
