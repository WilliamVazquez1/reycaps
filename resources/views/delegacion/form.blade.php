@extends('layouts.app')

@section('template_title')
    Editar Delegación - {{ $delegacion->nombre_delegacion }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">Editar Delegación - {{ $delegacion->nombre_delegacion }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('delegaciones.update', $delegacion->id_delegacion) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nombre_delegacion" class="form-label">Nombre Delegación</label>
                            <input type="text" name="nombre_delegacion" class="form-control @error('nombre_delegacion') is-invalid @enderror" value="{{ old('nombre_delegacion', $delegacion->nombre_delegacion) }}" id="nombre_delegacion" placeholder="Nombre de la Delegación">
                            @error('nombre_delegacion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Actualizar Delegación</button>
                    </form>
                    <a href="{{ route('delegaciones.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
