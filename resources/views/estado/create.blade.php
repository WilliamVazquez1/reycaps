@extends('layouts.app')

@section('template_title')
    {{ __('Crear') }} Estado
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Estado</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('estados.store') }}" role="form">
                            @csrf

                            <div class="form-group">
                                <label for="nombre_estado">Nombre Estado:</label>
                                <input type="text" name="nombre_estado" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ route('estados.index') }}" class="btn btn-secondary">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
