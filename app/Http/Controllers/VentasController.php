<?php

namespace App\Http\Controllers;

use App\Models\Venta; // Asegúrate de que este es tu modelo de Venta
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VentasController extends Controller
{
    public function index(Request $request): View
    {
        $ventas = Venta::with('cliente.persona')->paginate(10); // Puedes usar paginate o get() según lo necesites

        return view('ventas.index', compact('ventas'));
        $ventas = Venta::paginate(); // Cambiado de Ventas a Venta
        return view('ventas.index', compact('ventas'))
            ->with('i', ($request->input('page', 1) - 1) * $ventas->perPage());
    }

    public function create(): View
    {
        
        $venta = new Venta(); // Cambiado de Ventas a Venta
        return view('ventas.create', compact('venta'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'id_producto' => 'required|integer',
            'id_cliente' => 'required|integer',
            'cantidad' => 'required|integer',
            'total' => 'required|integer',
        ]);

        Venta::create($validatedData); // Cambiado de Ventas a Venta

        return redirect()->route('ventas.index')->with('success', 'Venta creada exitosamente.');
    }

    public function show($id): View
    {
        $venta = Venta::findOrFail($id); // Cambiado de Ventas a Venta
        return view('ventas.show', compact('venta'));
    }

    public function edit($id): View
    {
        $venta = Venta::findOrFail($id); // Cambiado de Ventas a Venta
        $productos = Producto::all(); // Asegúrate de tener el modelo Producto
        $clientes = Cliente::all(); // Asegúrate de tener el modelo Cliente
    
        return view('ventas.edit', compact('venta', 'productos', 'clientes'));
    }

    public function update(Request $request, Venta $venta): RedirectResponse // Cambiado de Ventas a Venta
    {
        $validatedData = $request->validate([
            'id_producto' => 'required|integer',
            'id_cliente' => 'required|integer',
            'cantidad' => 'required|integer',
            'total' => 'required|integer',
        ]);

        $venta->update($validatedData);

        return redirect()->route('ventas.index')->with('success', 'Venta actualizada exitosamente.');
    }

    public function destroy($id): RedirectResponse
    {
        $venta = Venta::findOrFail($id); // Cambiado de Ventas a Venta
        $venta->delete();

        return redirect()->route('ventas.index')->with('success', 'Venta eliminada exitosamente.');
    }
}
