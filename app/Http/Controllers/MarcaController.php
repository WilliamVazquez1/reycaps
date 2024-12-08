<?php

namespace App\Http\Controllers;

use App\Models\Marca; // Asegúrate de importar el modelo Marca
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MarcaController extends Controller
{
    public function index(Request $request): View
    {
        $marcas = Marca::paginate(); // Obtener todas las marcas paginadas
        return view('marcas.index', compact('marcas')) // Cambiar la vista a 'marcas.index'
            ->with('i', ($request->input('page', 1) - 1) * $marcas->perPage());
    }

    public function create(): View
    {
        $marca = new Marca(); // Crear una nueva instancia de Marca
        return view('marcas.create', compact('marca')); // Cambiar la vista a 'marcas.create'
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'nombre_marca' => 'required|string|max:100', // Validación para nombre_marca
            'descripcion_marca' => 'nullable|string|max:200', // Validación para descripcion_marca
        ]);

        Marca::create($validatedData); // Crear una nueva marca con los datos validados

        return redirect()->route('marcas.index')->with('success', 'Marca creada exitosamente.'); // Redirigir al índice de marcas
    }

    public function show($id): View
    {
        $marca = Marca::findOrFail($id); // Obtener la marca por ID
        return view('marcas.show', compact('marca')); // Cambiar la vista a 'marcas.show'
    }

    public function edit($id): View
    {
        $marca = Marca::findOrFail($id); // Obtener la marca por ID
        return view('marcas.edit', compact('marca')); // Cambiar la vista a 'marcas.edit'
    }

    public function update(Request $request, Marca $marca): RedirectResponse
    {
        $validatedData = $request->validate([
            'nombre_marca' => 'required|string|max:100', // Validación para nombre_marca
            'descripcion_marca' => 'nullable|string|max:200', // Validación para descripcion_marca
        ]);

        $marca->update($validatedData); // Actualizar la marca con los datos validados

        return redirect()->route('marcas.index')->with('success', 'Marca actualizada exitosamente.'); // Redirigir al índice de marcas
    }

    public function destroy($id): RedirectResponse
    {
        $marca = Marca::findOrFail($id); // Obtener la marca por ID
        $marca->delete(); // Eliminar la marca

        return redirect()->route('marcas.index')->with('success', 'Marca eliminada exitosamente.'); // Redirigir al índice de marcas
    }
}
