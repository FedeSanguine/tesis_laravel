@extends('layouts.main')

@section('title', 'Ingresar a tu Cuenta')

@section('main')
<h1 class="mb-3">Ingresar a tu Cuenta</h1>

<form action="{{ route('autenticacion.procesoLogin') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control"
        @error('email') aria-describedby="error-email" @enderror
           value="{{ old('email') }}" >
            @error('email')
                <div class="text-danger" id="error-email">{{ $message }}</div>
            @enderror
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control"
        @error('password') aria-describedby="error-password" @enderror>
            @error('password')
                <div class="text-danger" id="error-password">{{ $message }}</div>
            @enderror
    </div>
    <button type="submit" class="btn btn-primary w-100">Ingresar</button>
</form>
@endsection


