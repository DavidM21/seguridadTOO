@extends('layouts.business')

@section('section', 'Roles')

@section('content')

    <!-- Inicio Card Usuarios -->
    @can('Gestor Usuarios')
        <div class="col-xl-4 col-md-6">
            <div class="card card-event">
                <div class="card-block">
                    <div class="row align-items-center justify-content-center">
                        <div class="col">
                            <h5 class="m-0">USUARIOS</h5>
                        </div>
                        <div class="col-auto">
                            <a href="{{route('users.index')}}">
                                <span class="label theme-bg2 text-white f-14 f-w-400 float-right">Ver</span>
                            </a>
                        </div>
                    </div>
                    <h2 class="mt-3 f-w-300">{{$users}}<sub class="text-muted f-14">Usuarios</sub></h2>
                    <h6 class="text-muted mt-4 mb-0"></h6>
                    <i class="feather icon-users text-c-purple f-50"></i>
                </div>
            </div>
        </div>
    @endcan
    <!-- Inicio Card Usuarios -->
    <!-- Inicio Card Roles -->
    @can('Gestor Roles')
        <div class="col-xl-4 col-md-6">
            <div class="card card-event">
                <div class="card-block">
                    <div class="row align-items-center justify-content-center">
                        <div class="col">
                            <h5 class="m-0">ROLES & PERMISOS</h5>
                        </div>
                        <div class="col-auto">
                            <a href="{{route('roles.index')}}">
                                <span class="label theme-bg2 text-white f-14 f-w-400 float-right">Ver</span>
                            </a>
                        </div>
                    </div>
                    <h2 class="mt-3 f-w-300">{{$roles_and_permisison}}<sub class="text-muted f-14">Roles & Permisos</sub></h2>
                    <h6 class="text-muted mt-4 mb-0"></h6>
                    <i class="feather icon-award text-c-purple f-50"></i>
                </div>
            </div>
        </div>
    @endcan
    <!-- Fin Card Roles -->


    <!-- Inicio Card Activities -->
    @can('Gestor Usuarios')
        <div class="col-xl-4 col-md-6">
            <div class="card card-event">
                <div class="card-block">
                    <div class="row align-items-center justify-content-center">
                        <div class="col">
                            <h5 class="m-0">ACTIVIDAD</h5>
                        </div>
                        <div class="col-auto">
                            <a href="{{route('estadistica.mostrarestadistica')}}">
                                <span class="label theme-bg2 text-white f-14 f-w-400 float-right">Ver</span>
                            </a>
                        </div>
                    </div>
                    <h2 class="mt-3 f-w-300">70<sub class="text-muted f-14">Registros</sub></h2>
                    <h6 class="text-muted mt-4 mb-0"></h6>
                    <i class="feather icon-activity text-c-purple f-50"></i>
                </div>
            </div>
        </div>
    @endcan
    <!-- Fin Card Activities -->

    @role('Usuario')
    <!-- Inicio Card Organizaciones -->
    @can('Gestor Organizaciones')
        <div class="col-xl-4 col-md-6">
        <div class="card card-event">
            <div class="card-block">
                <div class="row align-items-center justify-content-center">
                    <div class="col">
                        <h5 class="m-0">OORGANIZACIONES</h5>
                    </div>
                    <div class="col-auto">
                        <a href="{{route('organizacion.show')}}">
                            <span class="label theme-bg2 text-white f-14 f-w-400 float-right">Ver</span>
                        </a>
                    </div>
                </div>
                <h2 class="mt-3 f-w-300">{{$organizations}}<sub class="text-muted f-14">Organizaciones</sub></h2>
                <h6 class="text-muted mt-4 mb-0"></h6>
                <i class="feather icon-shield text-c-purple f-50"></i>
            </div>
        </div>
    </div>
    @endcan
    <!-- Fin Card Organizaciones -->
    <!-- Inicio Card Departamentos -->
    @can('Gestor Departamentos')
        <div class="col-xl-4 col-md-6">
            <div class="card card-event">
                <div class="card-block">
                    <div class="row align-items-center justify-content-center">
                        <div class="col">
                            <h5 class="m-0">DEPARTAMENTOS</h5>
                        </div>
                        <div class="col-auto">
                            <a href="{{route('departamento.show')}}">
                                <span class="label theme-bg2 text-white f-14 f-w-400 float-right">Ver</span>
                            </a>
                        </div>
                    </div>
                    <h2 class="mt-3 f-w-300">{{$departments}}<sub class="text-muted f-14">Departamentos</sub></h2>
                    <h6 class="text-muted mt-4 mb-0"></h6>
                    <i class="feather icon-copy text-c-purple f-50"></i>
                </div>
            </div>
        </div>
    @endcan
    <!-- Fin Card Departamentos -->

    <!-- Inicio Card Secciones -->
    @can('Gestor Secciones')
        <div class="col-xl-4 col-md-6">
            <div class="card card-event">
                <div class="card-block">
                    <div class="row align-items-center justify-content-center">
                        <div class="col">
                            <h5 class="m-0">SECCIONES</h5>
                        </div>
                        <div class="col-auto">
                            <a href="{{route('seccion.show')}}">
                                <span class="label theme-bg2 text-white f-14 f-w-400 float-right">Ver</span>
                            </a>
                        </div>
                    </div>
                    <h2 class="mt-3 f-w-300">{{$sections}}<sub class="text-muted f-14">Secciones</sub></h2>
                    <h6 class="text-muted mt-4 mb-0"></h6>
                    <i class="feather icon-grid text-c-purple f-50"></i>
                </div>
            </div>
        </div>
    @endcan
    <!-- Fin Card Secciones -->

    <!-- Inicio Card Puestos -->
    @can('Gestor Puestos')
        <div class="col-xl-4 col-md-6">
            <div class="card card Recent-Users card-event">
                <div class="card-block">
                    <div class="row align-items-center justify-content-center">
                        <div class="col">
                            <h5 class="m-0">PUESTOS</h5>
                        </div>
                        <div class="col-auto">
                            <a href="{{route('puestos.show')}}">
                                <span class="label theme-bg2 text-white f-14 f-w-400 float-right">Ver</span>
                            </a>
                        </div>
                    </div>
                    <h2 class="mt-3 f-w-300">{{$jobpositions}}<sub class="text-muted f-14">Puestos</sub></h2>
                    <h6 class="text-muted mt-4 mb-0"></h6>
                    <i class="feather icon-monitor text-c-purple f-50"></i>
                </div>
            </div>
        </div>
    @endcan
    <!-- Fin Card Puestos -->

    <!-- Inicio Card Empleados -->
    @can('Gestor Empleados')
        <div class="col-xl-4 col-md-6">
            <div class="card card-event">
                <div class="card-block">
                    <div class="row align-items-center justify-content-center">
                        <div class="col">
                            <h5 class="m-0">EMPLEADOS</h5>
                        </div>
                        <div class="col-auto">
                            <a href="{{route('empleado.show')}}">
                                <span class="label theme-bg2 text-white f-14 f-w-400 float-right">Ver</span>
                            </a>
                        </div>
                    </div>
                    <h2 class="mt-3 f-w-300">{{$employee}}<sub class="text-muted f-14">Empleados</sub></h2>
                    <h6 class="text-muted mt-4 mb-0"></h6>
                    <i class="feather icon-user text-c-purple f-50"></i>
                </div>
            </div>
        </div>
    @endcan
    <!-- Fin Card Empleados -->
    @endrole

    <!-- Inicio Card Ajustes -->
    @hasanyrole('Super Administrador|Administrador|Usuarios')
    <div class="col-xl-4 col-md-6">
        <div class="card card-event">
            <div class="card-block">
                <div class="row align-items-center justify-content-center">
                    <div class="col">
                        <h5 class="m-0"></h5>
                    </div>
                    <div class="col-auto">
                        <a href="#">
                            <span class="label theme-bg2 text-white f-14 f-w-400 float-right">Ajustes</span>
                        </a>
                    </div>
                </div>
                <h2 class="mt-3 f-w-300">AJUSTES<sub class="text-muted f-14"></sub></h2>
                <h6 class="text-muted mt-4 mb-0"></h6>
                <i class="feather icon-settings text-c-purple f-70"></i>
            </div>
        </div>
    </div>
    @endhasanyrole
    <!-- Fin Card Ajustes -->
    <!-- Inicio Card Salir -->
    <div class="col-xl-4 col-md-6">
        <div class="card card-event">
            <div class="card-block">
                <div class="row align-items-center justify-content-center">
                    <div class="col">
                        <h5 class="m-0"></h5>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('logout') }}" class="dud-logout" title="Logout" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <span class="label theme-bg2 text-white f-14 f-w-400 float-right">Salir</span>
                        </a>
                    </div>
                </div>
                <h2 class="mt-3 f-w-300">SALIR<sub class="text-muted f-14"></sub></h2>
                <h6 class="text-muted mt-4 mb-0"></h6>
                <i class="feather icon-log-out text-c-purple f-70"></i>
            </div>
        </div>
    </div>
    <!-- Fin Card Salir -->

@endsection

@section('js_after')

@endsection
