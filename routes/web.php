<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PiezaController;
use App\Http\Controllers\ComentarioController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Piezas
    Route::get('/piezas', [PiezaController::class, 'index'])->name('piezas.index');
    Route::get('/pieza/{id}', [PiezaController::class, 'show'])->name('pieza.show');
    Route::get('/pieza/crear', [PiezaController::class, 'create'])->name('pieza.create');
    Route::post('/pieza', [PiezaController::class, 'store'])->name('pieza.store');
    Route::get('/pieza/{id}/editar', [PiezaController::class, 'edit'])->name('pieza.edit');
    Route::put('/pieza/{id}', [PiezaController::class, 'update'])->name('pieza.update');
    Route::delete('/pieza/{id}', [PiezaController::class, 'destroy'])->name('pieza.destroy');

    // Comentarios
    Route::post('/comentarios', [ComentarioController::class, 'store'])->name('comentarios.store');
});

require __DIR__.'/auth.php';
