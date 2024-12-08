@extends('layouts.app')

@section('template_title')
    {{ __('Venta ID: ') . $venta->id_venta }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">{{ __('Detalle de la Venta') }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-3">ID Venta:</h4>
                            <p>{{ $venta->id_venta }}</p>
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-3">Producto:</h4>
                            <p>{{ $venta->producto->nombre ?? 'Producto no disponible' }}</p>
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-3">Cliente:</h4>
                            <p>{{ $venta->cliente->nombre ?? 'Cliente no disponible' }}</p>
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-3">Cantidad:</h4>
                            <p>{{ $venta->cantidad }}</p>
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-3">Total:</h4>
                            <p>${{ number_format($venta->total, 2) }}</p>
                        </div>
                    </div>
                    <a href="{{ route('ventas.index') }}" class="btn btn-primary mt-4">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
