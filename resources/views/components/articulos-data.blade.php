<?php

use Illuminate\Support\Facades\Storage;

/** @var \App\Models\Articulo $articulo */

?>


<section>
    <div class="row">
        <h1 class="text-center mb-5 fw-bold m-4">{{ $articulo->nombre }}</h1>
        <div class="col">
            <div class="card mb-5 border rounded-4 border-dark fs-5">
                <div class="row g-0">
                    <div class="col-md-5">
                        @if($articulo->imagen !== null && Storage::has('imgs/' . $articulo->imagen))
                        <img class="card-img rounded-4  border-dark" src="{{ Storage::url('imgs/' . $articulo->imagen) }}" alt="{{ $articulo->descripcion_imagen }}">
                        @else
                        <img class="card-img rounded-4  border-dark" src="../../img/home.png" alt="imagen de carga"></p>
                        @endif
                    </div>

                    <div class="col-md-7 d-flex flex-column p-3">
                        <div class="card-body">
                            <h2 class="mb-3">Descripcion</h2>
                            <p class="card-text text-right pt-2 fs-4">
                                {{ $articulo->descripcion }}
                            </p>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><span class="fw-bold">Tamaño:</span>
                                <p class="text-dark fst-italic">{{ $articulo->consolas->nombre }}</p>
                            </li>
                            <li class="list-group-item"><span class="fw-bold">Edad:</span>
                                <p class="text-dark fst-italic">{{ $articulo->formato }}</p>
                            </li>
                            <li class="list-group-item"><span class="fw-bold">Genero:</span>
                                <p class="text-dark fst-italic">{{ $articulo->generos->nombre }}</p>
                            </li>
                        </ul>

                    </div>
                </div>

            </div>
</section>