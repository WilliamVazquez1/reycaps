@extends('layouts.app')

@section('template_title')
    {{ $ciudad->nombre_ciudad }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">{{ $ciudad->nombre_ciudad }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-3">Nombre:</h4>
                            <p>{{ $ciudad->nombre_ciudad }}</p>
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-3">ID Dirección de Envío:</h4>
                            <p>{{ $ciudad->id_direccion_envio ?? 'No disponible' }}</p>
                        </div>
                    </div>
                    <a href="{{ route('ciudades.index') }}" class="btn btn-primary mt-4">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
