@extends('layouts.app')

@section('template_title')
    {{ __('Editar Cliente') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Editar Cliente') }}</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('clientes.update', $cliente->id_cliente) }}" role="form" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')


                            <div class="form-group">
                                <label for="id_direccion_envio">ID Dirección de Envío:</label>
                                <input type="number" name="id_direccion_envio" class="form-control" value="{{ $cliente->id_direccion_envio }}">
                            </div>

                            <div class="form-group">
                                <label for="contrasena">Contraseña:</label>
                                <input type="password" name="contrasena" class="form-control" placeholder="Actualizar contraseña (opcional)">
                                <small class="form-text text-muted">Deja el campo en blanco si no deseas cambiar la contraseña.</small>
                            </div>

                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
