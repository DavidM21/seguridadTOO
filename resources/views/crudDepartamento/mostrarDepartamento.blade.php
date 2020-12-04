@extends('layouts.business')

@section('section', 'Departamentos')

@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Lista de Departamentos</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:">Departamento</a></li>
                        <li class="breadcrumb-item"><a href="javascript:">Lista</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12">
        <div class="card Recent-Users">
            <div class="card-header unread">
                <h5>Departamentos</h5>
                <a href="{{ route('departamento.create') }}" class="fa-pull-right label btn-primary text-white f-12 badge-pill" data-toggle="tooltip" data-placement="top" title="Nuevo">
                    <span class="pcoded-micon"><i class="feather icon-plus"></i></span>
                    <!--<span class="pcoded-mtext">Nuevo</span>-->
                </a>
                <a href="{{ route('organizacion.show') }}" class="fa-pull-right label btn-primary text-white f-12 badge-pill" data-toggle="tooltip" data-placement="top" title="Atras">
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
                        <th>Id Organizacion</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($departments as $department)
                        <tr>
                            <td>{{$department->id}}</td>
                            <td>{{$department->name}}</td>
                            <td>{{$department->organization_id}}</td>
                            <td>
                            <a href="{{ route('seccion.show')}}" class="label btn-secondary text-white f-12" data-toggle="tooltip"
                                data-placement="top" title="Agregar sección">
                                <span class="pcoded-micon"><i class="feather icon-plus-circle"></i></span>
                            </a>
                            <a href="{{ route('departamento.edit', $department) }}" class="label btn-info text-white f-12" data-toggle="tooltip"
                                    data-placement="top" title="Editar">
                                    <span class="pcoded-micon"><i class="feather icon-edit-2"></i></span>
                                        <!--<span class="pcoded-mtext">Editar</span>-->
                            </a>

                            <a href="{{ route('departamento.confirm', $department) }}" class="label btn-danger text-white f-12" data-toggle="tooltip"
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















