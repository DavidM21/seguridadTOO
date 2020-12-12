@extends('layouts.security')

@section('section', 'Regístrate')

@section('content')
    <div class="auth-wrapper">
        <div class="auth-content col-8">
            <div class="auth-bg">
                <span class="r"></span>
                <span class="r s"></span>
                <span class="r s"></span>
                <span class="r"></span>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <form method="POST" action="{{ route('register_post') }}" >
                        @csrf
                        <div class="mb-3">
                            <i class="feather icon-user-plus auth-icon"></i>
                        </div>
                        <h3 class="mb-4">Regístrate</h3>
                        <div class="row">
                            <!-- INICIO FORMULARIO PARTE 1 -->
                            <div class="col-7" id="form_part1">
                                <!--
                                <h5>Preguntas de Usuario</h5>
                                <hr>-->
                                <div class="row">
                                    <div class="input-group mb-3 col-6">
                                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                                               name="first_name" value="{{ old('first_name') }}"
                                               autofocus placeholder="Nombre">
                                        @error('first_name')
                                        <span class="invalid-feedback text-left" role="alert">
                                           <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="input-group mb-3 col-6">
                                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                                               name="last_name" value="{{ old('last_name') }}"
                                               autofocus placeholder="Apellidos">
                                        @error('last_name')
                                        <span class="invalid-feedback text-left" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-group mb-3 col-12">
                                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                               value="{{ old('email') }}" autocomplete="name"
                                               autofocus placeholder="Correo Electrónico">
                                        @error('email')
                                        <span class="invalid-feedback text-left" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-group mb-3 col-6">
                                        <input name="birthday" id="birthday" type=text onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control @error('birthday') is-invalid @enderror"
                                               value="{{ old('birthday') }}" placeholder="Cumpleaños">
                                        @error('birthday')
                                        <span class="invalid-feedback text-left" role="alert">
                                               <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="input-group mb-3 col-6">
                                        <input name="cell_phone"  class="form-control @error('cell_phone') is-invalid @enderror"
                                               value="{{ old('cell_phone') }}" autocomplete="name"
                                               autofocus data-mask="(000) 0000-0000" placeholder="Teléfono - (999) 9999-9999">
                                        @error('cell_phone')
                                        <span class="invalid-feedback text-left" role="alert">
                                           <strong>{{ $message }}</strong>
                                </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row justify-content-md-center">
                                    <div class="input-group mb-3 col-6">
                                        <input id="passcode" type="password" class="form-control text-center
                                                @error('passcode') is-invalid @enderror"
                                               name="passcode" value="{{ old('passcode') }}" autocomplete=""
                                               autofocus placeholder="Código de 4 digitos" data-mask="0000">
                                        @error('passcode')
                                        <span class="invalid-feedback text-left" role="alert">
                                           <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group text-left">
                                    <div class="checkbox checkbox-fill d-inline">
                                        <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-1" checked="">
                                        <label for="checkbox-fill-1" class="cr"> Recuérdame</label>
                                    </div>
                                </div>
                            </div>
                            <!-- FIN FORMULARIO PARTE 1 -->

                            <br><br>
                            <!-- INICIO FORMULARIO PARTE 2 -->
                            <div  class="col-5" id="form_part2">
                                <!--
                                <h5>Preguntas de Seguridad</h5>
                                <hr>-->
                                <div class="row">
                                    <div class="col-5">

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group text-left mb-2">
                                                    <!-- <label for="question_one">Pregunta 1</label> -->
                                                    <select class="form-control @error('question_one') is-invalid
                                                    @enderror" id="question_one" name="question_one">
                                                        <option selected="selected" disabled>Selecciona una pregunta</option>
                                                        @foreach($asks as $ask)
                                                            <option value="{{ $ask->id }}"
                                                                    @if ( old('question_one') == $ask->id) selected="selected" @endif"
                                                            >{{ $ask->content }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('question_one')
                                                    <span class="invalid-feedback text-left" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                    @enderror
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input id="answer_one" type="text" class="form-control
                                                        @error('answer_one') is-invalid @enderror"
                                                           name="answer_one" value="{{ old('answer_one') }}" autocomplete="answer_one"
                                                           autofocus placeholder="Respuesta 1">
                                                    @error('answer_one')
                                                    <span class="invalid-feedback text-left" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group text-left mb-2">
                                                    <!-- <label for="question_two">Pregunta 2</label>-->
                                                    <select class="form-control @error('question_two') is-invalid
                                                    @enderror" id="question_two" name="question_two">
                                                        <option selected="selected" disabled>Selecciona una pregunta</option>
                                                        @foreach($asks as $ask)
                                                            <option value="{{ $ask->id }}"
                                                                    @if ( old('question_two') == $ask->id) selected="selected" @endif"
                                                            >{{ $ask->content }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('question_two')
                                                    <span class="invalid-feedback text-left" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                    @enderror
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input id="answer_two" name="answer_two" type="text" class="form-control
                                                            @error('answer_two') is-invalid @enderror"
                                                           value="{{ old('answer_two') }}" autocomplete="name"
                                                           autofocus placeholder="Respuesta 2">
                                                    @error('answer_two')
                                                    <span class="invalid-feedback text-left" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group text-left mb-2">
                                                    <!-- <label for="question_three">Pregunta 3</label> -->
                                                    <select class="form-control @error('question_three') is-invalid
                                                    @enderror" id="question_three" name="question_three">
                                                        <option selected="selected" disabled>Selecciona una pregunta</option>
                                                        @foreach($asks as $ask)
                                                            <option value="{{ $ask->id }}"
                                                                    @if ( old('question_three') == $ask->id) selected="selected" @endif"
                                                            >{{ $ask->content }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('question_three')
                                                    <span class="invalid-feedback text-left" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="input-group mb-3">
                                                    <input id="answer_three" name="answer_three" type="text" class="form-control
                                                    @error('answer_three') is-invalid @enderror"
                                                           value="{{ old('answer_three') }}" autocomplete="name"
                                                           autofocus placeholder="Respuesta 3">
                                                    @error('answer_three')
                                                    <span class="invalid-feedback text-left" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- FIN FORMULARIO PARTE 2 -->
                        </div>

                        <button type="submit" class="btn btn-primary shadow-2 mb-4">Registrarme</button>
                        <p class="mb-0 text-muted">¿Ya tienes una cuenta?  <a href="{{ route('login') }}"> Iniciar Sesión</a></p>

                    <!-- <p class="mb-0 text-muted">¿Ya tienes una cuenta?  <a href="{{ route('login') }}"> Iniciar Sesión</a></p> -->
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js_after')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
@endsection
