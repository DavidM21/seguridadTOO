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
                        <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuarios</a></li>
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
                <form method="POST" action="{{ route('roles.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Rol</label>
                                <input class="form-control @error('name') is-invalid @enderror" id="name"
                                       name="name" placeholder="Nombre" value="{{ old('name') }}">

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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Permisos</label>


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

@endsection

