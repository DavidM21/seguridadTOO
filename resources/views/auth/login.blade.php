@extends('layouts.security')

@section('section', 'Inicio')

@section('content')
    <div class="auth-wrapper">
        <div class="auth-content">
            <div class="auth-bg">
                <span class="r"></span>
                <span class="r s"></span>
                <span class="r s"></span>
                <span class="r"></span>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <form method="POST" action="{{ route('login_post') }}">
                        @csrf
                        <div class="mb-4">
                            <i class="feather icon-unlock auth-icon"></i>
                        </div>
                        <h3 class="mb-4">Iniciar Sesión</h3>
                        <div class="input-group mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Correo Electrónico">
                            @error('email')
                            <span class="invalid-feedback text-left" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="input-group mb-4">
                            <input id="password" type="password" class="form-control
                            @error('password') is-invalid @enderror" name="password"
                                   autocomplete="current-password" placeholder="Constraseña">
                            @error('password')
                            <span class="invalid-feedback text-left" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group text-left">
                            <div class="checkbox checkbox-fill d-inline">
                                <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" checked="">
                                <label for="checkbox-fill-a1" class="cr"> Recuérdame</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary shadow-2 mb-4">Iniciar sesión</button>
                        <p class="mb-2 text-muted">¿Olvidó la contraseña? <a href="{{ route('password.request') }}">Reiniciar</a></p>
                        <p class="mb-0 text-muted">¿No tienes una cuenta? <a href="{{ route('register') }}">Regístrate</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

