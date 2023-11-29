<?php

/** @var \App\Models\Articulo $articulo */
?>
@extends('layouts.admin')

@section('title', 'Listado de Animales')

@section('main')

<h1 class="mb-3">Administrar Animales</h1>

@auth
<div class="mb-3">
    <a href="{{ route('articulos.nuevoFormulario') }}" class="btn btn-sm btn-dark m-1">Agregar un nuevo animal</a>
</div>
@endauth

<table class="table table-light table-hover text-center border-dark align-middle">
    <thead>
        <tr>
            <th width="9%">Imagen</th>
            <th>Nombre</th>
            <th>Refugio</th>
            <th>Tamaño</th>
            <th>Género</th>
            <th>Edad</th>
            <th>Descripción</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <tbody>
        @foreach($articulos as $articulo)
        <tr>
        <td>
            @if($articulo->imagen !== null && Storage::has('imgs/' . $articulo->imagen))
            <img width="65%" class="mw-80" src="{{ Storage::url('imgs/' . $articulo->imagen) }}" alt="{{ $articulo->descripcion_imagen }}">
            @else
            <img width="65%" class="mw-100" src="../../img/home.png" alt="imagen de carga"></p>
            @endif
            </td>
            <td>{{ $articulo->nombre }}</td>
            <td>{{ $articulo->refugio }}</td>
            <td>{{ $articulo->consolas->nombre }}</td>
            <td>{{ $articulo->generos->nombre }}</td>
            <td>{{ $articulo->formato }}</td>
            <td>{{ $articulo->descripcion }}</td>
            <td>
                <div class="d-flex gap-1">
                    <a href="{{ route('articulos.vista', ['id' => $articulo->articulos_id]) }}" class="btn btn-sm btn-dark m-1">Ver</a>
                    @auth
                    <a href="{{ route('articulos.editarOk', ['id' => $articulo->articulos_id]) }}" class="btn btn-sm btn-dark m-1">Editar</a>
                    <a href="{{ route('articulos.eliminarOk', ['id' => $articulo->articulos_id]) }}" class="d-block btn btn-sm btn-danger m-1">Eliminar</a>
                    @endauth
                </div>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection