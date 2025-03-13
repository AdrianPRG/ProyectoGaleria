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

    
}
