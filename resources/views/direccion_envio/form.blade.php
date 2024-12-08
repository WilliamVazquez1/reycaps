@extends('layouts.app')

@section('template_title')
    Editar Dirección de Envío - {{ $direccionEnvio->id_direccion_envio }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">Editar Dirección de Envío - {{ $direccionEnvio->id_direccion_envio }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('direccion_envio.update', $direccionEnvio->id_direccion_envio) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="calle" class="form-label">Calle</label>
                            <input type="text" name="calle" class="form-control @error('calle') is-invalid @enderror" value="{{ old('calle', $direccionEnvio->calle) }}" id="calle" placeholder="Calle">
                            @error('calle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="numero_interior" class="form-label">Número Interior</label>
                            <input type="text" name="numero_interior" class="form-control @error('numero_interior') is-invalid @enderror" value="{{ old('numero_interior', $direccionEnvio->numero_interior) }}" id="numero_interior" placeholder="Número Interior">
                            @error('numero_interior')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="numero_exterior" class="form-label">Número Exterior</label>
                            <input type="text" name="numero_exterior" class="form-control @error('numero_exterior') is-invalid @enderror" value="{{ old('numero_exterior', $direccionEnvio->numero_exterior) }}" id="numero_exterior" placeholder="Número Exterior">
                            @error('numero_exterior')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="id_codigo" class="form-label">Código Postal</label>
                            <input type="text" name="id_codigo" class="form-control @error('id_codigo') is-invalid @enderror" value="{{ old('id_codigo', $direccionEnvio->id_codigo) }}" id="id_codigo" placeholder="Código Postal">
                            @error('id_codigo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="id_delegacion" class="form-label">Delegación</label>
                            <input type="text" name="id_delegacion" class="form-control @error('id_delegacion') is-invalid @enderror" value="{{ old('id_delegacion', $direccionEnvio->id_delegacion) }}" id="id_delegacion" placeholder="Delegación">
                            @error('id_delegacion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="id_ciudad" class="form-label">Ciudad</label>
                            <input type="text" name="id_ciudad" class="form-control @error('id_ciudad') is-invalid @enderror" value="{{ old('id_ciudad', $direccionEnvio->id_ciudad) }}" id="id_ciudad" placeholder="Ciudad">
                            @error('id_ciudad')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="id_estado" class="form-label">Estado</label>
                            <input type="text" name="id_estado" class="form-control @error('id_estado') is-invalid @enderror" value="{{ old('id_estado', $direccionEnvio->id_estado) }}" id="id_estado" placeholder="Estado">
                            @error('id_estado')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="colonia" class="form-label">Colonia</label>
                            <input type="text" name="colonia" class="form-control @error('colonia') is-invalid @enderror" value="{{ old('colonia', $direccionEnvio->colonia) }}" id="colonia" placeholder="Colonia">
                            @error('colonia')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="referencias" class="form-label">Referencias</label>
                            <input type="text" name="referencias" class="form-control @error('referencias') is-invalid @enderror" value="{{ old('referencias', $direccionEnvio->referencias) }}" id="referencias" placeholder="Referencias">
                            @error('referencias')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Actualizar Dirección</button>
                    </form>
                    <a href="{{ route('direccion_envio.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
