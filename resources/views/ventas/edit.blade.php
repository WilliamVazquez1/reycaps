@extends('layouts.app')

@section('template_title')
    {{ __('Edit') }} Venta
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Edit') }} Venta</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('ventas.update', $venta->id_venta) }}" role="form">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="id_producto">Producto:</label>
                                <select name="id_producto" class="form-control" required>
                                    @foreach($productos as $producto)
                                        <option value="{{ $producto->id_producto }}" 
                                            {{ $venta->id_producto == $producto->id_producto ? 'selected' : '' }}>
                                            {{ $producto->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="id_cliente">Cliente:</label>
                                <select name="id_cliente" class="form-control" required>
                                    @foreach($clientes as $cliente)
                                        <option value="{{ $cliente->id_cliente }}" 
                                            {{ $venta->id_cliente == $cliente->id_cliente ? 'selected' : '' }}>
                                            {{ $cliente->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="cantidad">Cantidad:</label>
                                <input type="number" name="cantidad" class="form-control" value="{{ $venta->cantidad }}" required>
                            </div>

                            <div class="form-group">
                                <label for="total">Total:</label>
                                <input type="number" name="total" class="form-control" step="0.01" value="{{ $venta->total }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
