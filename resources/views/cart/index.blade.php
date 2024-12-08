@extends('layouts.app') 

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4" style="font-weight: bold; color: #333;">Carrito de Compras</h1>

    @if (empty($cart))
        <p class="text-center text-muted" style="font-size: 1.2em;">No hay productos en el carrito.</p>
    @else
        <table class="table table-striped table-bordered shadow-sm" style="background-color: #fff;">
            <thead style="background-color: #343a40; color: #fff;">
                <tr>
                    <th style="text-align: center;">Producto</th>
                    <th style="text-align: center;">Precio</th>
                    <th style="text-align: center;">Cantidad</th>
                    <th style="text-align: center;">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $item)
                    <tr style="vertical-align: middle;">
                        <td style="text-align: center;">
                            <span style="font-weight: 500; color: #333;">{{ $item['name'] }}</span>
                        </td>
                        <td style="text-align: center; font-size: 1.1em; color: #007bff;">${{ number_format($item['price'], 2) }}</td>
                        <td style="text-align: center;">{{ $item['quantity'] }}</td>
                        <td style="text-align: center; font-size: 1.1em; font-weight: bold;">${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Mostrar el mensaje sobre el envío gratis -->
        @if (!empty($mensajeEnvio))
            <div class="alert alert-info mt-4" style="font-size: 1.2em; text-align: center;">
                {{ $mensajeEnvio }}
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mt-4">
            <h3 style="font-weight: bold; color: #333;">Total: ${{ number_format(array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart)), 2) }}</h3>
            <a href="{{ route('direcciones.index', ['tramitar' => 'true']) }}" class="btn btn-success btn-lg" style="padding: 10px 20px; font-size: 1.2em;">
                <i class="fas fa-shopping-cart"></i> Tramitar Pedido
            </a>
        </div>
        
        <!-- Formulario para vaciar el carrito -->
        <form action="{{ route('cart.vaciar') }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-danger">Vaciar carrito</button>
        </form>
    @endif
</div>
@endsection
