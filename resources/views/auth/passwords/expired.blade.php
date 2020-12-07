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
                <div class="panel-heading">Actualización de Contraseña</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        <a href="/home">Regresar</a>
                    @else

                    <div class="alert alert-info">
                        Su contraseña a expirado, por favor cambiela.
                    </div>

                    <form class="form-horizontal" method="POST" action="{{ route('password.post_expired') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <input id="current_password" type="password" class="form-control" name="current_password" placeholder="Contraseña Actual" required="">

                                @if ($errors->has('current_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Nueva Contraseña" required="">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Nueva Contraseña" required="">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-5">
                                <button type="submit" class="btn btn-primary shadow-2 mb-4">
                                    Actualizar Contraseña
                                </button>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection