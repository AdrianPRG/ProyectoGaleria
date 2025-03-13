<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PiezaController;
use App\Http\Controllers\ComentarioController;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\FabricanteController;
use App\Http\Controllers\SocialiteController;
use App\Models\Pieza;

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

//Middleware para autenticación y solo si el valor de la variable admin es true
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Piezas
    Route::get('/piezas', [PiezaController::class, 'index'])->name('piezas.index');
    Route::get('/pieza/{id}', [PiezaController::class, 'show'])->name('pieza.show');
    //El store se usa para crear un comentario cuando se haga una peticion post a pieza/id
    Route::post('/pieza/{id}', [ComentarioController::class, 'store'])->name('pieza.show');
    //Route::post('/pieza', [PiezaController::class, 'store'])->name('pieza.store');
    //Ruta para cuando se desea editar una pieza
    Route::get('/pieza/{id}/editar', [PiezaController::class, 'edit'])->name('pieza.edit');
    Route::put('/pieza/{id}', [PiezaController::class, 'update'])->name('pieza.update');
    //Se llama a la funcion eliminar
    Route::get('/pieza/{id}/eliminar', [PiezaController::class, 'destroy'])->name('pieza.destroy');

    //Para obtener las piezas de una categoria

    Route::get('/piezas/categoria/{id}', [PiezaController::class, 'piezasCategoria'])->name('piezascategoria.index');

    // Fabricantes
    Route::get('/fabricante/{id}', [FabricanteController::class, 'show'])->name('fabricante.show');
    Route::get('/fabricantes', [FabricanteController::class, 'index'])->name('fabricantes.index');

    // Comentarios
    Route::post('/comentarios', [ComentarioController::class, 'store'])->name('comentarios.store');
});

//PARTE DE ADMIN

//Con el middleWare se le dice que solo se puede acceder si el usuario autenticado es admin, es decir
//si la variable admin es true
//Este middleware esta ubicado en app/Http/Middleware/IsAdmin.php
Route::get('/piezas/create', [PiezaController::class, 'create'])->name('piezas.create')->middleware([IsAdmin::class, 'auth']);
Route::post('/piezas/create', [PiezaController::class, 'store'])->name('piezas.create')->middleware([IsAdmin::class, 'auth']);
Route::get('/fabricantes/create', [FabricanteController::class, 'create'])->name('fabricantes.create')->middleware([IsAdmin::class, 'auth']);
Route::post('/fabricantes/create', [FabricanteController::class, 'store'])->name('fabricantes.create')->middleware([IsAdmin::class, 'auth']);
Route::get('/fabricante/{id}/eliminar', [FabricanteController::class, 'eliminar'])->name('fabricantes.create')->middleware([IsAdmin::class, 'auth']);

//Rutas para autenticación con GitHub
Route::get('auth/github', [SocialiteController::class, 'redirectToGitHub']);
Route::get('auth/github/callback', [SocialiteController::class, 'handleGitHubCallback']);

require __DIR__.'/auth.php';
