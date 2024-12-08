<?php
namespace App\Http\Controllers;
use App\Models\Persona;
use App\Models\Proveedor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProveedorController extends Controller
{
    public function index(Request $request): View
    {
        // Paginamos los proveedores y cargamos la relación 'persona' en la misma consulta.
        $proveedores = Proveedor::with('persona')->paginate();
    
        return view('proveedor.index', compact('proveedores'))
        ->with('i', ($request->input('page', 1) - 1) * $proveedores->perPage());
    }
    public function create(): View
    {
        $proveedor = new Proveedor();
        $personas = Persona::all(); // Carga todas las personas de la base de datos
    
        return view('proveedor.create', compact('proveedor', 'personas'));
    }
    
    
    

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'id_persona' => 'nullable|integer',
        ]);

        Proveedor::create($validatedData);

        return redirect()->route('proveedores.index')->with('success', 'Proveedor creado exitosamente.');
    }

    public function show($id): View
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('proveedor.show', compact('proveedor'));
    }

    public function edit($id): View
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('proveedor.edit', compact('proveedor'));
    }

    public function update(Request $request, $id)
{
    // Validar la entrada
    $request->validate([
        'id_persona' => 'required|integer',
        // Agrega otras validaciones si es necesario
    ]);

    // Encontrar el proveedor por ID
    $proveedor = Proveedor::findOrFail($id);

    // Actualizar los datos
    $proveedor->id_persona = $request->input('id_persona');

    // Si manejas una imagen, añade esta lógica
    if ($request->hasFile('imagen')) {
        // Manejo de la imagen aquí
    }

    // Guardar cambios
    $proveedor->save();

    // Redirigir a la lista con un mensaje de éxito
    return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado correctamente.');
}


    public function destroy($id): RedirectResponse
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();

        return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado exitosamente.');
    }
}
