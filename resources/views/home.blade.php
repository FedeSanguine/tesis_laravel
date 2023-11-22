@extends('layouts.main')

@section('title', 'Página Principal')

@section('main')
<div>
    <h1 class="text-center mb-5 fw-bold m-4">¡Bienvenidos a GXGames!</h1>
    <div class="row mb-5 d-flex align-items-center">
        <div class="col-lg-6 fs-3 text-center">
            <p><strong>Venta de videojuegos multiplataforma </strong>y mucho más, donde podes encontrar todos los juegos que
                siempre buscaste en un solo lugar.</p>
            <p>Contamos con <strong>envió gratis a todo CABA</strong>, no te lo podes perder!</p>
        </div>
        <div class="col-lg-6"><img src="img/home.png" alt="Home Imagen" class="d-block mx-auto img-fluid "></div>
    </div>


</div>
@endsection