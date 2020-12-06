@extends('layouts.business')

@section('section', 'Empleados')

@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">EMPLEADOS</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:">Empleados</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12">
        <div class="card Recent-Users">
            <div class="card-header unread">
                <h5>Empleados</h5>
                <span class="badge badge-success">{{count($empleados)}}</span>

                <a style="box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.2);" href="{{ route('empleado.create') }}"
                   class="fa-pull-right label btn-primary text-white f-12 badge-pill" data-toggle="tooltip"
                   data-placement="top" title="Nuevo">
                    <span class="pcoded-micon"><i class="feather icon-plus"></i></span>
                    <!--<span class="pcoded-mtext">Nuevo</span>-->
                </a>
                <a style="box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.2);" href="{{ route('puestos.show') }}"
                   class="fa-pull-right label btn-primary text-white f-12 badge-pill" data-toggle="tooltip"
                   data-placement="top" title="Atras">
                    <span class="pcoded-micon"><i class="feather icon-corner-up-left"></i></span>
                    <!--<span class="pcoded-mtext">Nuevo</span>-->
                </a>
            </div>

            <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>DUI</th>
                        <th>Municipio</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($empleados as $empleado)
                    <tr>
                        <th>{{$empleado->id}}</th>
                        <td>{{$empleado->first_name}}</td>
                        <td>{{$empleado->last_name}}</td>
                        <td>{{$empleado->dui}}</td>
                        <td>{{$empleado->city_id}}</td>
                        <td>

                        <a href="{{ route('empleado.edit', $empleado) }}" class="label btn-info text-white f-12" data-toggle="tooltip"
                                       data-placement="top" title="Editar">
                                        <span class="pcoded-micon"><i class="feather icon-edit-2"></i></span>
                                        <!--<span class="pcoded-mtext">Editar</span>-->
                        </a>

                        <a href="{{ route('empleado.confirm', $empleado->id) }}" class="label btn-danger text-white f-12" data-toggle="tooltip"
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












