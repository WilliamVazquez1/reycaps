<?php

use App\Http\Controllers\CiudadController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\DireccionEnvioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\DelegacionController;

use App\Http\Controllers\VentasController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\CodigoPostalController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PagoController; 
use App\Http\Controllers\UsuarioController;
Route::resource('codigo_postal', CodigoPostalController::class);


Route::resource('proveedores', ProveedorController::class);
Route::resource('clientes', ClienteController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('marcas', MarcaController::class);
Route::resource('productos', ProductoController::class);
Route::resource('direccion_envio', DireccionEnvioController::class);
Auth::routes();
Route::resource('ciudades', CiudadController::class);
Route::resource('personas', PersonaController::class);
Route::resource('estados', EstadoController::class);
Route::resource('delegaciones', DelegacionController::class);
Route::resource('ventas', VentasController::class);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
Route::post('/logout', [YourAuthController::class, 'logout'])->name('logout');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/home'); // Redirige al home o a la ruta deseada
})->name('logout');
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Rutas de autenticación
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{producto}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{producto}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');// Esta es la ruta para mostrar el formulario de checkout (GET)
Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
// web.php
Route::get('/direccion-envio', [PedidoController::class, 'mostrarDireccion'])->name('direccion.envio');
// web.php
Route::resource('direccion_envio', DireccionEnvioController::class);
Route::get('/direccion-envio', [DireccionEnvioController::class, 'index'])->name('direcciones.index');
Route::get('/confirmar-pago', [PagoController::class, 'confirmarPago'])->name('confirmar.pago');

Route::get('/confirmar-pago', [PagoController::class, 'confirmar'])->name('confirmar.pago');
Route::post('/proceso-pago', [PagoController::class, 'procesarPago'])->name('proceso.pago');
Route::post('/confirmar-pago', [PagoController::class, 'procesarPago'])->name('proceso.pago');
Route::post('/confirmar-pago', [PagoController::class, 'procesarPago'])->name('proceso.pago');
Route::get('/pago-confirmado', [PagoController::class, 'confirmacion'])->name('pago.confirmacion');Route::get('/confirmar-pago', [DireccionEnvioController::class, 'confirmarPago'])->name('confirmar.pago');
Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
Route::resource('usuarios', UsuarioController::class);
Route::get('/usuarios/no-aprobados', [UsuarioController::class, 'noAprobados'])->name('usuarios.noAprobados');
Route::get('/usuarios', [UsuarioController::class, 'indexPendientes'])->name('usuarios.pendientes');
Route::put('/usuarios/{id}/aprobar', [UsuarioController::class, 'aprobar'])->name('usuarios.aprobar');
Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');

// Ruta para cerrar sesión
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/home');
})->name('logout');
Route::get('/usuarios/pendientes', [UsuarioController::class, 'pendientes'])->name('usuarios.pendientes');
Route::get('/usuarios/pendientes', [UsuarioController::class, 'pendientes'])->name('usuarios.pendientes');
use App\Http\Controllers\UserController;

Route::get('/usuarios-pendientes', [UserController::class, 'pendientes'])->name('usuarios.pendientes');
Route::post('/usuarios-aprobar/{id}', [UserController::class, 'aprobar'])->name('usuarios.aprobar');
Route::resource('direccion_envio', DireccionEnvioController::class);
Route::get('/cart/vaciar', [CartController::class, 'vaciarCarrito'])->name('cart.vaciar');
