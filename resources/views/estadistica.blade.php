@extends('layouts.business')

@section('section', 'Inicio')

@section('content')


<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">ESTADISTICAS</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="javascript:">Estadisticas</a></li>
                </ul>

            </div>

        </div>
    </div>
</div>

<div class="col-xl-12">
    <div class="card Recent-Users">
        <div class="card-header unread">
            <h5>Estadisticas</h5>
            <span class="badge badge-success">{{count($estadisticas)}}</span>
        </div>
        <br>
        <div class="col-xl-3">
            <form action="/estadistica/search" method="get">
                <div class="input-group">
                    <input type="search" name="search" class="form-control">
                    <span class="input-group-prepend">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </span>
                </div>
            </form>
        </div>

        <div class="col-lg-12">
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Usuario</th>
                            <th># bloqueos</th>
                            <th># cambios de clave</th>
                            <th># roles</th>
                            <th>Fecha actualización</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($estadisticas as $estadistica)
                            <tr>
                                <td>{{$estadistica->user->first_name}} {{$estadistica->user->last_name}}</td>
                                <td>0</td>
                                <td>{{$estadistica->password_changes}}</td>
                                <td>{{$estadistica->number_of_roles}}</td>
                                <td>{{$estadistica->updated_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card-block table-border-style">
                <h5>Cantidad de Usuarios por Roles</h5>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Rol</th>
                            <th>Cantidad de usuarios</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($role as $roles)
                            <tr>
                                <td>{{$roles->name}}</td>
                                <td>{{ count($roles->users) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>



    </div>
</div>
<!-- [ Hover-table ] end -->
{!! $estadisticas ->links() !!}


<!-- [ Main Content ] end -->

    </section>

@endsection
