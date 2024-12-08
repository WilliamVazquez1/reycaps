@extends('layouts.app')

@section('template_title')
    {{ $marca->nombre_marca }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">{{ $marca->nombre_marca }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h4 class="mb-3">ID de Marca:</h4>
                            <p>{{ $marca->id_marca }}</p>
                        </div>
                        <div class="col-md-4">
                            <h4 class="mb-3">Nombre:</h4>
                            <p>{{ $marca->nombre_marca }}</p>
                        </div>
                        <div class="col-md-4">
                            <h4 class="mb-3">Descripción:</h4>
                            <p>{{ $marca->descripcion_marca }}</p>
                        </div>
                    </div>
                    <a href="{{ route('marcas.index') }}" class="btn btn-primary mt-4">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
