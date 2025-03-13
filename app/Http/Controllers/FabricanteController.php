<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fabricante;

class FabricanteController extends Controller
{
    /**
     * Mostrar la vista de un fabricante por su ID.
     */
    public function show($id)
    {
        $fabricante = Fabricante::findOrFail($id);
        return view('fabricantes.fabricante', compact('fabricante'));
    }

    public function index()
    {
        $fabricantes = Fabricante::all();
        return view('fabricantes.fabricantes', compact('fabricantes'));
    }

    public function eliminar($id){
        $fabricante = Fabricante::findOrFail($id);
        $fabricante->delete();
        return redirect()->route('fabricantes.index');
    }

    public function create(){
        return view('fabricantes.fabricante_create');
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|string|max:45',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'descripcion' => 'required|string',
            'activo' => 'required|boolean',
        ]);

        // Si se subió una imagen, se guarda en la carpeta correspondiente
        if ($request->hasFile('imagen')) {
            $carpetaFabricante = 'imagenes/fabricantes/' . $request->nombre . '/';
            $imagePath = $request->file('imagen')->store($carpetaFabricante, 'public');
        }

        Fabricante::create([
            'nombre' => $request->nombre,
            'imagen' => $imagePath,
            'descripcion' => $request->descripcion,
            'activo' => $request->activo
        ]);

        return redirect()->route('fabricantes.index');
        
    }
    
}
