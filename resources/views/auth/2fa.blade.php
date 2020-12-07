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
                    <p class="mb-2 text-muted">Usando la aplicación <b>Autenticador de Google</b> verifíquese por favor.</p>
                    <form method="POST" action="{{ route('login.2fa',$user->id) }}" aria-label="{{ __('Login') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-lg-12 text-center">
                                <img id="imgQR" src="{{$urlQR}}"/>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="code_verification" class="col-form-label" class="row justify-content-center">
                                        {{ __('CÓDIGO DE VERIFICACIÓN') }}
                                    </label>
                                    <input id="code_verification" type="text" autocomplete="off"
                                           class="form-control {{ $errors->has('code_verification') ? ' is-invalid' : '' }} text-center"
                                           name="code_verification" value="{{ old('code_verification') }}" required autofocus>
                                    @if ($errors->has('code_verification'))
                                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('code_verification') }}</strong>
                                </span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">ENVIAR</button>
                            </div>
                        </div>
                    </form>
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
