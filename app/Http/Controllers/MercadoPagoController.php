<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

class MercadoPagoController extends Controller
{
    public function show()
    {
         $cart = session()->get('cart', []);
         if (!is_array($cart) || empty($cart)) {
             return redirect()->back()->with('error', 'El carrito está vacío o no contiene datos válidos.');
         }
 
         $articuloIds = array_map(function ($item) {
         return $item['articulo']->getKey();
        }, $cart);

 
         $articulos = Articulo::whereIn('articulos_id', $articuloIds)->get();
         
         if ($articulos->isEmpty()) {
             return redirect()->back()->with('error', 'No se encontraron artículos en el carrito.');
         }

        \MercadoPago\SDK::setAccessToken(config('mercadopago.accessToken'));

        $items = [];
        foreach ($articulos as $articulo) {
                $item = new \MercadoPago\Item();

                $item->title = $articulo->title;
                $item->unit_price = $articulo->price;
                $item->quantity = 1;

                $items[] = $item;
            
        }


        $pref = new \MercadoPago\Preference();
        $pref->items = $items;


        $pref->back_urls = [
            'success' => route('mp.success'),
            'pending' => route('mp.pending'),
            'failure' => route('mp.failure'),
        ];

        $pref->auto_return = "approved";

        $pref->save();

        return view('mp.vista', [
            'articulos' => $articulos,
            'pref' => $pref,
            'publicKey' => config('mercadopago.publicKey'),
        ]);
    }

    public function processSuccess(Request $request)
    {

        return view('mp.success');

    }

    public function processPending(Request $request)
    {
        echo "Pending...";

    }

    public function processFailure(Request $request)
    {
        echo "Failure :(";

    }


}