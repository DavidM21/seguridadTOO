@extends('layouts.business')

@section('section', 'Roles')

@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Form Elements</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:">Form Componants</a></li>
                        <li class="breadcrumb-item"><a href="javascript:">Form Elements</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12">
        <div class="card Recent-Users">
            <div class="card-header unread">
                <h5>Roles & Permisos</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('roles.update', $role->id) }}">
                    @csrf @method('PATCH')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Rol</label>
                                <input class="form-control @error('name') is-invalid @enderror" id="name"
                                       name="name" placeholder="Nombre" value="{{ old('name',  $role->name ? : '')}}">
                                @error('name')
                                <span class="invalid-feedback text-left" role="alert">
                                           <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                                <small id="nameHelp" class="form-text text-muted">Los nombres de roles no pueden repetirse.</small>
                            </div>

                            <a href="{{ route('roles.index')}}" type="button" class="btn btn-outline-danger">Cancelar</a>
                            <button type="submit" class="btn btn-outline-primary" id="guardar">Guardar</button>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Permisos</label>
                                <select name="permission[]" id="permission[]" multiple class="selectpicker
                                form-control @error('permission') is-invalid @enderror" id="number-multiple"
                                        data-container="body" data-live-search="true" title="Selección de Permisos"
                                        data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false">
                                    @foreach($permissions as $permission)
                                        <option value="{{ $permission->id }}"
                                                @foreach($role->permissions->pluck('name') as $permission2)
                                                    @if ($permission2 == $permission->name) selected="selected" @endif"
                                                @endforeach>
                                        {{ $permission->name }}
                                        </option>
                                    @endforeach

                                        @foreach($role->permissions->pluck('name') as $permission)
                                            <span class="badge badge-info">{{ $permission }}</span>
                                        @endforeach
                                </select>

                                @error('permission')
                                <span class="invalid-feedback text-left" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>





                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js_after')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
@endsection
