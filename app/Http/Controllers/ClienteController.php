<?php
namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Persona;
use App\Models\DireccionEnvio;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClienteController extends Controller
{
    public function index(Request $request): View
    {
        $clientes = Cliente::with(['persona','direccionenvio'])->paginate();
        return view('cliente.index', compact('clientes'))
            ->with('i', ($request->input('page', 1) - 1) * $clientes->perPage());
    }

    public function create(): View
    {
        $cliente = new Cliente();


        $personas = Persona::all(); //
        $direcciones= DireccionEnvio::all();

        return view('cliente.create', compact('cliente','personas','direcciones'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'id_persona' => 'nullable|integer',
            'id_direccion_envio' => 'nullable|integer',
            'contrasena' => 'required|string|max:255',
        ]);

        Cliente::create($validatedData);

        return redirect()->route('clientes.index')->with('success', 'Cliente creado exitosamente.');
    }

    public function show($id): View
    {
        $cliente = Cliente::findOrFail($id);
        return view('cliente.show', compact('cliente'));
    }

    public function edit($id): View
    {
        $cliente = Cliente::findOrFail($id);
        return view('cliente.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente): RedirectResponse
    {
        $validatedData = $request->validate([
            'id_persona' => 'nullable|integer',
            'id_direccion_envio' => 'nullable|integer',
            'contrasena' => 'required|string|max:255',
        ]);

        $cliente->update($validatedData);

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente.');
    }

    public function destroy($id): RedirectResponse
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado exitosamente.');
    }
}
