@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Usuarios Pendientes de Aprobación</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuariosPendientes as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>
                        <form action="{{ route('usuarios.aprobar', $usuario->id) }}" method="POST">
                            @csrf
                            <select name="rol" class="form-select" required>
                                <option value="">Selecciona un rol</option>
                                <option value="admin">Administrador</option>
                                <option value="cliente">Cliente</option>
                            </select>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-success btn-sm">Aprobar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
