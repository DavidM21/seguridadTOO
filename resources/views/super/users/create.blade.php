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
                        <li class="breadcrumb-item"><a href="#">Crear usuario</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12">
        <div class="card Recent-Users">
            <div class="card-header unread">
                <h5>Usuario</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombres</label>
                                <input class="form-control @error('first_name') is-invalid @enderror" id="first_name"
                                       name="first_name" placeholder="Nombres" value="{{ old('first_name') }}">

                                @error('first_name')
                                <span class="invalid-feedback text-left" role="alert">
                                           <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>



                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Apellidos</label>
                                <input class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                                       name="last_name" placeholder="Apellidos" value="{{ old('last_name') }}">

                                @error('last_name')
                                <span class="invalid-feedback text-left" role="alert">
                                           <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>


                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Correo Electrónico</label>
                                <input class="form-control @error('email') is-invalid @enderror" id="email"
                                       name="email" placeholder="email@dominio.com" value="{{ old('email') }}">

                                @error('email')
                                <span class="invalid-feedback text-left" role="alert">
                                           <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>


                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Cumpleaños</label>
                                <input class="form-control @error('birthday') is-invalid @enderror" id="birthday"
                                       name="birthday" placeholder="mm/dd/aaaa" data-mask="00/00/0000"
                                       value="{{ old('birthday') }}">

                                @error('birthday')
                                <span class="invalid-feedback text-left" role="alert">
                                           <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>



                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Teléfono Celular</label>
                                <input class="form-control @error('cell_phone') is-invalid @enderror" id="cell_phone"
                                       name="cell_phone" placeholder="(999) 9999-9999" data-mask="(000) 0000-0000"
                                       value="{{ old('cell_phone') }}">

                                @error('cell_phone')
                                <span class="invalid-feedback text-left" role="alert">
                                           <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>


                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Roles</label>
                                <select name="role[]" id="role[]" multiple class="selectpicker
                                form-control @error('role') is-invalid
                                                    @enderror" id="number-multiple"
                                        data-container="body" data-live-search="true" title="Selección de Roles"
                                        data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}"
                                                @if (old('role') == $role->id) selected="selected" @endif">
                                        {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('role')
                                <span class="invalid-feedback text-left" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>

                    </div>

                    <a href="{{ route('users.index')}}" type="button" class="btn btn-outline-danger">Cancelar</a>
                    <button type="submit" class="btn btn-outline-primary" id="guardar">Guardar</button>
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

