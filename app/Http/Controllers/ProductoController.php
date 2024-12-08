<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;

class ProductoController extends Controller
{
    public function index(Request $request): View
    {
        $productos = Producto::with(['categoria', 'marca'])->paginate();

        // Calcular el stock total
        $stockTotal = Producto::sum('existencias_stock');

        return view('producto.index', compact('productos', 'stockTotal'))
            ->with('i', ($request->input('page', 1) - 1) * $productos->perPage());
    }

    public function create(): View
    {
        $producto = new Producto();
        $marcas = Marca::all();
        $categorias = Categoria::all();

        return view('producto.create', compact('producto', 'marcas', 'categorias'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'nombre_producto' => 'required|string|max:100',
            'descripcion_producto' => 'required|string|max:200',
            'precio' => 'required|numeric',
            'existencias_stock' => 'required|integer',
            'id_marca' => 'required|integer',
            'id_categoria' => 'required|integer',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('productos', 'public');
            $validatedData['imagen'] = $imagePath;
        }

        Producto::create($validatedData);

        return redirect()->route('productos.index')
                         ->with('success', 'Producto guardado correctamente.');
    }

    public function show($id): View
    {
        $producto = Producto::findOrFail($id);
        return view('producto.show', compact('producto'));
    }

    public function edit($id): View
    {
        $producto = Producto::findOrFail($id);
        $marcas = Marca::all();
        $categorias = Categoria::all();

        return view('producto.edit', compact('producto', 'marcas', 'categorias'));
    }

    public function update(Request $request, Producto $producto): RedirectResponse
    {
        $validatedData = $request->validate([
            'nombre_producto' => 'required|string|max:100',
            'descripcion_producto' => 'nullable|string|max:200',
            'precio' => 'required|numeric',
            'existencias_stock' => 'required|integer',
            'id_marca' => 'required|integer',
            'id_categoria' => 'required|integer',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            if ($producto->imagen && \Storage::exists('public/' . $producto->imagen)) {
                \Storage::delete('public/' . $producto->imagen);
            }
            $imagePath = $request->file('imagen')->store('productos', 'public');
            $validatedData['imagen'] = $imagePath;
        }

        $producto->update($validatedData);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy($id): RedirectResponse
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
