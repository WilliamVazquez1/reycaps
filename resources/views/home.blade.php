<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mi Aplicación</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
body {
    display: flex;
    background: #f5f5f7;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    color: #1d1d1f;
    margin: 0;
    padding: 0;
}

.sidebar {
    width: 250px;
    height: 100vh;
    background-color: #000000;
    color: #ffffff;
    position: fixed;
    border-right: 1px solid #1c1c1e;
    box-shadow: 2px 0 6px rgba(0, 0, 0, 0.2);
    padding-top: 20px;
}

.sidebar .brand-link img {
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.sidebar .brand-link h5 {
    font-size: 1.4em;
    font-weight: 600;
    color: #ffffff;
    letter-spacing: 1px;
    margin-top: 10px;
}

.sidebar .nav-link {
    color: #e5e5e7 !important;
    padding: 12px 20px;
    font-weight: 500;
    transition: background-color 0.2s ease-in-out;
    border-radius: 8px;
    margin: 4px 10px;
}

.sidebar .nav-link i {
    margin-right: 8px;
    color: #e5e5e7 !important;
}

.sidebar .nav-link.active {
    background-color: #007aff;
    color: #ffffff !important;
    box-shadow: 0 2px 6px rgba(0,122,255,0.3);
}

.sidebar .nav-link:hover {
    background-color: #1c1c1e;
    color: #007aff !important;
}

.content-wrapper {
    margin-left: 250px;
    padding: 20px 30px;
    width: calc(100% - 250px);
    background-color: #f9f9f9;
    min-height: 100vh;
}

.navbar {
    background-color: #000000;
    border-bottom: 1px solid #1c1c1e;
    padding: 15px 30px;
    font-size: 1rem;
}

.navbar .nav-link {
    color: #f2f2f7 !important;
    font-weight: 500;
    margin-right: 15px;
    transition: color 0.2s ease-in-out;
}

.navbar .nav-link:hover {
    color: #007aff !important;
}

.navbar .dropdown-menu {
    background-color: #1c1c1e;
    border: none;
}

.navbar .dropdown-item {
    color: #f2f2f7;
}

.navbar .dropdown-item:hover {
    background-color: #2c2c2e;
    color: #007aff;
}

.card {
    border: none;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.12);
}

.card-img-top {
    border-bottom: 1px solid #e5e5e5;
}

.card-body {
    background: #fff;
    color: #1d1d1f;
    padding: 20px;
}

.card-title {
    font-weight: 600;
    font-size: 1.2em;
}

.card-text {
    font-size: 0.95em;
    color: #444;
}

.btn-primary {
    background-color: #007aff;
    border: none;
    padding: 10px 16px;
    border-radius: 8px;
    transition: background-color 0.2s ease-in-out;
}

.btn-primary:hover {
    background-color: #005bb5;
}

.carousel-container {
    width: 100%;
    max-width: 20%; /* Ajusta el porcentaje según sea necesario */
    margin: 40px auto;
    padding: 10px;
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.carousel-inner img {
    width: 100%;
    max-height: 100x;
    object-fit: cover;
    border-radius: 24px;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-color: #000;
    border-radius: 50%;
    padding: 10px;
}

.carousel-indicators li {
    background-color: #ccc;
}

.carousel-indicators .active {
    background-color: #007aff;
}

.lead {
    font-size: 1.1em;
    color: #333;
}

.text-success {
    color: #007a1e !important;
}

.text-warning {
    color: #c77f00 !important;
}
    </style>
</head>

<body>
    
    <!-- Sidebar -->
<aside class="sidebar">
    <div class="brand-link text-center py-3">
    <img src="{{ asset('images/4.jpg') }}" alt="Logo" style="width: 100px; height: auto; border: 1px solid white; margin: 10px;">
    <h5>EL REY CAPS</h5>
    </div>
    <nav class="nav flex-column">
        <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>

        @role('cliente')
            <!-- Enlaces específicos para el rol cliente -->
            <a href="{{ route('productos.index') }}" class="nav-link {{ request()->routeIs('productos.index') ? 'active' : '' }}">
                <i class="fas fa-box"></i> Productos
            </a>
            <a href="{{ route('marcas.index') }}" class="nav-link {{ request()->routeIs('marcas.index') ? 'active' : '' }}">
                <i class="fas fa-tags"></i> Marcas
            </a>
            <a href="{{ route('categorias.index') }}" class="nav-link {{ request()->routeIs('categorias.index') ? 'active' : '' }}">
                <i class="fas fa-th-list"></i> Categorías
            </a>
            <a href="{{ route('direccion_envio.index') }}" class="nav-link {{ request()->routeIs('direccion_envio.index') ? 'active' : '' }}">
                <i class="fas fa-shipping-fast"></i> Dirección Envío
            </a> 
        @endrole

        @role('vendedor')
            <!-- Enlaces específicos para el rol vendedor -->
            <a href="{{ route('categorias.index') }}" class="nav-link {{ request()->routeIs('categorias.index') ? 'active' : '' }}">
                <i class="fas fa-th-list"></i> Categorías
            </a>
            <a href="{{ route('marcas.index') }}" class="nav-link {{ request()->routeIs('marcas.index') ? 'active' : '' }}">
                <i class="fas fa-tags"></i> Marcas
            </a>
            <a href="{{ route('productos.index') }}" class="nav-link {{ request()->routeIs('productos.index') ? 'active' : '' }}">
                <i class="fas fa-box"></i> Productos
            </a>
            <a href="{{ route('direccion_envio.index') }}" class="nav-link {{ request()->routeIs('direccion_envio.index') ? 'active' : '' }}">
                <i class="fas fa-shipping-fast"></i> Dirección Envío
            </a>
            
            
            <a href="{{ route('ventas.index') }}" class="nav-link {{ request()->routeIs('ventas.index') ? 'active' : '' }}">
                <i class="fas fa-shopping-cart"></i> Ventas
            </a>
        @endrole

        @role('admin')
            <!-- Enlaces específicos para el rol admin -->
            <a href="{{ route('usuarios.pendientes') }}" class="nav-link {{ request()->routeIs('usuarios.pendientes') ? 'active' : '' }}">
    <i class="fas fa-users"></i> Usuarios
</a>

            <a href="{{ route('productos.index') }}" class="nav-link {{ request()->routeIs('productos.index') ? 'active' : '' }}">
                <i class="fas fa-box"></i> Productos
            </a>
            <a href="{{ route('direccion_envio.index') }}" class="nav-link {{ request()->routeIs('direccion_envio.index') ? 'active' : '' }}">
                <i class="fas fa-shipping-fast"></i> Dirección Envío
            </a>
            <a href="{{ route('ciudades.index') }}" class="nav-link {{ request()->routeIs('ciudades.index') ? 'active' : '' }}">
                <i class="fas fa-map-marker-alt"></i> Ciudades
            </a>
            <a href="{{ route('estados.index') }}" class="nav-link {{ request()->routeIs('estados.index') ? 'active' : '' }}">
                <i class="fas fa-flag"></i> Estados
            </a>
            <a href="{{ route('delegaciones.index') }}" class="nav-link {{ request()->routeIs('delegaciones.index') ? 'active' : '' }}">
                <i class="fas fa-building"></i> Delegaciones
            </a>
            <a href="{{ route('ventas.index') }}" class="nav-link {{ request()->routeIs('ventas.index') ? 'active' : '' }}">
                <i class="fas fa-shopping-cart"></i> Ventas
            </a>
            <a href="{{ route('marcas.index') }}" class="nav-link {{ request()->routeIs('marcas.index') ? 'active' : '' }}">
                <i class="fas fa-tags"></i> Marcas
            </a>
            <a href="{{ route('categorias.index') }}" class="nav-link {{ request()->routeIs('categorias.index') ? 'active' : '' }}">
                <i class="fas fa-th-list"></i> Categorías
            </a>
           
            <a href="{{ route('proveedores.index') }}" class="nav-link {{ request()->routeIs('proveedores.index') ? 'active' : '' }}">
                <i class="fas fa-handshake"></i> Proveedores
            </a>
            <a href="{{ route('codigo_postal.index') }}" class="nav-link {{ request()->routeIs('codigo_postal.index') ? 'active' : '' }}">
                <i class="fas fa-envelope"></i> Códigos Postales
            </a>
        @endrole
    </nav>
</aside>

            <!-- Agrega más enlaces aquí -->
        </nav>
    </aside>

    <div class="content-wrapper">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="display: none;">{{ config('app.name', 'Laravel') }}</a>

                <div class="collapse navbar-collapse">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
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

      <!-- Carrusel -->
<div id="myCarousel" class="carousel-container carousel slide mb-4" data-bs-ride="carousel">
    <!-- Indicadores -->
    <ol class="carousel-indicators">
        <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
        <li data-bs-target="#myCarousel" data-bs-slide-to="3"></li>
        <li data-bs-target="#myCarousel" data-bs-slide-to="4"></li>
        <li data-bs-target="#myCarousel" data-bs-slide-to="5"></li>
    </ol>

    <!-- Contenido de los slides -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/10.jpg') }}" alt="Los Angeles" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/1.jpg') }}" alt="Chicago" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/3.jpg') }}" alt="New York" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/2.jpg') }}" alt="New York" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/8.jpg') }}" alt="New York" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/9.jpg') }}" alt="New York" class="d-block w-100">
        </div>
    </div>

    <!-- Controles de navegación -->
    <a class="carousel-control-prev" href="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="container">
<h1 style="color: #1d1d1f; font-weight: 600; font-size: 2rem; margin-top: 30px;">🧢 Productos</h1>

    <div class="row">
        @foreach($productos->unique('id') as $producto) <!-- Filtrar productos únicos por id -->
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="{{ asset('storage/' . $producto->imagen) }}" class="card-img-top" alt="{{ $producto->nombre_producto }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->nombre_producto }}</h5>
                        <p class="card-text">{{ $producto->descripcion_producto }}</p>
                        <p class="card-text"><strong>Precio:</strong> ${{ $producto->precio }}</p>
                        <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-primary">Ver Detalles</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>




        <section class="content">
            @yield('content')
            <div class="card-body text-center">
                <p class="lead">Este contenido es privado</p>
                @role('admin')
                    <p class="text-success">Acceso exclusivo para Administrador</p>
                @endrole
                @role('cliente')
                    <p class="text-warning">Acceso exclusivo para Cliente</p>
                @endrole
            </div>
        </section>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>