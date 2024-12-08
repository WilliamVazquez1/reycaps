@extends('layouts.app')

@section('template_title')
    {{ __('Detalles de') }} Dirección de Envío
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">{{ __('Detalles de Dirección de Envío') }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-3">Calle:</h4>
                            <p>{{ $direccion->calle }}</p>
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-3">Número Interior:</h4>
                            <p>{{ $direccion->numero_interior }}</p>
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-3">Número Exterior:</h4>
                            <p>{{ $direccion->numero_exterior }}</p>
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-3">Código:</h4>
                            <p>{{ $direccion->codigopostal->descripcion_codigo ?? 'sin marca' }}</p>
                            
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-3">Delegación:</h4>
                            <p>{{ $direccion->delegacion->nombre_delegacion ?? 'sin delegación' }}</p>
                            </div>
                        <div class="col-md-6">
                            <h4 class="mb-3">Ciudad:</h4>
                            <p>{{ $direccion->ciudad->nombre_ciudad ?? 'sin ciudad' }}</p>
                            </div>
                        <div class="col-md-6">
                            <h4 class="mb-3">Estado:</h4>
                            <p>{{ $direccion->estado->nombre_estado ?? 'sin estado' }}</p>
                            </div>
                        <div class="col-md-6">
                            <h4 class="mb-3">Colonia:</h4>
                            <p>{{ $direccion->colonia }}</p>
                        </div>
                        <div class="col-md-12">
                            <h4 class="mb-3">Referencias:</h4>
                            <p>{{ $direccion->referencias }}</p>
                        </div>
                    </div>
                    <a href="{{ route('direccion_envio.index') }}" class="btn btn-primary mt-4">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
