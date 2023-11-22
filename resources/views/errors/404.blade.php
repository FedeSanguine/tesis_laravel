@extends('layouts.main')

@section('title', 'Página no Encontrada')

@section('main')
    <h1 class="mb-3">Página no Encontrada</h1>

    <p>Ups. Lo sentimos =( <a href="{{ url('articulos/listado') }}"></a></p>
@endsection
