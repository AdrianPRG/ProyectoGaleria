<?php

namespace App\Http\Controllers;

use App\Models\Pieza;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    public function store(Request $request)
    {
        //Se valida que es string y tiene menos de 200 caracteres
        $request->validate([
            'comentario' => 'required|string|max:200',
        ]);

        // Crear un nuevo comentario para la pieza
        Comentario::create([
            'user_id' => Auth::id(), // El usuario autenticado
            'pieza_id' => $request->pieza_id, // El ID de la pieza
            'comentario' => $request->comentario, // El texto del comentario
        ]);

        //Se redirige de nuevo a la pieza
        return redirect()->route('pieza.show', $request->pieza_id)->with('success', 'Comentario publicado con éxito');
    }
}

?>