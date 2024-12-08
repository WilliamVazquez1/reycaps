@extends('layouts.app')

@section('template_title')
    {{ __('Ticket de Compra') }}
@endsection

@section('content')
<div class="container">
    <h2>{{ __('Ticket de Compra') }}</h2>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @if($cart && count($cart) > 0)
                    @foreach($cart as $details)
                        <tr>
                            <td>{{ $details['name'] }}</td>
                            <td>{{ $details['quantity'] }}</td>
                            <td>${{ number_format($details['price'], 2) }}</td>
                            <td>${{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="text-center">No hay productos en el carrito.</td>
                    </tr>
                @endif
            </tbody>
        </table>

        @if(session()->has('order'))
            @php $order = session('order'); @endphp
            <h4>Total: ${{ number_format(array_sum(array_column($cart, 'price', 'quantity')), 2) }}</h4>
            <h4>Dirección de Envío: {{ $order['address'] }}</h4>
        @else
            <h4>Total: ${{ number_format(0, 2) }}</h4>
        @endif
    </div>
</div>
@endsection
