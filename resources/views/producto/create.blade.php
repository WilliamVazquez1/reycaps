@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Producto
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if(Auth::user()->hasRole('admin'))
                    <div class="card card-default">
                        <div class="card-header">
                            <span class="card-title">{{ __('Create') }} Producto</span>
                        </div>
                        <div class="card-body bg-white">
                            <form method="POST" action="{{ route('productos.store') }}" role="form" enctype="multipart/form-data">
                                @csrf

                                <!-- Nombre del Producto -->
                                <div class="form-group">
                                    <label for="nombre_producto">Nombre del Producto:</label>
                                    <input type="text" name="nombre_producto" class="form-control" required>
                                </div>

                                <!-- Descripción del Producto -->
                                <div class="form-group">
                                    <label for="descripcion_producto">Descripción del Producto:</label>
                                    <textarea name="descripcion_producto" class="form-control" rows="3" required></textarea>
                                </div>

                                <!-- Precio -->
                                <div class="form-group">
                                    <label for="precio">Precio:</label>
                                    <input type="number" name="precio" class="form-control" step="0.01" required>
                                </div>

                                <!-- Existencias en Stock -->
                                <div class="form-group">
                                    <label for="existencias_stock">Existencias en Stock:</label>
                                    <input type="number" name="existencias_stock" class="form-control" required>
                                </div>

                                <!-- Marca -->
                                <div class="form-group">
                                    <label for="id_marca">Marca:</label>
                                    <select name="id_marca" class="form-control" required>
                                        <option value="">Seleccione una marca</option>
                                        @foreach($marcas as $marca)
                                            <option value="{{ $marca->id_marca }}">{{ $marca->nombre_marca }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Categoría -->
                                <div class="form-group">
                                    <label for="id_categoria">Categoría:</label>
                                    <select name="id_categoria" class="form-control" required>
                                        <option value="">Seleccione una categoría</option>
                                        @foreach($categorias as $categoria)
                                            <option value="{{ $categoria->id_categoria }}">{{ $categoria->nombre_categoria }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Imagen -->
                                <div class="form-group">
                                    <label for="imagen">Imagen:</label>
                                    <input type="file" name="imagen" class="form-control-file">
                                </div>

                                <!-- Botón Guardar -->
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="alert alert-danger">
                        No tienes permisos para crear productos.
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
