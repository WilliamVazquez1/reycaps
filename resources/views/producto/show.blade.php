@extends('layouts.app')

@section('template_title')
    {{ $producto->nombre_producto ?? 'Mostrar Producto' }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detalles del Producto</div>

                <div class="card-body">
                    <div class="form-group">
                        <label><strong>Nombre del Producto</strong></label>
                        <p>{{ $producto->nombre_producto }}</p>
                    </div>

                    <div class="form-group">
                        <label><strong>Descripción:</strong></label>
                        <p>{{ $producto->descripcion_producto }}</p>
                    </div>

                    <div class="form-group">
                        <label><strong>Precio:</strong></label>
                        <p>{{ $producto->precio }}</p>
                    </div>

                    <div class="form-group">
                        <label><strong>Existencias en Stock:</strong></label>
                        <p>{{ $producto->existencias_stock }}</p>
                    </div>

                    <div class="form-group">
                        <label><strong>Marca:</strong></label>
                        <p>{{ $producto->marca->nombre_marca }}</p>
                    </div>

                    <div class="form-group">
                        <label><strong>Categoria:</strong></label>
                        <p>{{ $producto->categoria->nombre_categoria}}</p>
                    </div>

                    <div class="form-group">
                        <label><strong>Imagen:</strong></label>
                        @if ($producto->imagen)
                            <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre_producto }}" width="200">
                        @else
                            <p>No hay imagen disponible</p>
                        @endif
                    </div>

                    <a href="{{ route('productos.index') }}" class="btn btn-primary">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
