@extends('layouts.app')

@section('template_title')
    {{ __('Productos') }}
@endsection

{{-- Estilo minimalista tipo Apple --}}
<style>
    .stock-total-row {
        margin-top: 20px;
    }

    tbody tr:last-child td {
        border-bottom: none !important;
    }

    .card {
        border: none;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        border-radius: 20px;
    }

    .card-header {
        background: linear-gradient(to right, #007bff, #0056b3);
        color: white;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        padding: 20px;
    }

    .card-body {
        background-color: #f8f9fa;
        padding: 30px;
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
    }

    .btn {
        border-radius: 10px;
        font-weight: 500;
    }

    .table thead th {
        background-color: #f1f1f1;
        color: #333;
        font-weight: 600;
        border-bottom: 2px solid #dee2e6;
    }

    .table td {
        vertical-align: middle;
    }

    .table img {
        width: 100px;
        height: auto;
        border-radius: 12px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .table img:hover {
        transform: scale(1.2);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    }

    .alert {
        border-radius: 10px;
    }

    .table tfoot td {
        background-color: #e9ecef;
        font-weight: bold;
        text-align: center;
        padding: 15px;
    }
</style>

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2>{{ __('Lista de Productos') }}</h2>
                    @if(Auth::user()->hasRole('admin'))
                        <a href="{{ route('productos.create') }}" class="btn btn-warning btn-lg">Agregar Producto</a>
                    @endif
                </div>

                <div class="card-body">
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

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th>Marca</th>
                                    <th>Categoría</th>
                                    <th>Imagen</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                    <tr>
                                        <td>{{ $producto->id }}</td>
                                        <td>{{ $producto->nombre_producto }}</td>
                                        <td>{{ $producto->descripcion_producto }}</td>
                                        <td>${{ number_format($producto->precio, 2) }}</td>
                                        <td>{{ $producto->existencias_stock }}</td>
                                        <td>{{ $producto->marca->nombre_marca ?? 'Sin Marca' }}</td>
                                        <td>{{ $producto->categoria->nombre_categoria ?? 'Sin Categoría' }}</td>
                                        <td>
                                            @if ($producto->imagen)
                                                <img src="{{ asset('storage/' . str_replace('public/', '', $producto->imagen)) }}" alt="{{ $producto->nombre_producto }}">
                                            @else
                                                <span>No image</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('productos.show', $producto->id) }}">Mostrar</a>
                                            <form action="{{ route('cart.add', $producto->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-sm">Agregar al Carrito</button>
                                            </form>
                                            @if (Auth::user()->hasRole('admin'))
                                                <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="stock-total-row">
                                    <td colspan="9">
                                        Total de Stock: {{ $stockTotal }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    {!! $productos->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
