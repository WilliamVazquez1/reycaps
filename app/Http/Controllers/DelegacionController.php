<?php

namespace App\Http\Controllers;

use App\Models\Delegacion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DelegacionController extends Controller
{
    public function index(Request $request): View
    {
        $delegaciones = Delegacion::paginate();
        return view('delegacion.index', compact('delegaciones'))
            ->with('i', ($request->input('page', 1) - 1) * $delegaciones->perPage());
    }

    public function create(): View
    {
        $delegacion = new Delegacion();
        return view('delegacion.create', compact('delegacion'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'nombre_delegacion' => 'required|string|max:100',
        ]);

        Delegacion::create($validatedData);

        return redirect()->route('delegaciones.index')->with('success', 'Delegación creada exitosamente.');
    }

    public function show($id): View
    {
        $delegacion = Delegacion::findOrFail($id);
        return view('delegacion.show', compact('delegacion'));
    }

    public function edit($id): View
    {
        $delegacion = Delegacion::findOrFail($id);
        return view('delegacion.edit', compact('delegacion'));
    }

    public function update(Request $request, $id): RedirectResponse
{
    $validatedData = $request->validate([
        'nombre_delegacion' => 'required|string|max:100',
    ]);

    $delegacion = Delegacion::findOrFail($id);
    $delegacion->update($validatedData);

    return redirect()->route('delegaciones.index')->with('success', 'Delegación actualizada exitosamente.');
}


    public function destroy($id): RedirectResponse
    {
        $delegacion = Delegacion::findOrFail($id);
        $delegacion->delete();

        return redirect()->route('delegaciones.index')->with('success', 'Delegación eliminada exitosamente.');
    }
}
