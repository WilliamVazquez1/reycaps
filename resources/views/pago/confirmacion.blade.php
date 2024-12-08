@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4" style="font-weight: bold; color: #333;">Confirmación de Pago</h1>

    @if (session('success'))
        <div class="alert alert-success text-center" style="font-size: 1.2em; background-color: #d4edda; border-color: #c3e6cb; color: #155724;">
            {{ session('success') }}
        </div>
    @endif

    <p class="text-center" style="font-size: 1.1em; color: #555;">¡Gracias por tu compra! Tu pago ha sido confirmado exitosamente.</p>
</div>
@endsection
