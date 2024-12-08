<?php

namespace App\Http\Controllers;

use App\Models\Persona;

use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $totalPersonas = Persona::count(); // Cuenta total de personas
        $totalProductos = Producto::count(); // Cuenta total de productos

        return view('dashboard.index', compact('totalPersonas', 'totalProductos'));
    }
}
