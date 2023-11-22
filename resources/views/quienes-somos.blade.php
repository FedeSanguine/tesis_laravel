@extends('layouts.main')

@section('title', 'Quiénes Somos')

@section('main')
<div>
    <h1 class="text-center mb-5 fw-bold m-4"> ¿Quienes somos?</h1>
    <div class="row mb-5 d-flex align-items-center">
        <div class="col-12 mb-5">
            <img src="../img/quienes_somos.webp" alt="Quienes Somos Imagen" class="d-block mx-auto img-fluid foto" width="50%">
        </div>
        <div class="col fs-3 text-center">
            <p>Somos <strong> GXGames </strong>, una empresa dedicada a la venta de videojuegos multiplataforma.
            </p>
            <p>Tenemos una amplia trayectoria, contamos con más de 10 años en el mercado brindando una excelente
                atención y precios imperdibles, <strong>Estamos ubicados en CABA y llegamos a todo el país.</strong>
            </p>
        </div>
    </div>
</div>
@endsection