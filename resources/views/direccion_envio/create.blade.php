@extends('layouts.app')

@section('template_title')
    {{ __('Crear') }} Dirección de Envío
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Dirección de Envío</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('direccion_envio.store') }}" role="form" enctype="multipart/form-data">
                            @csrf

                            <!-- Calle -->
                            <div class="form-group">
                                <label for="calle">Calle:</label>
                                <input type="text" name="calle" class="form-control" required value="{{ old('calle') }}">
                            </div>

                            <!-- Número Interior -->
                            <div class="form-group">
                                <label for="numero_interior">Número Interior:</label>
                                <input type="number" name="numero_interior" class="form-control" required value="{{ old('numero_interior') }}">
                            </div>

                            <!-- Número Exterior -->
                            <div class="form-group">
                                <label for="numero_exterior">Número Exterior:</label>
                                <input type="number" name="numero_exterior" class="form-control" required value="{{ old('numero_exterior') }}">
                            </div>

                            <!-- Código Postal -->
                            <div class="form-group">
                                <label for="id_codigo">Código Postal:</label>
                                <input type="text" name="id_codigo" class="form-control" required value="{{ old('id_codigo') }}" placeholder="Ejemplo: 51200">
                            </div>

                            <!-- Delegación -->
                            <div class="form-group">
                                <label for="id_delegacion">Delegación:</label>
                                <input type="text" name="id_delegacion" class="form-control" required value="{{ old('id_delegacion') }}" placeholder="Ejemplo: Temascaltepec">
                            </div>

                            <!-- Ciudad -->
                            <div class="form-group">
                                <label for="id_ciudad">Ciudad:</label>
                                <input type="text" name="id_ciudad" class="form-control" required value="{{ old('id_ciudad') }}" placeholder="Ejemplo: Ciudad de México">
                            </div>

                            <!-- Estado -->
                            <div class="form-group">
                                <label for="id_estado">Estado:</label>
                                <input type="text" name="id_estado" class="form-control" required value="{{ old('id_estado') }}" placeholder="Ejemplo: Estado de México">
                            </div>

                            <!-- Colonia -->
                            <div class="form-group">
                                <label for="colonia">Colonia:</label>
                                <input type="text" name="colonia" class="form-control" required value="{{ old('colonia') }}">
                            </div>

                            <!-- Referencias -->
                            <div class="form-group">
                                <label for="referencias">Referencias:</label>
                                <textarea name="referencias" class="form-control" rows="3" value="{{ old('referencias') }}"></textarea>
                            </div>

                            <!-- Botón Guardar -->
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection