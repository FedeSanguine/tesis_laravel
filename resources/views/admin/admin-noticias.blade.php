<?php

/** @var \App\Models\Articulo[]|\Illuminate\Database\Eloquent\Collection $articulo */
/** @var \App\Models\Noticias[]|\Illuminate\Database\Eloquent\Collection $noticias */
?>

@extends('layouts.admin')

@section('title', 'Listado de noticias')

@section('main')

<h1 class="mb-3">Administrar Noticias</h1>

@auth
<div class="mb-3">
    <a href="{{ route('noticias.nuevoFormulario') }}" class="btn btn-sm btn-dark m-1">Agregar una nueva Noticia</a>
</div>
@endauth



<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th width="10%">Imagen</th>
            <th>Titulo</th>
            <th>Fecha</th>
            <th>Articulos relacionados</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($noticias as $noticia)
        <tr>
            <td> 
            @if($noticia->imagen !== null && Storage::has('imgs/' . $noticia->imagen))    
            <img width="65%" class="mw-100" src="{{ Storage::url('imgs/' . $noticia->imagen) }}" alt="{{ $noticia->descripcion_imagen }}">
            @else
            <img width="65%" class="mw-100" src="../../img/home.png" alt="imagen de carga"></p>
            @endif
            </td>
            <td>{{ $noticia->titulo }}</td>
            <td>{{ $noticia->fecha }}</td>
            <td>
                @foreach($noticia->articulos as $articulo)
                <span class="badge bg-primary"> {{ $articulo->nombre }} </span>
                @endforeach
            </td>
            <td>{{ $noticia->descripcion }}</td>
            <td>
                <div class="d-flex gap-1">
                    <a href="{{ route('noticias.vista', ['id' => $noticia->noticias_id]) }}" class="btn btn-sm btn-dark m-1">Ver</a>
                    @auth
                    <a href="{{ route('noticias.editarOk', ['id' => $noticia->noticias_id]) }}" class="btn btn-sm btn-dark m-1">Editar</a>
                    <a href="{{ route('noticias.eliminarOk', ['id' => $noticia->noticias_id]) }}" class="d-block btn btn-sm btn-danger m-1">Eliminar</a>
                    @endauth
                </div>
            </td>
        </tr>
        @endforeach

    </tbody>

</table>

@endsection