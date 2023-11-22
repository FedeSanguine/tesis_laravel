@extends('layouts.main')

@section('title', 'Mi Perfil')

@section('main')
    <div class="container mb-4">
        <div class="row justify-content-center mb-4">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">Perfil de Usuario</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('autenticacion.actualizarContrasena') }}">
                            @csrf
                            <div class="form-group row mb-2">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Correo electrónico</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" value="{{ auth()->user()->email }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Nueva contraseña</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control"name="password" @error('password') aria-describedby="error-password" @enderror>
                                    @error('password')
                                    <div class="text-danger" id="error-password">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Confirmar nueva contraseña</label>
                                <div class="col-md-6">
                                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-dark">Actualizar contraseña</button>
                                </div>
                            </div>
                       
                       
                       
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
