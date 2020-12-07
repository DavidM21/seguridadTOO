@extends('layouts.security')

@section('section', 'Inicio')

@section('content')<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
-->

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
                <div class="mb-3">
                    <i class="feather icon-user-check auth-icon"></i>
                </div>
                    @csrf @method('GET')
                    <h3 class="mb-4">{{ __('Verify Your Email Address') }}</h3>

                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    <p class="mb-4">
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <b>pulsa el botón para que te enviemos otro</b>.
                    </p>

                    <a href="{{ route('verify.resend', $user->id)}}" class="btn btn-primary text-white">Enviar de Nuevo</a><br><br>

                    <!--<button type="submit" class="btn btn-primary mb-4 shadow-2">Enviar de Nuevo</button>-->
                    <p class="mb-0 text-muted">¿No tienes una cuenta? <a href="{{ route('register') }}">Regístrate</a></p>
                    <p class="mb-0 text-muted">¿Ya tienes una cuenta?  <a href="{{ route('login') }}"> Iniciar Sesión</a></p>

            </div>
        </div>
    </div>
</div>
@endsection
