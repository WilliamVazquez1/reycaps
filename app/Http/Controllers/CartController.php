<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;  // Importa la clase Session

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
    
        // Calcular el total de la compra
        $totalCompra = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));
    
        // Llamar al procedimiento almacenado
        $resultado = DB::select('CALL verificar_envio_gratis(?)', [$totalCompra]);
    
        // Obtener el mensaje del procedimiento
        $mensajeEnvio = $resultado[0]->mensaje_envio ?? 'Error al obtener el mensaje';
    
        // Pasar las variables a la vista
        return view('cart.index', compact('cart', 'mensajeEnvio'));
    }


    public function add($id)
    {
        // Encuentra el producto por su ID
        $producto = Producto::find($id);

        if (!$producto) {
            return redirect()->back()->with('error', 'Producto no encontrado');
        }

        // Agrega el producto al carrito
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $producto->nombre_producto,
                "price" => $producto->precio,
                "quantity" => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Producto agregado al carrito');
    }

    public function remove($id)
    {
        $cart = session()->get('cart');
        
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        
        return redirect()->back()->with('success', 'Producto eliminado del carrito!');
    }

    public function checkout(Request $request)
    {
        // Aquí puedes implementar la lógica para generar un ticket.
        $cart = session()->get('cart', []);
        // Lógica para crear un ticket o guardar la compra en la base de datos

        // Vaciar el carrito después de la compra
        session()->forget('cart');

        return view('cart.checkout', compact('cart')); // Mostrar el ticket
    }

    public function processCheckout(Request $request)
    {
        // Validar la dirección de envío u otros datos del formulario
        $request->validate([
            'address' => 'required|string|max:255',
            // Aquí puedes agregar más validaciones según lo que necesites
        ]);

        // Lógica para procesar el pago y guardar la orden
        // Aquí debes implementar la lógica de la transacción y guardar en la base de datos
        // Por ahora, guardaremos la orden en la sesión

        // Obtener el carrito de la sesión
        $cart = session()->get('cart');

        // Guardar la información del pedido en la sesión
        session()->put('order', [
            'address' => $request->address,
            'items' => $cart,
            // Puedes agregar más detalles del pedido si es necesario
        ]);

        // Limpia el carrito después de la compra
        session()->forget('cart');

        // Redirigir al ticket
        return redirect()->route('cart.ticket')->with('success', 'Compra realizada con éxito!');
    }

    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('cart.view', compact('cart'));
    }

    public function showTicket()
    {
        // Obtiene la información del pedido de la sesión
        $order = session()->get('order');
        
        // Si no hay un pedido en la sesión, redirigir a la tienda
        if (!$order) {
            return redirect('/')->with('error', 'No hay ninguna compra para mostrar.');
        }

        return view('cart.ticket', compact('order'));
    }
    public function vaciarCarrito()
    {
        // Vaciar el carrito (si usas sesión)
        Session::forget('cart');

        // O puedes usar esto si usas un array en la sesión:
        // session()->forget('cart');

        // Redirigir al usuario a la página del carrito con un mensaje
        return redirect()->route('cart.index')->with('success', 'El carrito ha sido vaciado.');
    }
    public function confirmarPago(Request $request)
{
    // Suponiendo que tienes los datos del carrito en la sesión o el request
    $carrito = $request->input('carrito'); // Un array con los productos y cantidades

    foreach ($carrito as $item) {
        DB::table('carrito')->insert([
            'id_producto' => $item['id_producto'],
            'cantidad' => $item['cantidad']
        ]);
    }

    return redirect()->route('vista.pago')->with('success', 'Pago confirmado y stock actualizado.');
}
public function procesarPago()
{
    // Obtener el carrito de la sesión
    $cart = session()->get('cart', []);

    // Verificar si el carrito está vacío
    if (empty($cart)) {
        return redirect()->back()->with('error', 'El carrito está vacío.');
    }

    // Insertar cada producto del carrito en la tabla 'carrito' (para activar el trigger)
    foreach ($cart as $item) {
        if (isset($item['id']) && isset($item['quantity'])) {
            DB::table('carrito')->insert([
                'id_producto' => $item['id'],       // ID del producto
                'cantidad' => $item['quantity'],    // Cantidad del producto
            ]);
        } else {
            return redirect()->back()->with('error', 'Datos incompletos en el carrito.');
        }
    }

    // Limpiar el carrito de la sesión
    session()->forget('cart');

    // Redirigir a la confirmación con un mensaje de éxito
    return redirect()->route('pago.confirmacion')->with('success', '¡Pago confirmado exitosamente!');
}







}
