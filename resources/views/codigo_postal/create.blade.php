@extends('layouts.app')

@section('template_title')
    {{ __('Crear') }} Código Postal
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Código Postal</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('codigo_postal.store') }}" role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="descripcion_codigo">Descripción:</label>
                                <input type="text" name="descripcion_codigo" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
