<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Database\QueryException; // Importar QueryException

class CiudadController extends Controller
{
    public function index(Request $request): View
    {
        $ciudades = Ciudad::paginate();
        return view('ciudad.index', compact('ciudades'))
            ->with('i', ($request->input('page', 1) - 1) * $ciudades->perPage());
    }

    public function create(): View
    {
        $ciudad = new Ciudad();
        return view('ciudad.create', compact('ciudad'));
    }

    public function store(Request $request): RedirectResponse
    {
        // Validación de los datos del formulario
        $validatedData = $request->validate([
            'nombre_ciudad' => 'required|string|max:100',
            'descripcion_ciudad' => 'nullable|string|max:200',
        ]);
    
        try {
            // Intentamos crear una nueva ciudad
            Ciudad::create($validatedData);
            return redirect()->route('ciudades.index')->with('success', 'Ciudad creada exitosamente.');
        } catch (QueryException $e) {
            // Verificamos si el error es el 45000 (el código que lanzamos en el trigger)
            if ($e->getCode() == '45000') {
                // Redirigir al índice con el error
                return redirect()->route('ciudades.index')
                                 ->withInput()  // Mantener los valores previos
                                 ->withErrors(['nombre_ciudad' => 'El nombre de la ciudad ya existe']);
            }
            // Si ocurre otro error, mostramos un mensaje genérico
            return redirect()->route('ciudades.index')->with('error', 'Ocurrió un error al crear la ciudad');
        }
    }
    

    public function show(int $id): View
    {
        $ciudad = Ciudad::findOrFail($id);
        return view('ciudad.show', compact('ciudad'));
    }

    public function edit(int $id): View
    {
        $ciudad = Ciudad::findOrFail($id);
        return view('ciudad.edit', compact('ciudad'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        // Validación de los datos del formulario
        $validatedData = $request->validate([
            'nombre_ciudad' => 'required|string|max:100',
        ]);

        $ciudad = Ciudad::findOrFail($id);

        try {
            // Intentamos actualizar la ciudad
            $ciudad->update($validatedData);
            return redirect()->route('ciudades.index')->with('success', 'Ciudad actualizada exitosamente.');
        } catch (QueryException $e) {
            // Verificamos si el error es el 45000 (el código que lanzamos en el trigger)
            if ($e->getCode() == '45000') {
                return redirect()->route('ciudades.index')->with('error', 'El nombre de la ciudad ya existe');
            }
            // Si ocurre otro error, mostramos un mensaje genérico
            return redirect()->route('ciudades.index')->with('error', 'Ocurrió un error al actualizar la ciudad');
        }
    }

    public function destroy(int $id): RedirectResponse
    {
        $ciudad = Ciudad::findOrFail($id);
        $ciudad->delete();

        return redirect()->route('ciudades.index')->with('success', 'Ciudad eliminada exitosamente.');
    }
}
