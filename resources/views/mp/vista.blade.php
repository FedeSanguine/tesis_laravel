<?php
/** @var \App\Models\Articulo $articulos */
/** @var \MercadoPago\Preference $pref */
/** @var string $publicKey */
?>
@extends('layouts.main')

@section('title', 'Mercado Pago')

@push('js')
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        const mp = new MercadoPago("<?= $publicKey;?>");
        mp.bricks().create("wallet", "mp-cobro", {
            initialization: {
                preferenceId: "<?= $pref->id;?>"
            }
        });
    </script>
@endpush

@section('main')
    <h1 class="text-center m-4">Pagar con Mercado Pago</h1>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Título</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>
        </thead>
        <tbody>
            @foreach($articulos as $articulo)
            <tr>
                <td>{{ $articulo->title }}</td>
                <td>$ {{ $articulo->price }}</td>
                <td>1</td>
                <td>$ {{ $articulo->price }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div id="mp-cobro"></div>

    </script>
@endsection
