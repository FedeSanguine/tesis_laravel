<?php
/** @var \App\Models\Articulo $articulo */
?>
@extends('layouts.main')

@section('title', 'Confirmación para Eliminar el Articulo ' . $articulo->nombre)

@section('main')
<x-articulos-data :articulo="$articulo"/>

    <hr>

    <form action="{{ route('articulos.procesoEliminar', ['id' => $articulo->articulos_id]) }}" method="post">
        @csrf
        <h2 class="mb-3">Confirmación Necesaria</h2>

        <p class="mb-3">¿Estás seguro que querés eliminar este articulo?</p>

        <button type="submit" class="btn btn-danger">Sí, eliminar</button>
    </form>
@endsection

