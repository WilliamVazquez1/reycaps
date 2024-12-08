<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Database\QueryException;

class CategoriaController extends Controller
{
    public function index(Request $request): View
    {
        $categorias = Categoria::paginate();
        return view('categoria.index', compact('categorias'))
            ->with('i', ($request->input('page', 1) - 1) * $categorias->perPage());
    }

    public function create(): View
    {
        $categoria = new Categoria();
        return view('categoria.create', compact('categoria'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'nombre_categoria' => 'required|string|max:100',
            'descripcion_categoria' => 'nullable|string|max:200',
        ]);

        try {
            Categoria::create($validatedData);
            return redirect()->route('categorias.index')->with('success', 'Categoría creada exitosamente.');
        } catch (QueryException $e) {
            // Capturar el código de error de MySQL
            $errorCode = $e->errorInfo[1]; // Obtener el código de error

            // Verificar si es el error del trigger (1644) y personalizar el mensaje
            if ($errorCode == 1644) {
                return redirect()->route('categorias.index')->with('error', 'El nombre de la categoría ya existe');
            }

            // Si el error no es el que esperamos, mostramos un mensaje genérico
            return redirect()->route('categorias.index')->with('error', 'Ocurrió un error, por favor intente de nuevo');
        }
    }

    public function show($id): View
    {
        $categoria = Categoria::findOrFail($id);
        return view('categoria.show', compact('categoria'));
    }

    public function edit($id): View
    {
        $categoria = Categoria::findOrFail($id);
        return view('categoria.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria): RedirectResponse
    {
        $validatedData = $request->validate([
            'nombre_categoria' => 'required|string|max:100',
            'descripcion_categoria' => 'nullable|string|max:200',
        ]);

        try {
            $categoria->update($validatedData);
            return redirect()->route('categorias.index')->with('success', 'Categoría actualizada exitosamente.');
        } catch (QueryException $e) {
            // Capturar el código de error de MySQL
            $errorCode = $e->errorInfo[1]; // Obtener el código de error

            // Verificar si es el error del trigger (1644) y personalizar el mensaje
            if ($errorCode == 1644) {
                return redirect()->route('categorias.index')->with('error', 'El nombre de la categoría ya existe');
            }

            // Si el error no es el que esperamos, mostramos un mensaje genérico
            return redirect()->route('categorias.index')->with('error', 'Ocurrió un error, por favor intente de nuevo');
        }
    }

    public function destroy($id): RedirectResponse
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada exitosamente.');
    }
}
