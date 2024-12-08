@extends('layouts.app')

@section('template_title')
    {{ __('Editar') }} Dirección de Envío
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Editar') }} Dirección de Envío</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('direccion_envio.update', $direccion->id_direccion_envio) }}" role="form" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="calle">Calle:</label>
                                <input type="text" name="calle" class="form-control" value="{{ old('calle', $direccion->calle) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="numero_interior">Número Interior:</label>
                                <input type="number" name="numero_interior" class="form-control" value="{{ old('numero_interior', $direccion->numero_interior) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="numero_exterior">Número Exterior:</label>
                                <input type="number" name="numero_exterior" class="form-control" value="{{ old('numero_exterior', $direccion->numero_exterior) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="id_codigo">Código:</label>
                                <input type="number" name="id_codigo" class="form-control" value="{{ old('id_codigo', $direccion->id_codigo) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="id_delegacion">Delegación:</label>
                                <input type="number" name="id_delegacion" class="form-control" value="{{ old('id_delegacion', $direccion->id_delegacion) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="id_ciudad">Ciudad:</label>
                                <input type="number" name="id_ciudad" class="form-control" value="{{ old('id_ciudad', $direccion->id_ciudad) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="id_estado">Estado:</label>
                                <input type="number" name="id_estado" class="form-control" value="{{ old('id_estado', $direccion->id_estado) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="colonia">Colonia:</label>
                                <input type="text" name="colonia" class="form-control" value="{{ old('colonia', $direccion->colonia) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="referencias">Referencias:</label>
                                <textarea name="referencias" class="form-control" rows="3">{{ old('referencias', $direccion->referencias) }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
