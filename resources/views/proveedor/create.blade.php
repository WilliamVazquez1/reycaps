@extends('layouts.app')

@section('template_title')
    {{ __('Crear') }} Proveedor
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Proveedor</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('proveedores.store') }}" role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="id_persona">ID Persona:</label>
                                <input type="number" name="id_persona" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
