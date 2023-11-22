<?php

/** @var \App\Models\Noticias $noticias */
/** @var \App\Models\Articulo $articulos */
?>
@extends('layouts.main')

@section('title', 'Noticia de ' . $noticias->titulo)

@section('main')

<section>
    <div class="row">
        <h1 class="text-center mb-5 fw-bold m-4">{{ $noticias->titulo }}</h1>
        <div class="col">
            <div class="card mb-5 border rounded-4 border-dark fs-5">
                <div class="row g-0">
                    <div class="col-md-5">
                        @if($noticias->imagen !== null && Storage::has('imgs/' . $noticias->imagen))
                        <img class="card-img rounded-4  border-dark" src="{{ Storage::url('imgs/' . $noticias->imagen) }}" alt="{{ $noticias->descripcion_imagen }}">
                        @else
                        <img class="card-img rounded-4  border-dark" src="../../img/home.png" alt="imagen de carga"></p>
                        @endif
                    </div>

                    <div class="col-md-7 d-flex flex-column p-3">
                        <div class="card-body">
                            <h2 class="mb-3">Descripcion</h2>
                            <p class="card-text text-right pt-2 fs-4">
                                {{ $noticias->descripcion }}
                            </p>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><span class="fw-bold">Fecha:</span>
                                <p class="text-dark fst-italic">{{ $noticias->fecha }}</p>
                            </li>
                            <li class="list-group-item"><span class="fw-bold">Articulos relacionados:</span>
                                @foreach($noticias->articulos as $articulo)
                                <p class="text-dark fst-italic">{{ $articulo->nombre }} </p>
                                @endforeach
                        </ul>

                    </div>
                </div>

            </div>
</section>
@endsection