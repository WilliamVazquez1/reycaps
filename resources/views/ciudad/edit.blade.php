@extends('layouts.app')

@section('template_title')
    {{ __('Edit') }} Ciudad
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Edit') }} Ciudad</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('ciudades.update', $ciudad->id_ciudad) }}" role="form" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nombre_ciudad">Nombre:</label>
                                <input type="text" name="nombre_ciudad" class="form-control" value="{{ $ciudad->nombre_ciudad }}" required>
                            </div>

                            <div class="form-group">
                                <label for="id_direccion_envio">ID Dirección de Envío:</label>
                                <input type="number" name="id_direccion_envio" class="form-control" value="{{ $ciudad->id_direccion_envio }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
