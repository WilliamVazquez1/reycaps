<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> <!-- Hoja de estilos principal -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> <!-- Tu hoja de estilos personalizada -->
    <!-- Agregar Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<style>
/* Tu CSS personalizado */
</style>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    @auth
    <!-- Mostrar enlaces de CRUD para el admin -->
    @if(Auth::check() && Auth::user()->hasRole('admin') && !Route::is('login') && !Route::is('register'))
        @foreach(['productos', 'direccion_envio', 'ciudades', 'estados', 'delegaciones', 'ventas', 'marcas', 'categorias', 'clientes', 'proveedores', 'codigo_postal'] as $route)
            <li class="nav-item">
                <a class="nav-link" href="{{ route($route . '.index') }}">{{ ucfirst($route) }}</a>
            </li>
        @endforeach
    <!-- Mostrar enlaces de CRUD para el cliente -->
    @elseif(Auth::check() && Auth::user()->hasRole('cliente') && !Route::is('login') && !Route::is('register'))
        @foreach(['productos', 'marcas', 'categorias','direccion_envio'] as $route)
            <li class="nav-item">
                <a class="nav-link" href="{{ route($route . '.index') }}">{{ ucfirst($route) }}</a>
            </li>
        @endforeach
    <!-- Mostrar enlaces de CRUD para el vendedor -->
    @elseif(Auth::check() && Auth::user()->hasRole('vendedor') && !Route::is('login') && !Route::is('register'))
        @foreach(['productos', 'direccion_envio', 'marcas', 'categorias', 'clientes', 'ventas'] as $route)
            <li class="nav-item">
                <a class="nav-link" href="{{ route($route . '.index') }}">{{ ucfirst($route) }}</a>
            </li>
        @endforeach
    @endif
@endauth

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Ícono del carrito de compras (izquierda) -->
                        <li class="nav-item me-3">
                            <a href="{{ route('cart.index') }}" class="nav-link">
                                <i class="fas fa-shopping-cart"></i>
                                @if (session()->has('cart'))
                                    <span class="badge rounded-pill bg-danger">
                                        {{ count(session('cart')) }}
                                    </span>
                                @endif
                            </a>
                        </li>

                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
