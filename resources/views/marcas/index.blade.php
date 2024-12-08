@extends('layouts.app')

@section('template_title')
    {{ __('Marcas') }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #007bff; color: white;">
                    <h2>{{ __('Lista de Marcas') }}</h2>
                    @if(Auth::user()->hasRole('admin'))
                        <a href="{{ route('marcas.create') }}" class="btn btn-warning btn-lg">Agregar Marca</a>
                    @endif
                </div>

                <div class="card-body" style="background-color: rgba(255, 255, 255, 0.9); padding: 20px;">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" style="background-color: #ffffff;">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" style="background-color: #6c757d; color: #fff;">Id Marca</th>
                                    <th scope="col" style="background-color: #ffc107; color: #fff;">Nombre Marca</th>
                                    <th scope="col" style="background-color: #ffc107; color: #fff;">Descripción Marca</th>
                                    <th scope="col" style="background-color: #28a745; color: #fff;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($marcas as $marca)
                                    <tr>
                                        <td style="background-color: #6c757d; color: #fff;">{{ $marca->id_marca }}</td>
                                        <td style="background-color: #ffc107; color: #fff;">{{ $marca->nombre_marca }}</td>
                                        <td style="background-color: #ffc107; color: #fff;">{{ $marca->descripcion_marca }}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('marcas.show', $marca->id_marca) }}" style="background-color: #007bff; color: #fff; font-weight: bold;">Mostrar</a>
                                            
                                            @if(Auth::user()->hasRole('admin'))
                                                <a class="btn btn-primary btn-sm" href="{{ route('marcas.edit', $marca->id_marca) }}" style="background-color: #0069d9; border-color: #0062cc; color: #fff; font-weight: bold;">Editar</a>
                                                <form action="{{ route('marcas.destroy', $marca->id_marca) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" style="background-color: #dc3545; border-color: #dc3545; color: #fff; font-weight: bold;">Eliminar</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {!! $marcas->links() !!}
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
