@extends('layouts.main')

@section('title', 'Carrito de Compras')

@section('main')


@php
$totalGeneral = 0;
@endphp


<h1 class="text-center mb-5 fw-bold m-4">Carrito de Compras</h1>
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
@if(count($cart) > 0)
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio unitario</th>
            <th>Total</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cart as $articuloId => $item)
        <tr>
            <td>{{ $item['articulo']->title }}</td>
            <td>
                <form action="{{ route('cart.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="articulo_id" value="{{ $item['articulo']->id }}">
                    <input type="number" name="quantity[{{ $articuloId }}]" value="{{ $item['quantity'] }}" min="1">
                    <button type="submit">Actualizar</button>
                </form>

            </td>
            <td>${{ $item['articulo']->price }}</td>
            <td>${{ $item['articulo']->price * $item['quantity'] }}</td>
            <td>
                <form action="{{ route('cart.removeItem', ['id' => $articuloId]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @php
        $totalArticulo = $item['articulo']->price * $item['quantity'];
        $totalGeneral += $totalArticulo;
        @endphp
        @endforeach
    </tbody>
</table>
<div class="text-end mt-4">
    <h3>Total General: ${{ $totalGeneral }}</h3>
</div>
<div class="text-center">
    <form action="{{ route('cart.clear') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger w-50 mb-3 mt-3">Vaciar Carrito</button>
    </form>
    <a href="{{ route('mp.vista') }}" class="btn btn-success w-50">Pagar con MercadoPago</a>
</div>
@else
<p>No hay artículos en el carrito.</p>
@endif

@endsection