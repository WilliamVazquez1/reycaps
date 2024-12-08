@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Venta
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Venta</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('ventas.store') }}" role="form">
                            @csrf

                            <div class="form-group">
                                <label for="id_producto">Id Producto:</label>
                                <input type="number" name="id_producto" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="id_cliente">Id Cliente:</label>
                                <input type="number" name="id_cliente" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="cantidad">Cantidad:</label>
                                <input type="number" name="cantidad" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="total">Total:</label>
                                <input type="number" name="total" class="form-control" step="0.01" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
