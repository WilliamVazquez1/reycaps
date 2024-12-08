@extends('layouts.app')

@section('template_title')
    Editar Producto - {{ $producto->nombre_producto }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">Editar Producto - {{ $producto->nombre_producto }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('productos.update', $producto->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nombre_producto" class="form-label">Nombre Producto</label>
                            <input type="text" name="nombre_producto" class="form-control @error('nombre_producto') is-invalid @enderror" value="{{ old('nombre_producto', $producto->nombre_producto) }}" id="nombre_producto" placeholder="Nombre">
                            @error('nombre_producto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="descripcion_producto" class="form-label">Descripción</label>
                            <input type="text" name="descripcion_producto" class="form-control @error('descripcion_producto') is-invalid @enderror" value="{{ old('descripcion_producto', $producto->descripcion_producto) }}" id="descripcion_producto" placeholder="Descripción">
                            @error('descripcion_producto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="text" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{ old('precio', $producto->precio) }}" id="precio" placeholder="Precio">
                            @error('precio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="existencias_stock" class="form-label">Stock</label>
                            <input type="text" name="existencias_stock" class="form-control @error('existencias_stock') is-invalid @enderror" value="{{ old('existencias_stock', $producto->existencias_stock) }}" id="existencias_stock" placeholder="Stock">
                            @error('existencias_stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="imagen" class="form-label">Imagen</label>
                            <input type="file" name="imagen" class="form-control @error('imagen') is-invalid @enderror" id="imagen">
                            @error('imagen')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Actualizar Producto</button>
                    </form>
                    <a href="{{ route('productos.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
