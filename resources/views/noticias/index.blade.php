<?php

/** @var \App\Models\Noticias $noticias */
?>
@extends('layouts.main')

@section('title', 'Noticias')

@section('main')

<h1 class="text-center mb-5 fw-bold m-4">Noticias</h1>
<div class="row">

    @foreach($noticias as $noticia)
    <article class="col-md-6 col-lg-3 col-xs-12 mb-3 px-3">
        <div class="card mb-3 h-100 rounded-4 border-dark">
        @if($noticia->imagen !== null && Storage::has('imgs/' . $noticia->imagen))
                        <img class="card-img rounded-4  border-dark" src="{{ Storage::url('imgs/' . $noticia->imagen) }}" alt="{{ $noticia->descripcion_imagen }}">
                        @else
                        <img class="card-img rounded-4  border-dark" src="../../img/home.png" alt="imagen de carga"></p>
                        @endif    

            <div class="card-body h-50">
                <h2 class="fs-5 fw-bold text-center">{{ $noticia->titulo }}</h2>
                <p class="card-text">{{ $noticia->fecha }}</p>
            </div>
            <ul class="list-group list-group-flush h-100">
                <li class="list-group-item">
                    <p class="card-text">{{ $noticia->descripcion }}</p>
                </li>
            </ul>
            <div class="card-body">
                <a href="{{ route('noticias.vista', ['id' => $noticia->noticias_id]) }}" class="btn btn-dark w-100 fw-bold">VER MÁS</a>
            </div>

        </div>
</article>
    @endforeach
</div>

@endsection