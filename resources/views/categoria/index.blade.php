@extends('layouts.app')

@section('template_title')
    {{ __('Categorías') }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #007bff; color: white;">
                    <h2>{{ __('Lista de Categorías') }}</h2>
                    <!-- Botón de Agregar Categoría (solo visible para administradores) -->
                    @if(Auth::user()->hasRole('admin'))
                        <a href="{{ route('categorias.create') }}" class="btn btn-warning btn-lg">Agregar Categoría</a>
                    @endif
                </div>

                <div class="card-body" style="background-color: rgba(255, 255, 255, 0.9); padding: 20px;">
                    <!-- Mensajes de éxito y error -->
                    <div class="container">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" style="background-color: #ffffff;">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" style="background-color: #6c757d; color: #fff;">ID Categoría</th>
                                    <th scope="col" style="background-color: #ffc107; color: #fff;">Nombre Categoría</th>
                                    <th scope="col" style="background-color: #28a745; color: #fff;">Descripción</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categorias as $categoria)
                                    <tr>
                                        <td style="background-color: #6c757d; color: #fff;">{{ $categoria->id_categoria }}</td>
                                        <td style="background-color: #ffc107; color: #fff;">{{ $categoria->nombre_categoria }}</td>
                                        <td style="background-color: #28a745; color: #fff;">{{ $categoria->descripcion_categoria }}</td>
                                        <td>
                                            <!-- Botón Mostrar (visible para todos los usuarios) -->
                                            <a class="btn btn-info btn-sm" href="{{ route('categorias.show', $categoria->id_categoria) }}">Mostrar</a>

                                            @if (Auth::user()->hasRole('admin'))
                                                <!-- Contenido solo visible para administradores -->
                                                <a class="btn btn-primary btn-sm" href="{{ route('categorias.edit', $categoria->id_categoria) }}">Editar</a>
                                                <form action="{{ route('categorias.destroy', $categoria->id_categoria) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {!! $categorias->links() !!} <!-- Paginación -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
    <style>
        body {
            background-color: #007bff; /* Color de fondo azul */
            color: white; /* Color de texto blanco */
        }
        .card {
            margin-top: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
        }
        .btn-primary {
            background-color: #0069d9; /* Color azul más oscuro para el botón primario */
            border-color: #0062cc;
        }
        .btn-warning {
            background-color: #ffc107; /* Color amarillo para el botón de advertencia */
            border-color: #ffc107;
            color: #212529; /* Color de texto oscuro */
        }
        .table {
            background-color: #ffffff !important; /* Fondo blanco para la tabla */
        }
        .table th, .table td {
            border-color: #dddddd; /* Color de borde suave */
        }
    </style>
@endsection
