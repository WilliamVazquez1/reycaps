@extends('layouts.app')

@section('template_title')
    {{ __('Crear Cliente') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear Cliente') }}</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('clientes.store') }}" role="form" enctype="multipart/form-data">
                            @csrf


                            <div class="form-group">
                                <label for="id_direccion_envio">ID Dirección de Envío:</label>
                                <input type="number" name="id_direccion_envio" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="contrasena">Contraseña:</label>
                                <input type="password" name="contrasena" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
