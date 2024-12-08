@extends('layouts.app')

@section('template_title')
    {{ $producto->nombre }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">{{ $producto->nombre }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h4 class="mb-3">Nombre:</h4>
                            <p>{{ $producto->nombre }}</p>
                        </div>
                        <div class="col-md-4">
                            <h4 class="mb-3">Descripción:</h4>
                            <p>{{ $producto->descripcion }}</p>
                        </div>
                        <div class="col-md-4">
                            <h4 class="mb-3">Precio:</h4>
                            <p>${{ $producto->precio }}</p>
                        </div>
                        <div class="col-md-4">
                            <h4 class="mb-3">Stock:</h4>
                            <p>{{ $producto->stock }}</p>
                        </div>
                        <div class="col-md-4">
                            <h4 class="mb-3">Imagen:</h4>
                            @if ($producto->imagen)
                                <img src="{{ asset('storage/' . str_replace('public/', '', $producto->imagen)) }}" alt="{{ $producto->nombre }}" class="img-fluid rounded">
                            @else
                                <p>No image available</p>
                            @endif
                        </div>
                    </div>
                    <a href="{{ route('productos.index') }}" class="btn btn-primary mt-4">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
