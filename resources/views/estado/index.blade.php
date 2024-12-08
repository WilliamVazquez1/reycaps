@extends('layouts.app')

@section('template_title')
    {{ __('Estados') }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #007bff; color: white;">
                    <h2>{{ __('Lista de Estados') }}</h2>
                    <a href="{{ route('estados.create') }}" class="btn btn-warning btn-lg">Agregar Estado</a>
                </div>

                <div class="card-body" style="background-color: rgba(255, 255, 255, 0.9); padding: 20px;">
                    <!-- Mostrar mensajes de éxito o error -->
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @elseif (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Mostrar errores de validación -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" style="background-color: #ffffff;">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" style="background-color: #6c757d; color: #fff;">Id Estado</th>
                                    <th scope="col" style="background-color: #ffc107; color: #fff;">Nombre Estado</th>
                                    <th scope="col" style="background-color: #28a745; color: #fff;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($estados as $estado)
                                    <tr>
                                        <td style="background-color: #6c757d; color: #fff;">{{ $estado->id_estado }}</td>
                                        <td style="background-color: #ffc107; color: #fff;">{{ $estado->nombre_estado }}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('estados.show', $estado->id_estado) }}" style="background-color: #007bff; color: #fff; font-weight: bold;">Mostrar</a>
                                            <a class="btn btn-primary btn-sm" href="{{ route('estados.edit', $estado->id_estado) }}" style="background-color: #0069d9; border-color: #0062cc; color: #fff; font-weight: bold;">Editar</a>
                                            <form action="{{ route('estados.destroy', $estado->id_estado) }}" method="POST" style="display:inline-block;">
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

                    {!! $estados->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
    <style>
        body {
            background-color: #007bff;
            color: white;
        }
        .card {
            margin-top: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
        }
        .btn-primary {
            background-color: #0069d9;
            border-color: #0062cc;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004c99;
        }
        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #212529;
        }
        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #d39e00;
        }
        .btn-info.btn-sm:hover,
        .btn-primary.btn-sm:hover,
        .btn-danger.btn-sm:hover {
            opacity: 0.9;
        }
        .table {
            background-color: #ffffff !important;
        }
        .table th, .table td {
            border-color: #dddddd;
        }
    </style> 
@endsection
