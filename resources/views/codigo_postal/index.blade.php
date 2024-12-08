@extends('layouts.app')

@section('template_title')
    {{ __('Códigos Postales') }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #007bff; color: white;">
                    <h2>{{ __('Lista de Códigos Postales') }}</h2>
                    <a href="{{ route('codigo_postal.create') }}" class="btn btn-warning btn-lg">Agregar Código Postal</a>
                </div>

                <div class="card-body" style="background-color: rgba(255, 255, 255, 0.9); padding: 20px;">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" style="background-color: #ffffff;">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" style="background-color: #6c757d; color: #fff;">ID Código</th>
                                    <th scope="col" style="background-color: #ffc107; color: #fff;">Descripción</th>
                                    <th scope="col" style="background-color: #28a745; color: #fff;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($codigos as $codigo)
                                    <tr>
                                        <td style="background-color: #6c757d; color: #fff;">{{ $codigo->id_codigo }}</td>
                                        <td style="background-color: #ffc107; color: #fff;">{{ $codigo->descripcion_codigo }}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('codigo_postal.show', $codigo->id_codigo) }}" style="background-color: #007bff; color: #fff; font-weight: bold;">Mostrar</a>
                                            <a class="btn btn-primary btn-sm" href="{{ route('codigo_postal.edit', $codigo->id_codigo) }}" style="background-color: #0069d9; border-color: #0062cc; color: #fff; font-weight: bold;">Editar</a>
                                            <form action="{{ route('codigo_postal.destroy', $codigo->id_codigo) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" style="background-color: #dc3545; border-color: #dc3545; color: #fff; font-weight: bold;">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {!! $codigos->links() !!} <!-- Paginación -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
    <style>
        body {
            background-color: #007bff; /* Color de fondo azul */
            color: white; /* Color de texto blanco */
        }
        .card {
            margin-top: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
        }
        .btn-primary {
            background-color: #0069d9; /* Color azul más oscuro para el botón primario */
            border-color: #0062cc;
        }
        .btn-warning {
            background-color: #ffc107; /* Color amarillo para el botón de advertencia */
            border-color: #ffc107;
            color: #212529; /* Color de texto oscuro */
        }
        .table {
            background-color: #ffffff !important; /* Fondo blanco para la tabla */
        }
        .table th, .table td {
            border-color: #dddddd; /* Color de borde suave */
        }
    </style>
@endsection
