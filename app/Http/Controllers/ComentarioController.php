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
        $request->validate([
            'comentario' => 'required|string|max:1000',
        ]);

        // Crear un nuevo comentario para la pieza
        Comentario::create([
            'usuario_id' => Auth::id(), // El usuario autenticado
            'pieza_id' => $request->pieza_id, // El ID de la pieza
            'texto' => $request->comentario, // El texto del comentario
        ]);

        return redirect()->route('pieza.show', $request->pieza_id)->with('success', 'Comentario publicado con éxito');
    }
}

?>