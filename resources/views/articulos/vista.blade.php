<?php

/** @var \App\Models\Articulo $articulo */
?>
@extends('layouts.main')

@section('title', 'Detalle de ' . $articulo->nombre)

@section('main')

<x-articulos-data :articulo="$articulo" />

<div class="container-fluid h-100">
    <div class="row w-50">
        <div class="col v-center">
            <div class="btn  fw-bold d-block mx-auto">
            <form action="{{ route('cart.addItem') }}" method="POST">
            @csrf
            <input type="hidden" name="articulos_id" value="{{ $articulo->articulos_id }}">
            <button type="submit" class="btn btn-dark w-100 fw-bold">AGREGAR AL CARRITO</button>
        </form>
            </div>
        </div>
    </div>


</div>

@endsection