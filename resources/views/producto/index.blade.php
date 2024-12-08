@extends('layouts.app')

@section('template_title')
    {{ __('Productos') }}
@endsection

<style>
    .stock-total-row {
        margin-top: 20px;
    }

    tbody tr:last-child td {
        border-bottom: none !important;
    }
</style>

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #007bff; color: white;">
                    <h2>{{ __('Lista de Productos') }}</h2>
                    @if(Auth::user()->hasRole('admin'))
                        <a href="{{ route('productos.create') }}" class="btn btn-warning btn-lg">Agregar Producto</a>
                    @endif
                </div>

                <div class="card-body" style="background-color: rgba(255, 255, 255, 0.9); padding: 20px;">
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
                        <table class="table table-bordered table-hover" style="background-color: #ffffff;">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" style="background-color: #6c757d; color: #fff;">Id Producto</th>
                                    <th scope="col" style="background-color: #ffc107; color: #fff;">Nombre Producto</th>
                                    <th scope="col" style="background-color: #28a745; color: #fff;">Descripción Producto</th>
                                    <th scope="col" style="background-color: #dc3545; color: #fff;">Precio</th>
                                    <th scope="col" style="background-color: #007bff; color: #fff;">Existencia Stock</th>
                                    <th scope="col" style="background-color: #ffc107; color: #fff;">Marca</th>
                                    <th scope="col" style="background-color: #28a745; color: #fff;">Categoría</th>
                                    <th scope="col" style="background-color: #17a2b8; color: #fff;">Imagen</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto)
                                    <tr>
                                        <td style="background-color: #6c757d; color: #fff;">{{ $producto->id }}</td>
                                        <td style="background-color: #ffc107; color: #fff;">{{ $producto->nombre_producto }}</td>
                                        <td style="background-color: #28a745; color: #fff;">{{ $producto->descripcion_producto }}</td>
                                        <td style="background-color: #dc3545; color: #fff;">${{ number_format($producto->precio, 2) }}</td>
                                        <td style="background-color: #007bff; color: #fff;">{{ $producto->existencias_stock }}</td>
                                        <td style="background-color: #ffc107; color: #fff;">{{ $producto->marca->nombre_marca ?? 'Sin Marca' }}</td>
                                        <td style="background-color: #28a745; color: #fff;">{{ $producto->categoria->nombre_categoria ?? 'Sin Categoría' }}</td>
                                        <td style="background-color: #17a2b8; color: #fff;">
                                            @if ($producto->imagen)
                                                <img src="{{ asset('storage/' . str_replace('public/', '', $producto->imagen)) }}" alt="{{ $producto->nombre_producto }}" width="60">
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
                                <tr class="stock-total-row" style="background-color: #e8faff; text-align: center; font-weight: bold;">
                                    <td colspan="9" style="padding: 10px;">
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
