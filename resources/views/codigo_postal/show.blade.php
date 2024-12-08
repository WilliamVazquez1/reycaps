@extends('layouts.app')

@section('template_title')
    {{ __('Detalles de') }} Código Postal
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">{{ __('Detalles de Código Postal') }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-3">ID Código:</h4>
                            <p>{{ $codigo_postal->id_codigo }}</p>
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-3">Descripción:</h4>
                            <p>{{ $codigo_postal->descripcion_codigo }}</p>
                        </div>
                       
                    <a href="{{ route('codigo_postal.index') }}" class="btn btn-primary mt-4">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
