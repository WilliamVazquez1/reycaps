<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema; // Importa Schema correctamente

class UserController extends Controller
{
    // Muestra los usuarios pendientes de aprobación
    public function pendientes()
    {
        $usuariosPendientes = User::where('is_approved', false)->get();
        return view('usuarios.pendientes', compact('usuariosPendientes'));
    }

    // Aprobar un usuario y asignarle un rol
    public function aprobar(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        // Validar que el rol exista en el sistema
        $rol = $request->input('rol');
        if (!Role::where('name', $rol)->exists()) {
            return redirect()->back()->with('error', 'El rol seleccionado no es válido.');
        }

        // Asignar el rol y sincronizar para evitar roles duplicados
        $usuario->syncRoles($rol);

        // Actualizar el campo 'role' en la base de datos si existe
        if (Schema::hasColumn('users', 'role')) {
            $usuario->role = $rol;
            $usuario->save();
        }

        // Marcar al usuario como aprobado
        $usuario->is_approved = true;
        $usuario->save();

        return redirect()->route('usuarios.pendientes')->with('success', 'Usuario aprobado correctamente.');
    }
}
