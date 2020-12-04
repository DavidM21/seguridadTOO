@extends('layouts.business')

@section('section', 'Roles')

@section('css_before')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
@endsection

@section('content')

@if( session('notification'))
    <!-- Then put toasts within -->
    <div id="toast1" class="toast" role="alert" aria-live="assertive" aria-atomic="true"
         style="position: absolute; top: 0; right: 0;" data-delay="6000">
        <div class="toast-header alert-success">
            <strong class="mr-auto">Notificación</strong>
            <small class="text-muted"></small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            {{ session('notification') }}
        </div>
    </div>
@endif

    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">ROLES & PERMISOS</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="feather icon-home"></i></a></li>
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
                <span class="badge badge-success">{{count($roles)}}</span>
                <a style="box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.2);" href="{{ route('roles.create') }}" class="fa-pull-right label btn-primary text-white f-12 badge-pill" data-toggle="tooltip" data-placement="top" title="Nuevo">
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
                                        <span class="badge badge-warning">Rol sin permisos</span>
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

@section('js_after')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function (){
            $('.toast').toast('show')
        });
    </script>
@endsection

