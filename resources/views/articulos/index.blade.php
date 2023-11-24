<?php

/** @var \App\Models\Articulo $articulo */
?>
@extends('layouts.main')

@section('title', 'Listado de Articulos')

@section('main')
<h1 class="text-center mb-5 fw-bold m-4">Publicaciones</h1>
<div class="row">

    @foreach($articulos as $articulo)
    <article class="col-md-6 col-lg-3 col-xs-12 mb-3 px-3">
        <div class="card mb-3 h-100 rounded-4 border-dark">
        @if($articulo->imagen !== null && Storage::has('imgs/' . $articulo->imagen))
                        <img class="card-img rounded-4  border-dark" src="{{ Storage::url('imgs/' . $articulo->imagen) }}" alt="{{ $articulo->descripcion_imagen }}">
                        @else
                        <img class="card-img rounded-4  border-dark" src="../../img/home.png" alt="imagen de carga"></p>
                        @endif
            <div class="card-body h-50">
                <h2 class="fs-5 fw-bold text-center">{{ $articulo->nombre }}</h2>
            </div>
            <ul class="list-group list-group-flush h-100">
                <li class="list-group-item"><span class="fw-bold">Edad: </span> {{ $articulo->consolas->nombre }}</li>
                <li class="list-group-item"><span class="fw-bold">Tamaño: </span>{{ $articulo->formato }}</li>
                <li class="list-group-item"><span class="fw-bold">Género: </span> {{ $articulo->generos->nombre }}</li>
            </ul>
            <div class="card-body">
                <a href="{{ route('articulos.vista', ['id' => $articulo->articulos_id]) }}" class="btn btn-dark w-100 fw-bold mb-2">VER MÁS</a>
                <form action="{{ route('cart.addItem') }}" method="POST">
            @csrf
            <input type="hidden" name="articulos_id" value="{{ $articulo->articulos_id }}">
            <button type="submit" class="btn btn-dark w-100 fw-bold">CONTACTAR</button>
        </form>
            </div>

        </div>
</article>
    @endforeach
</div>

@endsection