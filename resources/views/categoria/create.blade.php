@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Categoría
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if(Auth::user()->hasRole('admin'))
                    <div class="card card-default">
                        <div class="card-header">
                            <span class="card-title">{{ __('Create') }} Categoría</span>
                        </div>
                        <div class="card-body bg-white">
                            <form method="POST" action="{{ route('categorias.store') }}" role="form">
                                @csrf

                                <div class="form-group">
                                    <label for="nombre_categoria">Nombre:</label>
                                    <input type="text" name="nombre_categoria" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="descripcion_categoria">Descripción:</label>
                                    <textarea name="descripcion_categoria" class="form-control" rows="3" required></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="alert alert-danger">
                        No tienes permisos para crear categorías.
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
