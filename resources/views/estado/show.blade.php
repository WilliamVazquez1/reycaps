@extends('layouts.app')

@section('template_title')
    {{ $estado->nombre_estado }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">{{ $estado->nombre_estado }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-3">ID Estado:</h4>
                            <p>{{ $estado->id_estado }}</p>
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-3">Nombre:</h4>
                            <p>{{ $estado->nombre_estado }}</p>
                        </div>
                    </div>
                    <a href="{{ route('estados.index') }}" class="btn btn-primary mt-4">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
