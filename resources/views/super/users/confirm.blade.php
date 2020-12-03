@extends('layouts.business')

@section('section', 'Roles')

@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">USUARIOS</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuarios</a></li>
                        <li class="breadcrumb-item"><a href="#">Eliminar usuario</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12">
        <div class="card Recent-Users">
            <div class="card-header unread">
                <h5>Usuario: {{$user->username}}</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('users.update', $user->id) }}">
                    @csrf @method('DELETE')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombres</label>
                                <input class="form-control @error('first_name') is-invalid @enderror" id="first_name"
                                       name="first_name" placeholder="Nombres" value="{{ $user->first_name }}" disabled>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Apellidos</label>
                                <input class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                                       name="last_name" placeholder="Apellidos" value="{{ $user->last_name }}" disabled>
                            </div>


                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Correo Electrónico</label>
                                <input class="form-control @error('email') is-invalid @enderror" id="email"
                                       name="email" placeholder="email@dominio.com" value="{{ $user->email }}" disabled>


                            </div>


                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Cumpleaños</label>
                                <input class="form-control @error('birthday') is-invalid @enderror" id="birthday"
                                       name="birthday" placeholder="mm/dd/aaaa" data-mask="00/00/0000"
                                       value="{{ $user->birthday }}" disabled>
                            </div>



                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Teléfono Celular</label>
                                <input class="form-control @error('cell_phone') is-invalid @enderror" id="cell_phone"
                                       name="cell_phone" placeholder="(999) 9999-9999" data-mask="(000) 0000-0000"
                                       value="{{$user->cell_phone }}" disabled>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Roles Asignados</label>
                                <select name="permission[]" id="permission[]" multiple class="selectpicker
                                    form-control" id="permission[]" data-live-search="true" title="Roles Asignados"
                                        data-hide-disabled="false">
                                    @if(count($user->roles)>0)
                                        @for ($i = 0; $i < count($user->roles); $i++)
                                            <option value="" selected disabled>{{ $user->roles[$i]->name }}</option>
                                        @endfor
                                    @else
                                        <option value="" disabled>Usuario sin roles</option>

                                    @endif
                                </select>
                            </div>


                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="email_verified_at">Verificación de Correo Electrónico</label>
                                <input class="form-control @isset($user->email_verified_at) is-valid @endisset
                                @empty($user->email_verified_at) is-invalid @endempty" id="email_verified_at"
                                       name="email_verified_at"
                                       @isset($user->email_verified_at)
                                       value="{{$user->email_verified_at->format('d/M/Y 00:00:00')}}"@endisset
                                       @empty($user->email_verified_at)  value="Usuario aún no válida su email" @endempty" disabled>
                                @isset($user->email_verified_at)
                                    <div class="valid-feedback">
                                        ¡Correo electrónico válidado!
                                    </div>
                                @endisset
                                @empty($user->email_verified_at)
                                    <div class="invalid-feedback">
                                        ¡Correo electrónico no válidado!
                                    </div>
                                @endempty

                            </div>


                        </div>
                    </div>

                    <a href="{{ route('users.index')}}" type="button" class="btn btn-outline-danger">Atrás</a>
                    <button type="submit" class="btn btn-outline-primary" id="guardar">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js_after')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
@endsection

