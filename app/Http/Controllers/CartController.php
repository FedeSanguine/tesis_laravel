<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;


class CartController extends Controller
{
    public function index()
    {
        // Obtener el carrito de la sesión
        $cart = session()->get('cart', []);
        if (!is_array($cart)) {
            $cart = [];
        }

        return view('cart.index', compact('cart'));
    }

    public function addItem(Request $request)
{
    $articuloId = $request->input('articulos_id');
    $quantity = $request->input('quantity', 1);

    $articulo = Articulo::find($articuloId);

    if (!$articulo) {
        return redirect()->back()->with('error', 'El artículo no existe.');
    }

    // Generar una clave única para el artículo en el carrito
    $uniqueKey = $articulo->id . '_' . microtime(true);

    // Agregar el artículo al carrito en la sesión
    $cart = session()->get('cart', []);
    if (isset($cart[$uniqueKey])) {
        $cart[$uniqueKey]['quantity'] += $quantity;
    } else {
        $cart[$uniqueKey] = [
            'articulo' => $articulo,
            'quantity' => $quantity,
        ];
    }

    session()->put('cart', $cart);

    return redirect()->back()->with('success', 'El artículo ha sido agregado al carrito.');
}




public function removeItem($uniqueKey)
{
    $cart = session()->get('cart', []);

    // Verificar si la clave única está presente en el carrito
    if (isset($cart[$uniqueKey])) {
        // Eliminar el artículo del carrito en la sesión
        unset($cart[$uniqueKey]);
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'El artículo ha sido eliminado del carrito.');
    } else {
        return redirect()->back()->with('error', 'El artículo no existe en el carrito.');
    }
}

    
    public function updateCart(Request $request)
{
    $quantities = $request->input('quantity', []);
    $cart = session()->get('cart', []);

    // Actualizar las cantidades en el carrito
    foreach ($quantities as $index => $quantity) {
        $index = (string)$index;
        if (isset($cart[$index])) {
            $cart[$index]['quantity'] = $quantity;
        }
    }

    session()->put('cart', $cart);

    return redirect()->back()->with('success', 'El carrito ha sido actualizado.');
}



    public function clearCart()
    {
        // Vaciar el carrito en la sesión
        session()->forget('cart');

        return redirect()->back()->with('success', 'El carrito ha sido vaciado.');
    }

}

