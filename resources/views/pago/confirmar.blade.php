@extends('layouts.app')

@section('template_title')
    {{ __('Confirmar Pago') }}
@endsection

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4" style="font-weight: bold; color: #333;">Confirmar Pago</h1>
    <p class="text-center" style="font-size: 1.2em;">Por favor revisa tu información antes de proceder al pago.</p>

    @if (empty($cart))
        <p class="text-center text-muted" style="font-size: 1.2em;">No hay productos en el carrito.</p>
    @else
        <h3 class="text-center mb-4" style="font-weight: bold; color: #333;">Detalles de tu pedido:</h3>
        
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
                        <td style="text-align: center;">{{ $item['name'] ?? 'N/A' }}</td>
                        <td style="text-align: center;">${{ $item['price'] ?? '0.00' }}</td>
                        <td style="text-align: center;">{{ $item['quantity'] ?? '0' }}</td>
                        <td style="text-align: center;">${{ ($item['price'] ?? 0) * ($item['quantity'] ?? 0) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3 class="text-center mt-4" style="font-weight: bold; color: #333;">Total: ${{ collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']) }}</h3>
        
        <div class="text-center mt-4">
            <form action="{{ route('proceso.pago') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success btn-lg" style="padding: 10px 20px; font-size: 1.2em;">
                    <i class="fas fa-check-circle"></i> Confirmar Pago
                </button>
            </form>
        </div>
    @endif
</div>
@endsection

@section('styles')
    <style>
        body {
            background-color: #f8f9fa;
            color: #333;
        }
        .card {
            margin-top: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
        }
        .table {
            background-color: #ffffff !important;
        }
        .table th, .table td {
            border-color: #dddddd;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            color: #fff;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
    </style>
@endsection
