<?php
namespace App\Http\Controllers;
use App\Models\Producto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Obtén todos los productos o limita el número que deseas mostrar
        $productos = Producto::all(); // Puedes usar ->paginate(10) para paginación

        return view('home', compact('productos'));
    }
}
