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
                                <input type="text" name="calle" class="form-control" required>
                            </div>

                            <!-- Número Interior -->
                            <div class="form-group">
                                <label for="numero_interior">Número Interior:</label>
                                <input type="number" name="numero_interior" class="form-control" required>
                            </div>

                            <!-- Número Exterior -->
                            <div class="form-group">
                                <label for="numero_exterior">Número Exterior:</label>
                                <input type="number" name="numero_exterior" class="form-control" required>
                            </div>

                            <!-- Código Postal -->
                            <div class="form-group">
                                <label for="id_codigo">Código Postal:</label>
                                <select name="id_codigo" class="form-control" required>
                                    <option value="">Seleccione un código postal</option>
                                    @foreach($codigos as $codigo)
                                        <option value="{{ $codigo->id }}">{{ $codigo->descripcion_codigo }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Delegación -->
                            <div class="form-group">
                                <label for="id_delegacion">Delegación:</label>
                                <select name="id_delegacion" class="form-control" required>
                                    <option value="">Seleccione una delegación</option>
                                    @foreach($delegaciones as $delegacion)
                                        <option value="{{ $delegacion->id }}">{{ $delegacion->nombre_delegacion}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Ciudad -->
                            <div class="form-group">
                                <label for="id_ciudad">Ciudad:</label>
                                <select name="id_ciudad" class="form-control" required>
                                    <option value="">Seleccione una ciudad</option>
                                    @foreach($ciudades as $ciudad)
                                        <option value="{{ $ciudad->id }}">{{ $ciudad->nombre_ciudad }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Estado -->
                            <div class="form-group">
                                <label for="id_estado">Estado:</label>
                                <select name="id_estado" class="form-control" required>
                                    <option value="">Seleccione un estado</option>
                                    @foreach($estados as $estado)
                                        <option value="{{ $estado->id }}">{{ $estado->nombre_estado}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Colonia -->
                            <div class="form-group">
                                <label for="colonia">Colonia:</label>
                                <input type="text" name="colonia" class="form-control" required>
                            </div>

                            <!-- Referencias -->
                            <div class="form-group">
                                <label for="referencias">Referencias:</label>
                                <textarea name="referencias" class="form-control" rows="3"></textarea>
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
