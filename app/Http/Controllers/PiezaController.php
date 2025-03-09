<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pieza;
use App\Models\Comentario;
use App\Models\Puntuacion;
use Illuminate\Support\Facades\Storage;

class PiezaController extends Controller
{
    /**
     * Muestra la lista de piezas .
     */
    public function index()
    {
        //Se obtienen las piezas con sus puntuaciones
        // Paginación para mejor rendimiento
        $piezas = Pieza::with('puntuacion')->paginate(30);
        return view('piezas.piezas', compact('piezas'));
    }

    /**
     * Muestra el detalle de una pieza específica.
     */
    public function show($id)
    {
        $pieza = Pieza::with(['comentarios', 'puntuacion'])->findOrFail($id);
        return view('piezas.pieza', compact('pieza'));
    }

    /**
     * Muestra el formulario para crear una nueva pieza.
     */
    public function create()
    {
        return view('pieza_create');
    }

    /**
     * Guarda una nueva pieza en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'tipo' => 'required|string',
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
            'fabricante_id' => 'required|exists:fabricantes,id',
        ]);

        $path = $request->file('imagen')->store('piezas', 'public');

        Pieza::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'tipo' => $request->tipo,
            'imagen' => $path,
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'categoria_id' => $request->categoria_id,
            'fabricante_id' => $request->fabricante_id,
        ]);

        return redirect()->route('piezas.index')->with('success', 'Pieza creada con éxito');
    }

    /**
     * Muestra el formulario para editar una pieza.
     */
    public function edit($id)
    {
        $pieza = Pieza::findOrFail($id);
        return view('pieza_edit', compact('pieza'));
    }

    /**
     * Actualiza una pieza en la base de datos.
     */
    public function update(Request $request, $id)
    {
        $pieza = Pieza::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'tipo' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
            'fabricante_id' => 'required|exists:fabricantes,id',
        ]);

        if ($request->hasFile('imagen')) {
            Storage::disk('public')->delete($pieza->imagen);
            $path = $request->file('imagen')->store('piezas', 'public');
            $pieza->imagen = $path;
        }

        $pieza->update($request->except('imagen'));

        return redirect()->route('piezas.index')->with('success', 'Pieza actualizada con éxito');
    }

    /**
     * Elimina una pieza de la base de datos.
     */
    public function destroy($id)
    {
        $pieza = Pieza::findOrFail($id);
        Storage::disk('public')->delete($pieza->imagen);
        $pieza->delete();

        return redirect()->route('piezas.index')->with('success', 'Pieza eliminada con éxito');
    }

    /**
     * Filtra piezas por marca, modelo o categoría.
     */
    public function filter(Request $request)
    {
        $query = Pieza::query();

        if ($request->filled('marca')) {
            $query->where('marca', 'like', '%' . $request->marca . '%');
        }

        if ($request->filled('modelo')) {
            $query->where('modelo', 'like', '%' . $request->modelo . '%');
        }

        if ($request->filled('categoria_id')) {
            $query->where('categoria_id', $request->categoria_id);
        }

        $piezas = $query->paginate(9);

        return view('PiezaView', compact('piezas'));
    }
}





?>