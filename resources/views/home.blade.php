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
       /* Estilos para el sidebar */
body {
    display: flex;
    background-color: #1b1b1b; /* Fondo general en un tono negro */
}

.sidebar {
    width: 250px;
    height: 100vh;
    background-color: #121212; /* Fondo negro oscuro para el sidebar */
    color: #ffffff; /* Texto blanco para mayor contraste */
    position: fixed;
    border-right: 1px solid #333333; /* Borde gris oscuro */
}

.sidebar .nav-link {
    color: #ffffff; /* Texto blanco en los enlaces del sidebar */
}

.sidebar .nav-link.active {
    background-color: #333333; /* Fondo gris oscuro para el enlace activo */
    color: #ffd700; /* Amarillo suave para el texto del enlace activo */
}

.sidebar .brand-link {
    font-weight: bold;
    color: #ffd700; /* Amarillo suave para el texto del brand */
}

.content-wrapper {
    margin-left: 250px;
    padding: 20px;
    width: calc(100% - 250px);
    height: 100vh;
    overflow-y: auto;
    background-color: #1b1b1b; /* Fondo negro para el contenido */
}

.navbar {
    background-color: #121212; /* Fondo negro oscuro para la barra de navegación */
    color: #ffffff; /* Texto blanco */
    border-bottom: 1px solid #333333; /* Borde gris oscuro */
}

.navbar .navbar-brand {
    color: #ffd700; /* Amarillo suave */
    display: none; /* Ocultar el logo de Laravel */
}

.navbar .navbar-nav .nav-link {
    color: #ffffff; /* Texto blanco */
}

.navbar .navbar-nav .nav-link:hover {
    color: #ffd700; /* Amarillo suave para el hover en el navbar */
}

.content {
    margin-top: 20px;
}

.card-body {
    background-color: #292929; /* Fondo gris oscuro para la tarjeta */
    color: #ffffff; /* Texto blanco para buen contraste */
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3); /* Sombra más oscura */
}

        .carousel-container {
            width: 100%; /* El carrusel ocupa el ancho completo del contenedor */
            max-width: 300px; /* O establece un máximo si quieres limitar el tamaño */
    margin: 0 auto; 
    border: 2px solid #000; /* Cambia el color y grosor del borde según prefieras */
    border-radius: 10px; /* Opcional: hace que el borde tenga esquinas redondeadas */
    padding: 5px; 
        }
        .carousel-inner img {
            height: 300px;
            object-fit: cover;
            width: 100%;
        }
        .sidebar .brand-link h5 {
    font-size: 1.5em; /* Aumenta el tamaño de la fuente */
    font-weight: bold; /* Hace el texto más grueso */
    color: #f5a623; /* Cambia el color a un tono moderno, como dorado */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Añade una sombra para resaltar */
    letter-spacing: 2px; /* Espaciado entre letras */
    font-family: 'Arial', sans-serif; /* Cambia la fuente a algo más impactante */
}
.sidebar .brand-link h5 {
    color: white;
}
.brand-text {
    font-family: 'Arial', sans-serif; /* Cambia 'Arial' por otra fuente sans-serif si deseas */
    font-weight: 400; /* Peso de fuente para un estilo minimalista */
    color: #ffffff; /* Blanco para el texto */
    letter-spacing: 1px; /* Espaciado entre letras para darle elegancia */
    margin: 0;
    font-size: 1.2em; /* Tamaño ajustable */
}
.sidebar .nav-link {
    color: #ffffff !important; /* Forzar color blanco para el texto */
}

.sidebar .nav-link i {
    color: #ffffff !important; /* Forzar color blanco para el icono */
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
            <a href="{{ route('clientes.index') }}" class="nav-link {{ request()->routeIs('clientes.index') ? 'active' : '' }}">
                <i class="fas fa-user"></i> Clientes
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
            <a href="{{ route('clientes.index') }}" class="nav-link {{ request()->routeIs('clientes.index') ? 'active' : '' }}">
                <i class="fas fa-user"></i> Clientes
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
<h1 style="color: white; margin-top: 20px;">Productos</h1>

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