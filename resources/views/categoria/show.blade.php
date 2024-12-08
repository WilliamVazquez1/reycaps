@extends('layouts.app')

@section('template_title')
    {{ $categoria->nombre_categoria }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">{{ $categoria->nombre_categoria }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="mb-3">ID de Categoría:</h4>
                            <p>{{ $categoria->id_categoria }}</p>
                        </div>
                        <div class="col-md-12">
                            <h4 class="mb-3">Nombre de la Categoría:</h4>
                            <p>{{ $categoria->nombre_categoria }}</p>
                        </div>
                        <div class="col-md-12">
                            <h4 class="mb-3">Descripción de la Categoría:</h4>
                            <p>{{ $categoria->descripcion_categoria ?? 'No hay descripción disponible' }}</p>
                        </div>
                    </div>
                    <a href="{{ route('categorias.index') }}" class="btn btn-primary mt-4">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
