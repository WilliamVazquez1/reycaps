@extends('layouts.app')

@section('template_title')
    {{ __('Direcciones de Envío') }}
@endsection

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4" style="font-weight: bold; color: #333;">Direcciones de Envío</h1>

    @if ($direcciones->isEmpty())
        <p class="text-center text-muted" style="font-size: 1.2em;">No hay direcciones registradas.</p>
    @else
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <a href="{{ route('direccion_envio.create') }}" class="btn btn-warning btn-lg" style="padding: 10px 20px; font-size: 1.2em;">
                    <i class="fas fa-plus"></i> Añadir Otra Dirección
                </a>
            </div>
        </div>

        <table class="table table-striped table-bordered shadow-sm" style="background-color: #fff;">
            <thead style="background-color: #343a40; color: #fff;">
                <tr>
                    <th style="text-align: center;">ID Dirección</th>
                    <th style="text-align: center;">Calle</th>
                    <th style="text-align: center;">Número Interior</th>
                    <th style="text-align: center;">Número Exterior</th>
                    <th style="text-align: center;">Código</th>
                    <th style="text-align: center;">Delegación</th>
                    <th style="text-align: center;">Ciudad</th>
                    <th style="text-align: center;">Estado</th>
                    <th style="text-align: center;">Colonia</th>
                    <th style="text-align: center;">Referencias</th>
                    <th style="text-align: center;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($direcciones as $direccion)
                    <tr style="vertical-align: middle;">
                        <td style="text-align: center;">
                            <span style="font-weight: 500; color: #333;">{{ $direccion->id_direccion_envio }}</span>
                        </td>
                        <td style="text-align: center;">{{ $direccion->calle }}</td>
                        <td style="text-align: center;">{{ $direccion->numero_interior }}</td>
                        <td style="text-align: center;">{{ $direccion->numero_exterior }}</td>
                        <td style="text-align: center;">
    {{ $direccion->codigo_postal?->descripcion_codigo ?? '51200' }}
</td>
                        <td style="text-align: center;">{{ $direccion->delegacion->nombre_delegacion ?? 'Temascaltepec' }}</td>
                        <td style="text-align: center;">{{ $direccion->ciudad->nombre_ciudad ?? 'Ciudad de Mexico'}}</td>
                        <td style="text-align: center;">{{ $direccion->estado->nombre_estado ?? 'Estado de Mexico' }}</td>
                        <td style="text-align: center;">{{ $direccion->colonia }}</td>
                        <td style="text-align: center;">{{ $direccion->referencias }}</td>
                        <td style="text-align: center;">
                            <a class="btn btn-info btn-sm" href="{{ route('direccion_envio.show', $direccion->id_direccion_envio) }}">
                                Mostrar
                            </a>
                            <a class="btn btn-primary btn-sm" href="{{ route('direccion_envio.edit', $direccion->id_direccion_envio) }}">
                                Editar
                            </a>
                            <form action="{{ route('direccion_envio.destroy', $direccion->id_direccion_envio) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {!! $direcciones->links() !!} <!-- Paginación -->
    @endif

    @if(session('tramitar'))
        <div class="text-center mt-3">
            <a href="{{ route('confirmar.pago') }}" class="btn btn-success" style="padding: 10px 20px; font-size: 1.2em;">
                <i class="fas fa-arrow-right"></i> Continuar
            </a>
        </div>
    @endif
</div>
@endsection

@section('styles')
    <style>
        body {
            background-color: #f8f9fa; /* Color de fondo claro */
            color: #333; /* Color de texto oscuro */
        }
        .card {
            margin-top: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
        }
        .table {
            background-color: #ffffff !important; /* Fondo blanco para la tabla */
        }
        .table th, .table td {
            border-color: #dddddd; /* Color de borde suave */
        }
        .btn-warning {
            background-color: #ffc107; /* Color amarillo para el botón de advertencia */
            border-color: #ffc107;
            color: #212529; /* Color de texto oscuro */
        }
        .btn-primary {
            background-color: #007bff; /* Color azul más oscuro para el botón primario */
            border-color: #007bff;
        }
        .btn-danger {
            background-color: #dc3545; /* Color rojo para el botón de eliminar */
            border-color: #dc3545;
            color: #fff; /* Color de texto blanco */
        }
    </style>
@endsection
