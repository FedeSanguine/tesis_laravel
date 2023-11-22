@extends('layouts.main')

@section('title', 'Registrarse')

@section('main')
<h1 class="mb-3">Registro de usuario</h1>

<form action="{{ route('autenticacion.procesoRegistro') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" id="email" name="email" class="form-control" @if($errors->has('email')) aria-describedby="error-email" @endif
        value="{{ old('email') }}"
        >
        @if($errors->has('email'))
        <div class="text-danger" id="error-email">{{ $errors->first('email') }}</div>
        @endif
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" id="password" name="password" class="form-control" @error('password') aria-describedby="error-password" @enderror>
        @error('password')
        <div class="text-danger" id="error-password">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="password_confirmation">Confirmar contraseña</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Registrar</button>

</form>
@endsection