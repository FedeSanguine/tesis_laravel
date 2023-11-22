<?php

/** @var \Illuminate\Support\ViewErrorBag $errors */
/** @var \App\Models\Noticias|\Illuminate\Database\Eloquent\Collection $noticias */
/** @var \App\Models\Articulo|\Illuminate\Database\Eloquent\Collection $articulos */
?>

@extends('layouts.main')

@section('title', 'Publicar una noticia')

@section('main')
    <h1 class="mb-3">Publicar un articulo nuevo</h1>

    <form action="{{ route('noticias.nuevoProceso') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="titulo" class="form-label">Titulo</label>
            <input type="text" id="titulo" name="titulo" class="form-control"                
            @error('titulo') aria-describedby="error-titulo" @enderror
            >{{ old('titulo') }}</textarea>
            @error('titulo')
                <div class="text-danger" id="error-titulo">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" id="fecha" name="fecha" class="form-control"
            @error('fecha') aria-describedby="error-fecha" @enderror
                value="{{ old('fecha') }}"
            >
            @error('fecha')
                <div class="text-danger" id="error-fecha">{{ $message }}</div>
            @enderror
        </div>

        <fieldset class="mb-4">
            <legend>Articulos de esta noticia:</legend>

            @foreach($articulos as $articulo)
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input
                        type="checkbox"
                        name="articulos_id[]"
                        class="form-check-input"
                        value="{{ $articulo->articulos_id }}"
                        @checked(in_array($articulo->articulos_id, old('articulos_id', [])))>
                    {{ $articulo->nombre }}
                </label>
            </div>
            @endforeach
        </fieldset>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion</label>
            <textarea id="descripcion" name="descripcion" class="form-control"
            @error('descripcion') aria-describedby="error-descripcion" @enderror
            >{{ old('descripcion') }}</textarea>
            @error('descripcion')
                <div class="text-danger" id="error-descripcion">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" id="imagen" name="imagen" class="form-control"
            @error('imagen') aria-describedby="error-imagen" @enderror
            >
            @error('imagen')
                <div class="text-danger" id="error-imagen">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="descripcion_imagen" class="form-label">Descripción de la Imagen</label>
            <input type="text" id="descripcion_imagen" name="descripcion_imagen" class="form-control"
            @error('descripcion_imagen') aria-describedby="error-descripcion_imagen" @enderror
                value="{{ old('descripcion_imagen') }}"
            >
            @error('descipcion_imagen')
                <div class="text-danger" id="error-descripcion_imagen">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Publicar</button>

    </form>
@endsection
