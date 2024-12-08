@extends('layouts.app')

@section('template_title')
    {{ $delegacion->nombre_delegacion }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">{{ $delegacion->nombre_delegacion }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-3">Nombre de la Delegación:</h4>
                            <p>{{ $delegacion->nombre_delegacion }}</p>
                        </div>
                    </div>
                    <a href="{{ route('delegaciones.index') }}" class="btn btn-primary mt-4">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
