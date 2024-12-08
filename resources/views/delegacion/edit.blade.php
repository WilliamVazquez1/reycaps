@extends('layouts.app')

@section('template_title')
    {{ __('Edit') }} Delegacion
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Edit') }} Delegacion</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('delegaciones.update', $delegacion->id_delegacion) }}" role="form">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nombre_delegacion">Nombre de la Delegación:</label>
                                <input type="text" name="nombre_delegacion" class="form-control" id="nombre_delegacion" value="{{ $delegacion->nombre_delegacion }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
