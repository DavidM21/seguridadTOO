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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-14">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="mb-4">
                            <i class="feather icon-mail auth-icon"></i>
                        </div>
                        <h3 class="mb-4">Reestablecer Contraseña</h3>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="col-lg-12">
                                <div class="form-group row">
                                <div class="input-group mb-3">
                                    <input id="email" type="email" placeholder="Correo Electrónico" class="form-control
                                    @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                                           required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group row mb-2">
                                <div class="col-md-1 offset-md-0">
                                    <button type="submit" class="btn btn-primary mb-4 shadow-2">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
@section('js_after')
    <!-- Required Js -->
        <script src="assets/js/vendor-all.min.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/pcoded.min.js"></script>
@endsection
