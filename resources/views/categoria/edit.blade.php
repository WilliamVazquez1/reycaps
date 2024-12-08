@extends('layouts.app')

@section('template_title')
    {{ __('Edit') }} Categoría
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Edit') }} Categoría</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('categorias.update', $categoria->id_categoria) }}" role="form">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nombre_categoria">Nombre de la Categoría:</label>
                                <input type="text" name="nombre_categoria" class="form-control" value="{{ $categoria->nombre_categoria }}" required>
                            </div>

                            <div class="form-group">
                                <label for="descripcion_categoria">Descripción de la Categoría:</label>
                                <textarea name="descripcion_categoria" class="form-control" rows="3">{{ $categoria->descripcion_categoria }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
