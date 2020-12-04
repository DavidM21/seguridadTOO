@extends('base')

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
                <a href="#" class=" bd-clipboard label btn-primary text-white f-12 badge-pill" data-toggle="tooltip" data-placement="top" title="Nuevo">
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
                            <th>Permisos</th>
                            <!--<th>Última Actualización</th>-->
                            <th >Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr class="unread">
                                <th scope="row">{{ $role->id }}</th>
                                <td>{{ $role->name }}</td>
                                <td class="d-none d-sm-table-cell">
                                    <span class="badge badge-primary">{{ count($role->permissions) }}</span>
                                    @if(count($role->permissions)>0)
                                        @foreach($role->permissions->pluck('name') as $permission)
                                            <span class="badge badge-info">{{ $permission }}</span>
                                        @endforeach
                                    @else
                                        Rol sin permisos
                                    @endif
                                </td>
                                <!--<td>
                                    <h6 class="text-muted"><i class="fas fa-circle text-c-red f-10 m-r-15"></i>11 MAY 10:35</h6>
                                </td>-->
                                <td>
                                    <a href="#!" class="label btn-info text-white f-12" data-toggle="tooltip"
                                       data-placement="top" title="Editar">
                                        <span class="pcoded-micon"><i class="feather icon-edit-2"></i></span>
                                        <!--<span class="pcoded-mtext">Editar</span>-->
                                    </a>
                                    <a href="#!" class="label btn-danger text-white f-12" data-toggle="tooltip"
                                       data-placement="top" title="Eliminar">
                                        <span class="pcoded-micon"><i class="feather icon-trash-2"></i></span>
                                        <!--<span class="pcoded-mtext">Eliminar</span>-->
                                    </a>
                                </td>
                            </tr>
                            <!--<tr class="unread">
                                <th scope="row">1</th>
                                <td>
                                    Isabella Christensen

                                </td>
                                <td>Otto asddfgfbdvs gdfhmjnhbgvfd ntybrtvfcd</td>
                                <td>
                                    <h6 class="text-muted"><i class="fas fa-circle text-c-red f-10 m-r-15"></i>11 MAY 10:35</h6>
                                </td>
                                <td>
                                    <a href="#!" class="label btn-info text-white f-12">
                                        <span class="pcoded-micon"><i class="feather icon-edit-2"></i></span>
                                        <span class="pcoded-mtext">Editar</span>
                                    </a>
                                    <a href="#!" class="label btn-danger text-white f-12">
                                        <span class="pcoded-micon"><i class="feather icon-trash-2"></i></span>
                                        <span class="pcoded-mtext">Eliminar</span>
                                    </a>
                                </td>
                            </tr>-->
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection