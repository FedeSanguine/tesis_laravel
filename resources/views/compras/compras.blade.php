<?php

/** @var \App\Models\Articulo[]|\Illuminate\Database\Eloquent\Collection $articulo */
/** @var \App\Models\User[]|\Illuminate\Database\Eloquent\Collection $usuario */
?>

@extends('layouts.admin')

@section('title', 'Compras de Usuarios')

@section('main')

<h1 class="mb-3">Compras de Usuarios</h1>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Usuario</th>
            <th>Compra realizada</th>
            <th>Precio</th>
            <th>Formato</th>
        </tr>
    </thead>
    <tbody>
        @foreach($usuario as $usuario1)
        <tr>
            <td>{{ $usuario1->email }}</td>
            <td>
                @foreach($usuario1->articulos as $articulo)
                <span class="badge bg-primary"> {{ $articulo->nombre }} </span>
                @endforeach
            </td>
            <td>
                @foreach($usuario1->articulos as $articulo)
                <span class="badge bg-primary"> {{ $articulo->precio }} </span>
                @endforeach
            </td>
            <td>
                @foreach($usuario1->articulos as $articulo)
                <span class="badge bg-primary"> {{ $articulo->formato }} </span>
                @endforeach
            </td>
        </tr>
        @endforeach

    </tbody>

</table>

@endsection