<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Articulo;

class UserController extends Controller
{
    public function indexCompras()
    {
        $usuario = User::with(['articulos'])->get();

        return view('compras.compras', [
            'usuario' => $usuario,
        ]);
    }


}
