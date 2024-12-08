<?php

namespace App\Http\Controllers;

use App\Models\CodigoPostal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CodigoPostalController extends Controller
{
    public function index()
    {
        $codigos = CodigoPostal::paginate(10); // Fetches the postal codes
        return view('codigo_postal.index', compact('codigos')); // Passes the variable to the view
    }

    public function create(): View
    {
        $codigo = new CodigoPostal();
        return view('codigo_postal.create', compact('codigo'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'descripcion_codigo' => 'nullable|string|max:10',
        ]);

        CodigoPostal::create($validatedData);

        return redirect()->route('codigo_postal.index')->with('success', 'Código postal creado exitosamente.');
    }

    public function show($id): View
    {
        $codigo_postal = CodigoPostal::findOrFail($id); // Asegúrate de que este modelo sea el correcto
        return view('codigo_postal.show', compact('codigo_postal')); // Pasar la variable a la vista
    }
    

    public function edit($id)
{
    // Recupera el código postal basado en el ID
    $codigo_postal = CodigoPostal::findOrFail($id);

    // Retorna la vista de edición con el código postal
    return view('codigo_postal.edit', compact('codigo_postal'));
}

    public function update(Request $request, CodigoPostal $codigo): RedirectResponse
    {
        $validatedData = $request->validate([
            'descripcion_codigo' => 'nullable|string|max:10',
        ]);

        $codigo->update($validatedData);

        return redirect()->route('codigo_postal.index')->with('success', 'Código postal actualizado exitosamente.');
    }

    public function destroy($id): RedirectResponse
    {
        $codigo = CodigoPostal::findOrFail($id);
        $codigo->delete();

        return redirect()->route('codigo_postal.index')->with('success', 'Código postal eliminado exitosamente.');
    }
}
