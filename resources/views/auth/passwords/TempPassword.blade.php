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
                    <form method="POST" action="{{ route('temporary.password.post', $user->id) }}">
                        @csrf
                        <div class="mb-4">
                            <i class="feather icon-user-check auth-icon"></i>
                        </div>
                        <h3 class="mb-4">Cambio de Contraseña Provisional</h3>
                        <div class="input-group mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email',  $user->email ? : '')}}"
                                   autocomplete="email" autofocus placeholder="Correo Electrónico">
                            @error('email')
                            <span class="invalid-feedback text-left" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="input-group mb-4">
                            <input id="temp_password" type="password" class="form-control
                            @error('temp_password') is-invalid @enderror" name="temp_password"
                                   autocomplete="current-password" placeholder="Constraseña Provisional">
                            @error('temp_password')
                            <span class="invalid-feedback text-left" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="input-group mb-4">
                            <input id="new_password" type="password" class="form-control
                            @error('new_password') is-invalid @enderror" name="new_password"
                                   autocomplete="current-password" placeholder="Nueva Constraseña">
                            @error('new_password')
                            <span class="invalid-feedback text-left" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="input-group mb-4">
                            <input id="new_password_confirmation" type="password" class="form-control
                            @error('new_password_confirmation') is-invalid @enderror" name="new_password_confirmation"
                                   autocomplete="current-password" placeholder="Confirmación Nueva Constraseña">
                            @error('new_password_confirmation')
                            <span class="invalid-feedback text-left" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary shadow-2 mb-4">Actualizar contraseña</button>


                        <p class="mb-0 text-muted">¿No tienes una cuenta? <a href="{{ route('register') }}">Regístrate</a></p>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

