@extends('layouts.app')

@section('template_title')
    {{ __('Edit') }} Producto
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">{{ __('Edit') }} Producto</span>
                </div>
                <div class="card-body bg-white">
                    <form method="POST" action="{{ route('productos.update', $producto->id) }}" role="form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nombre_producto">Nombre del Producto:</label>
                            <input type="text" name="nombre_producto" class="form-control @error('nombre_producto') is-invalid @enderror" value="{{ old('nombre_producto', $producto->nombre_producto) }}" required>
                            @error('nombre_producto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="descripcion_producto">Descripción:</label>
                            <textarea name="descripcion_producto" class="form-control @error('descripcion_producto') is-invalid @enderror" required>{{ old('descripcion_producto', $producto->descripcion_producto) }}</textarea>
                            @error('descripcion_producto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="precio">Precio:</label>
                            <input type="number" step="0.01" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{ old('precio', $producto->precio) }}" required>
                            @error('precio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="existencias_stock">Existencias en Stock:</label>
                            <input type="number" name="existencias_stock" class="form-control @error('existencias_stock') is-invalid @enderror" value="{{ old('existencias_stock', $producto->existencias_stock) }}" required>
                            @error('existencias_stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="id_marca">Marca:</label>
                            <select name="id_marca" class="form-control" required>
                                <option value="">Seleccione una marca</option>
                                @foreach($marcas as $marca)
                                    <option value="{{ $marca->id }}" {{ $marca->id == $producto->id_marca ? 'selected' : '' }}>{{ $marca->nombre_marca }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="id_categoria">Categoría:</label>
                            <select name="id_categoria" class="form-control" required>
                                <option value="">Seleccione una categoría</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ $categoria->id == $producto->id_categoria ? 'selected' : '' }}>{{ $categoria->nombre_categoria }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="imagen">Imagen:</label>
                            <input type="file" name="imagen" class="form-control" id="imagen">
                            @if($producto->imagen)
                                <p class="mt-2">Imagen actual: <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre_producto }}" width="100"></p>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
