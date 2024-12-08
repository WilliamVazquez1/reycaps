@extends('layouts.app')

@section('template_title')
    {{ __('Editar') }} Código Postal
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Editar') }} Código Postal</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('codigo_postal.update', $codigo_postal->id_codigo) }}" role="form" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="descripcion_codigo">Descripción:</label>
                                <input type="text" name="descripcion_codigo" class="form-control" value="{{ old('descripcion_codigo', $codigo_postal->descripcion_codigo) }}" required>
                            </div>
                            </div>


                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
