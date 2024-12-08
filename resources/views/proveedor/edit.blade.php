@extends('layouts.app')

@section('template_title')
    {{ __('Editar') }} Proveedor
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Editar') }} Proveedor</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('proveedores.update', $proveedor->id_proveedor) }}" role="form" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="id_persona">ID Persona:</label>
                                <input type="number" name="id_persona" class="form-control" value="{{ old('id_persona', $proveedor->id_persona) }}" required>
                            </div>

                            

                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
