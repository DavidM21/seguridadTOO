@extends('layouts.business')

@section('section', 'Roles')

@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">ROLES & PERMISOS</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{route('roles.index')}}">Roles & Permisos</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12">
        <div class="card Recent-Users">
            <div class="card-header unread">
                <h5>Roles & Permisos</h5>
                <a href="{{ route('roles.create') }}" class="fa-pull-right label btn-primary text-white f-12 badge-pill" data-toggle="tooltip" data-placement="top" title="Nuevo">
                    <span class="pcoded-micon"><i class="feather icon-plus"></i></span>
                    <!--<span class="pcoded-mtext">Nuevo</span>-->
                </a>
            </div>

            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Rol</th>
                            <th >Permisos</th>
                            <!--<th>Última Actualización</th>-->
                            <th >Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <th scope="row">{{ $role->id }}</th>
                                <td>{{ $role->name }}</td>
                                <td width="65%">
                                    <span class="badge badge-primary">{{ count($role->permissions) }}</span>
                                    @if(count($role->permissions)>0)
                                        @for ($i = 0; $i < count($role->permissions); $i++)
                                            <span class="badge badge-info">{{ $role->permissions[$i]->name }}</span>

                                            @if(($i % 4) == 0 && $i != 0)
                                                <br>
                                            @endif
                                        @endfor
                                    @else
                                        Rol sin permisos
                                    @endif
                                </td>
                                <!--<td>
                                    <h6 class="text-muted"><i class="fas fa-circle text-c-red f-10 m-r-15"></i>11 MAY 10:35</h6>
                                </td>-->
                                <td>
                                    <a href="{{ route('roles.edit', $role->id) }}" class="label btn-info text-white f-12" data-toggle="tooltip"
                                       data-placement="top" title="Editar">
                                        <span class="pcoded-micon"><i class="feather icon-edit-2"></i></span>
                                        <!--<span class="pcoded-mtext">Editar</span>-->
                                    </a>
                                    <a href="{{ route('roles.confirm', $role->id) }}" class="label btn-danger text-white f-12" data-toggle="tooltip"
                                       data-placement="top" title="Eliminar">
                                        <span class="pcoded-micon"><i class="feather icon-trash-2"></i></span>
                                        <!--<span class="pcoded-mtext">Eliminar</span>-->
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_after')

@endsection
