@extends('layouts.app')

@section('template_title')
    Editar Producto - {{ $producto->nombre }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">Editar Producto - {{ $producto->nombre }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('productos.update', $producto->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nombre" class="form-label">Nombre Producto</label>
                            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $producto->nombre) }}" id="nombre" placeholder="Nombre">
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion', $producto->descripcion) }}" id="descripcion" placeholder="Descripción">
                            @error('descripcion')
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
                            <label for="stock" class="form-label">Stock</label>
                            <input type="text" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', $producto->stock) }}" id="stock" placeholder="Stock">
                            @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="imagen" class="form-label">Imagen</label>
                            <input type="text" name="imagen" class="form-control @error('imagen') is-invalid @enderror" value="{{ old('imagen', $producto->imagen) }}" id="imagen" placeholder="Imagen">
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
