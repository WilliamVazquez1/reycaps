<?php

namespace App\Http\Controllers;

use App\Models\DireccionEnvio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DireccionEnvioController extends Controller
{
    public function index(Request $request): View
    {
        // Establecer la variable de sesión si se accede desde 'Tramitar Pedido'
        if ($request->input('tramitar') === 'true') {
            session(['tramitar' => true]);
        } else {
            session()->forget('tramitar'); // Eliminar la sesión si no se accede desde tramitar
        }

        // Obtener los datos paginados de 'DireccionEnvio' (sin relaciones, ya que ahora son texto)
        $direcciones = DireccionEnvio::paginate();

        return view('direccion_envio.index', compact('direcciones'))
            ->with('i', ($request->input('page', 1) - 1) * $direcciones->perPage());
    }

    public function create(): View
    {
        $direccion = new DireccionEnvio();
        // No necesitamos cargar datos de las tablas relacionadas, ya que ahora usamos campos de texto
        return view('direccion_envio.create', compact('direccion'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'calle' => 'required|string|max:200',
            'numero_interior' => 'required|integer',
            'numero_exterior' => 'required|integer',
            'id_codigo' => 'required|string|max:10',
            'id_delegacion' => 'required|string|max:100',
            'id_ciudad' => 'required|string|max:100',
            'id_estado' => 'required|string|max:100',
            'colonia' => 'required|string|max:200',
            'referencias' => 'nullable|string|max:300',
        ]);

        DireccionEnvio::create($validatedData);

        return redirect()->route('direccion_envio.index')->with('success', 'Dirección de envío creada exitosamente.');
    }

    public function show($id): View
    {
        $direccion = DireccionEnvio::findOrFail($id);
        return view('direccion_envio.show', compact('direccion'));
    }

    public function edit($id): View
    {
        $direccion = DireccionEnvio::findOrFail($id);
        return view('direccion_envio.edit', compact('direccion'));
    }

    public function update(Request $request, DireccionEnvio $direccion): RedirectResponse
    {
        $validatedData = $request->validate([
            'calle' => 'required|string|max:200',
            'numero_interior' => 'required|integer',
            'numero_exterior' => 'required|integer',
            'id_codigo' => 'required|string|max:10',
            'id_delegacion' => 'required|string|max:100',
            'id_ciudad' => 'required|string|max:100',
            'id_estado' => 'required|string|max:100',
            'colonia' => 'required|string|max:200',
            'referencias' => 'nullable|string|max:300',
        ]);

        $direccion->update($validatedData);

        return redirect()->route('direccion_envio.index')->with('success', 'Dirección de envío actualizada exitosamente.');
    }

    public function destroy($id): RedirectResponse
    {
        $direccion = DireccionEnvio::findOrFail($id);
        $direccion->delete();

        return redirect()->route('direccion_envio.index')->with('success', 'Dirección de envío eliminada exitosamente.');
    }

    public function confirmarPago()
    {
        // Obtener el carrito de la sesión
        $cart = session()->get('cart', []);

        // Retornar la vista 'confirmar' con el carrito
        return view('pago.confirmar', compact('cart'));
    }
}