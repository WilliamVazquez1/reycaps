<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Database\QueryException;

class EstadoController extends Controller
{
    public function index(Request $request): View
    {
        $estados = Estado::paginate(10); // Ajusta el número de estados por página
        return view('estado.index', compact('estados'))
            ->with('i', ($request->input('page', 1) - 1) * $estados->perPage());
    }

    public function create(): View
    {
        $estado = new Estado();
        return view('estado.create', compact('estado'));
    }

    public function store(Request $request)
{
    // Validación de los datos del formulario
    $validatedData = $request->validate([
        'nombre_estado' => 'required|string|max:100|unique:estados,nombre_estado', // Valida que el nombre sea único
    ]);

    // Crear el estado si la validación pasa
    Estado::create($validatedData);

    // Redirigir con mensaje de éxito
    return redirect()->route('estados.index')->with('success', 'Estado creado exitosamente.');
}


    public function show(int $id): View
    {
        $estado = Estado::findOrFail($id);
        return view('estado.show', compact('estado'));
    }

    public function edit(int $id): View
    {
        $estado = Estado::findOrFail($id);
        return view('estado.edit', compact('estado'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        // Validación de los datos del formulario
        $validatedData = $request->validate([
            'nombre_estado' => 'required|string|max:100|unique:estados,nombre_estado,' . $id,
        ]);

        $estado = Estado::findOrFail($id);

        try {
            // Intentamos actualizar el estado
            $estado->update($validatedData);
            return redirect()->route('estados.index')->with('success', 'Estado actualizado exitosamente.');
        } catch (QueryException $e) {
            if ($e->getCode() == '45000') {
                return redirect()->route('estados.index')
                    ->with('error', 'El nombre del estado ya existe');
            }
            return redirect()->route('estados.index')
                ->with('error', 'Ocurrió un error al actualizar el estado');
        }
    }

    public function destroy(int $id): RedirectResponse
    {
        $estado = Estado::findOrFail($id);
        $estado->delete();

        return redirect()->route('estados.index')->with('success', 'Estado eliminado exitosamente.');
    }
}
