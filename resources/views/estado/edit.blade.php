@extends('layouts.app')

@section('template_title')
    {{ __('Edit') }} Estado
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Edit') }} Estado</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('estados.update', $estado->id_estado) }}" role="form">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nombre_estado">Nombre del Estado:</label>
                                <input type="text" name="nombre_estado" class="form-control" value="{{ $estado->nombre_estado }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
