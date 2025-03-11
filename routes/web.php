<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PiezaController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FabricanteController;

//Ruta de la página principal, sin autenticación
Route::get('/', function () {
    return view('welcome');
});


//Ruta de la página principal, con autenticación
//Aqui se mostrará el dashboard, que es la página principal de la aplicación
//Si el usuario no está autenticado, será redirigido a la página de inicio de sesión

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*

Esto sirve para que solo se puedan acceder a las rutas que estén dentro de este grupo si el usuario está autenticado.
Si el usuario no está autenticado, será redirigido a la página de inicio de sesión.

*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Piezas
    Route::get('/piezas', [PiezaController::class, 'index'])->name('piezas.index');
    Route::get('/pieza/{id}', [PiezaController::class, 'show'])->name('pieza.show');
    Route::post('/piezas', [PiezaController::class, 'index'])->name('pieza.create');
    Route::post('/pieza/{id}', [ComentarioController::class, 'store'])->name('pieza.show');
    Route::get('/pieza/crear', [PiezaController::class, 'create'])->name('pieza.create');
    Route::post('/pieza', [PiezaController::class, 'store'])->name('pieza.store');
    Route::get('/pieza/{id}/editar', [PiezaController::class, 'edit'])->name('pieza.edit');
    Route::put('/pieza/{id}', [PiezaController::class, 'update'])->name('pieza.update');
    Route::delete('/pieza/{id}', [PiezaController::class, 'destroy'])->name('pieza.destroy');

    // Fabricantes
    Route::get('/fabricante/{id}', [FabricanteController::class, 'show'])->name('fabricante.show');

    // Comentarios
    Route::post('/comentarios', [ComentarioController::class, 'store'])->name('comentarios.store');
});

require __DIR__.'/auth.php';
