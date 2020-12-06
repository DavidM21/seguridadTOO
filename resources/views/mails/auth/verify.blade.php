@extends('layouts.security')
@section('section', 'Regístrate')
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
                    <div class="mb-4">
                        <i class="feather icon-mail auth-icon"></i>
                    </div>
                    <h3 class="mb-4">Correo de Verificación</h3>
                    <div class="input-group mb-3">
                        <p>
                            Hola {{ $user->email }},<br>
                            Se te ha asignado el nombre de usuario <b>{{$user->username}}</b><br>
                            Además siguiente contraseña provisional: <b>{{$password}}</b> <br>
                            La cual debe cambiar en el siguiente enlace
                        </p>
                    </div>
                    <button class="btn btn-primary mb-4 shadow-2">Verificarme</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_after')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
@endsection



