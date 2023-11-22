<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticulosAbmController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 0,
            'data' => Articulo::all(),
        ]);
    }

    public function view(int $id)
    {
        return response()->json([
            'status' => 0,
            'data' => Articulo::findOrFail($id),
        ]);
    }

    public function create(Request $request)
    {
        $request->validate(Articulo::validationRules(), Articulo::validationMessages());

        Articulo::create($request->all());


        return response()->json([
            'status' => 0,
        ]);
    }


    public function update(int $id, Request $request)
    {
        $articulo = Articulo::findOrFail($id);
    
        $request->validate(Articulo::validationRules(), Articulo::validationMessages());
    
        $data = $request->all();
    
        $articulo->update($data);
    
        return response()->json([
            'status' => 0,
        ]);
    }

    public function delete(int $id)
    {
        $articulo = Articulo::findOrFail($id);
    
        $articulo->delete();
    
        return response()->json([
            'status' => 0,
        ]);
    }
}