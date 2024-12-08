<?php

namespace App\Http\Controllers;

use App\Models\CodigoPostal;
use App\Models\Delegacion;
use App\Models\Ciudad;
use App\Models\Estado;
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

        // Obtener los datos paginados de 'DireccionEnvio' junto con las relaciones necesarias
        $direcciones = DireccionEnvio::with(['codigopostal', 'delegacion', 'ciudad', 'estado'])->paginate();

        return view('direccion_envio.index', compact('direcciones'))
            ->with('i', ($request->input('page', 1) - 1) * $direcciones->perPage());
    }

    public function create(): View
    {
        $direccion = new DireccionEnvio();
        $codigos = CodigoPostal::all();
        $delegaciones = Delegacion::all();
        $ciudades = Ciudad::all();
        $estados = Estado::all();

        return view('direccion_envio.create', compact('direccion', 'codigos', 'delegaciones', 'ciudades', 'estados'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'calle' => 'nullable|string|max:200',
            'numero_interior' => 'nullable|integer',
            'numero_exterior' => 'nullable|integer',
            'id_codigo' => 'nullable|integer',
            'id_delegacion' => 'nullable|integer',
            'id_ciudad' => 'nullable|integer',
            'id_estado' => 'nullable|integer',
            'colonia' => 'nullable|string|max:200',
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
            'calle' => 'nullable|string|max:200',
            'numero_interior' => 'nullable|integer',
            'numero_exterior' => 'nullable|integer',
            'id_codigo' => 'nullable|integer',
            'id_delegacion' => 'nullable|integer',
            'id_ciudad' => 'nullable|integer',
            'id_estado' => 'nullable|integer',
            'colonia' => 'nullable|string|max:200',
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
