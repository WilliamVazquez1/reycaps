@extends('layouts.app')

@section('template_title')
    {{ __('Edit') }} Marca
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">{{ __('Edit') }} Marca</span>
                </div>
                <div class="card-body bg-white">
                    <form method="POST" action="{{ route('marcas.update', $marca->id_marca) }}" role="form">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nombre_marca">Nombre Marca:</label>
                            <input type="text" name="nombre_marca" class="form-control @error('nombre_marca') is-invalid @enderror" value="{{ old('nombre_marca', $marca->nombre_marca) }}" id="nombre_marca" placeholder="Nombre de la Marca" required>
                            @error('nombre_marca')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="descripcion_marca">Descripción:</label>
                            <input type="text" name="descripcion_marca" class="form-control @error('descripcion_marca') is-invalid @enderror" value="{{ old('descripcion_marca', $marca->descripcion_marca) }}" id="descripcion_marca" placeholder="Descripción de la Marca" required>
                            @error('descripcion_marca')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
