@extends('layouts.business')

@section('section', 'Puesto de Trabajo')

@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">PUESTOS DE TRABAJOS</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:">Puestos de trabajo</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12">
        <div class="card Recent-Users">
            <div class="card-header unread">
                <h5>Puestos de trabajo</h5>
                <span class="badge badge-success">{{count($puestos)}}</span>

                <a style="box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.2);" href="{{ route('puestos.create') }}"
                   class="fa-pull-right label btn-primary text-white f-12 badge-pill" data-toggle="tooltip"
                   data-placement="top" title="Nuevo">
                    <span class="pcoded-micon"><i class="feather icon-plus"></i></span>
                    <!--<span class="pcoded-mtext">Nuevo</span>-->
                </a>
                <a style="box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.2);" href="{{ route('seccion.show') }}" class="fa-pull-right label btn-primary text-white f-12 badge-pill" data-toggle="tooltip" data-placement="top" title="Atras">
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
                        <th>Salario</th>
                        <th>Sección</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($puestos as $puesto)
                    <tr>
                        <th>{{$puesto->id}}</th>
                        <td>{{$puesto->name}}</td>
                        <td>{{$puesto->salary}}</td>
                        <td>{{$puesto->section_id}}</td>
                        <td>

                        <a href="{{ route('empleado.show')}}" class="label btn-secondary text-white f-12" data-toggle="tooltip"
                                       data-placement="top" title="Agregar empleado">
                                        <span class="pcoded-micon"><i class="feather icon-user-plus"></i></span>
                                        <!--<span class="pcoded-mtext">Eliminar</span>-->
                        </a>
                        <a href="{{ route('puestos.edit', $puesto) }}" class="label btn-info text-white f-12" data-toggle="tooltip"
                                       data-placement="top" title="Editar">
                                        <span class="pcoded-micon"><i class="feather icon-edit-2"></i></span>
                                        <!--<span class="pcoded-mtext">Editar</span>-->
                        </a>

                        <a href="{{ route('puestos.confirm', $puesto->id) }}" class="label btn-danger text-white f-12" data-toggle="tooltip"
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


