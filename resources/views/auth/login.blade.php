@extends('layouts.app')

@section('content')
<style>
    body {
        background-image: url('{{ asset('images/4.jpg') }}'); /* Cambia el nombre de la imagen según corresponda */
        background-size: cover; /* Cubrir toda la pantalla */
        background-position: center; /* Centrar la imagen */
        background-repeat: no-repeat; /* Evita que la imagen se repita */
        color: #fff; /* Color del texto */
    }

    .card {
        background-color: rgba(0, 0, 0, 0.8); /* Fondo oscuro semitransparente para mayor contraste */
        border-radius: 15px; /* Bordes redondeados */
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5); /* Sombra */
    }

    .card-header {
        background-color: #000; /* Color de fondo negro para el encabezado */
        color: #ffcc00; /* Color de texto amarillo */
        text-align: center; /* Centrar el texto */
        font-size: 1.5rem; /* Tamaño de fuente mayor */
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    label {
        color: #ffcc00; /* Resaltar etiquetas en color amarillo */
        font-weight: bold; /* Hacer las etiquetas más prominentes */
    }

    .form-control {
        border-radius: 10px; /* Bordes redondeados en los inputs */
        border: 1px solid #ffcc00; /* Bordes amarillos */
        background-color: rgba(255, 255, 255, 0.8); /* Fondo blanco semitransparente */
        color: #000; /* Texto negro */
    }

    .form-control:focus {
        box-shadow: 0 0 5px rgba(255, 204, 0, 0.5); /* Efecto de enfoque amarillo */
        border-color: #ffcc00; /* Color del borde al enfocar */
    }

    .btn-primary {
        background-color: #ffcc00; /* Color de fondo amarillo del botón */
        border: none; /* Sin borde */
        color: black; /* Color de texto negro */
        border-radius: 10px; /* Bordes redondeados */
        padding: 10px 20px; /* Padding */
        transition: background-color 0.3s; /* Transición suave */
    }

    .btn-primary:hover {
        background-color: #e6b800; /* Cambiar a un amarillo más oscuro al pasar el ratón */
    }

    .btn-link {
        color: #ffcc00; /* Color dorado del enlace de la contraseña olvidada */
    }

    .btn-link:hover {
        text-decoration: underline; /* Subrayar al pasar el ratón */
        color: #ffd700; /* Color dorado más claro al pasar el ratón */
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Inicio de sesión') }}</div>

                @if (session('status'))
                    <div class="alert alert-warning text-center mt-3">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo electrónico*') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña*') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Iniciar Sesión') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
