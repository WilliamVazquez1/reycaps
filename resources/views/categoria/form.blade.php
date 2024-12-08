@extends('layouts.app')

@section('template_title')
    Editar Categoría - {{ $categoria->nombre_categoria }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">Editar Categoría - {{ $categoria->nombre_categoria }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('categorias.update', $categoria->id_categoria) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nombre" class="form-label">Nombre Categoría</label>
                            <input type="text" name="nombre_categoria" class="form-control @error('nombre_categoria') is-invalid @enderror" value="{{ old('nombre_categoria', $categoria->nombre_categoria) }}" id="nombre" placeholder="Nombre de la Categoría" required>
                            @error('nombre_categoria')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <input type="text" name="descripcion_categoria" class="form-control @error('descripcion_categoria') is-invalid @enderror" value="{{ old('descripcion_categoria', $categoria->descripcion_categoria) }}" id="descripcion" placeholder="Descripción de la Categoría">
                            @error('descripcion_categoria')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Actualizar Categoría</button>
                    </form>
                    <a href="{{ route('categorias.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
