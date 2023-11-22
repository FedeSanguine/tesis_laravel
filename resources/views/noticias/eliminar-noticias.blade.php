<?php

/** @var \App\Models\Noticias $noticias */
?>
@extends('layouts.main')

@section('title', 'Confirmación para Eliminar la noticia ' . $noticias->titulo)

@section('main')
<div class="d-flex flex-row-reverse">
    <div class="col-9 mb-3">
        <h1 class="mb-3">{{ $noticias->titulo }}</h1>

        <dl>
            <dt>Fecha</dt>
            <td>{{ $noticias->fecha }}</td>
    </div>
    <div class="col-3">
        @if($noticias->imagen !== null && Storage::has('imgs/' . $noticias->imagen))
        <img class="mw-100" src="{{ Storage::url('imgs/' . $noticias->imagen) }}" alt="{{ $noticias->descripcion_imagen }}">
        @else
        <p>Acá iría una imagen diciendo que no hay imagen.</p>
        @endif
    </div>
</div>

<h2 class="mb-3">Descripcion</h2>
<p>{{ $noticias->descripcion }}</p>



<form action="{{ route('noticias.procesoEliminar', ['id' => $noticias->noticias_id]) }}" method="post">
    @csrf
    <h2 class="mb-3">Confirmación Necesaria</h2>

    <p class="mb-3">¿Estás seguro que querés eliminar esta noticia?</p>

    <button type="submit" class="btn btn-danger">Sí, eliminar</button>
</form>
@endsection