<?php
namespace App\Http\Controllers;
use App\Models\DireccionEnvio;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function confirmar()
    {
        // Obtener el carrito de la sesión
        $cart = session()->get('cart', []);

        // Pasar el carrito a la vista
        return view('pago.confirmar', compact('cart'));
    }
    public function procesarPago()
{
    // Aquí puedes agregar la lógica de procesamiento del pago
    
    // Limpiar el carrito de la sesión, si es necesario
    session()->forget('cart');

    // Redirigir con mensaje de éxito
    return redirect()->route('pago.confirmacion')->with('success', '¡Pago confirmado exitosamente!');
}

public function confirmacion()
{
    return view('pago.confirmacion');
}



}


