<?php

/** @var \Illuminate\Support\ViewErrorBag $errors */
/** @var \App\Models\Genero[]|\Illuminate\Database\Eloquent\Collection $generos */
?>

@extends('layouts.main')

@section('title', 'Publicar un animal')

@section('main')
<h1 class="mb-3">Publicar un animal nuevo</h1>

<form action="{{ route('articulos.nuevoProceso') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" id="nombre" name="nombre" class="form-control" @error('nombre') aria-describedby="error-nombre" @enderror value="{{ old('nombre') }}">
        @error('nombre')
        <div class="text-danger" id="error-nombre">{{ $message }}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="refugio" class="form-label">Refugio</label>
        <input type="text" id="refugio" name="refugio" class="form-control" @error('refugio') aria-describedby="error-refugio" @enderror value="{{ old('refugio') }}">
        @error('refugio')
        <div class="text-danger" id="error-refugio">{{ $message }}</div>
        @endif
    </div>
    <div class="mb-3">
        <label for="formato" class="form-label">Edad</label>
        <input type="text" id="formato" name="formato" class="form-control" @error('formato') aria-describedby="error-formato" @enderror value="{{ old('formato') }}">
        @error('formato')
        <div class="text-danger" id="error-formato">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="consolas_id" class="form-label">Tamaño</label>
        <select name="consolas_id" id="consolas_id" class="form-control" @error('consolas_id') aria-describedby="error-consolas_id" @enderror>
            <option value=""></option>
            @foreach($consolas as $consola)
            <option value="{{ $consola->consolas_id }}" @selected(old('consolas_id')==$consola->consolas_id)
                >{{ $consola->nombre }}</option>
            @endforeach
        </select>
        @error('consolas_id')
        <div class="text-danger" id="error-consolas_id">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="generos_id" class="form-label">Genero</label>
        <select name="generos_id" id="generos_id" class="form-control" @error('generos_id') aria-describedby="error-generos_id" @enderror>
            <option value=""></option>
            @foreach($generos as $genero)
            <option value="{{ $genero->generos_id }}" @selected(old('generos_id')==$genero->generos_id)
                >{{ $genero->nombre }}</option>
            @endforeach
        </select>
        @error('generos_id')
        <div class="text-danger" id="error-generos_id">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripcion</label>
        <textarea id="descripcion" name="descripcion" class="form-control" @error('descripcion') aria-describedby="error-descripcion" @enderror>{{ old('descripcion') }}</textarea>
        @error('descripcion')
        <div class="text-danger" id="error-descripcion">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="imagen" class="form-label">Imagen</label>
        <input type="file" id="imagen" name="imagen" class="form-control" @error('imagen') aria-describedby="error-imagen" @enderror>
        @error('imagen')
        <div class="text-danger" id="error-imagen">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="descripcion_imagen" class="form-label">Descripción de la Imagen</label>
        <input type="text" id="descripcion_imagen" name="descripcion_imagen" class="form-control" @error('descripcion_imagen') aria-describedby="error-descripcion_imagen" @enderror value="{{ old('descripcion_imagen') }}">
        @error('descipcion_imagen')
        <div class="text-danger" id="error-descripcion_imagen">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Publicar</button>

</form>
@endsection