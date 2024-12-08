@extends('layouts.app')

@section('template_title')
    {{ __('Detalles de Proveedor') }} - {{ $proveedor->id_proveedor }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">{{ __('Detalles del Proveedor') }} - {{ $proveedor->id_proveedor }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="mb-3">ID Proveedor:</h4>
                            <p>{{ $proveedor->id_proveedor }}</p>
                        </div>
                        <div class="col-md-12">
                            <h4 class="mb-3">ID Persona:</h4>
                            <p>{{ $proveedor->id_persona }}</p>
                        </div>
                    </div>
                    <a href="{{ route('proveedores.index') }}" class="btn btn-primary mt-4">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
