@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Marca
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if(Auth::user()->hasRole('admin'))
                    <div class="card card-default">
                        <div class="card-header">
                            <span class="card-title">{{ __('Create') }} Marca</span>
                        </div>
                        <div class="card-body bg-white">
                            <form method="POST" action="{{ route('marcas.store') }}" role="form">
                                @csrf

                                <div class="form-group">
                                    <label for="nombre_marca">Nombre de la Marca:</label>
                                    <input type="text" name="nombre_marca" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="descripcion_marca">Descripción:</label>
                                    <textarea name="descripcion_marca" class="form-control" rows="3"></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="alert alert-danger">
                        No tienes permisos para crear marcas.
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
