@extends('base')

@section('titulo')
Puestos de trabajo
@endsection

@section('tituloVista')
Lista de puestos de trabajo
@endsection

@section('sectiones')
<li class="breadcrumb-item"><a href="{{ route('puestos.show')}}">Puesto de trabajo</a></li>
<li class="breadcrumb-item"><a href="javascript:">Lista</a></li>
@endsection

@section('tituloCard')
Puestos de trabajo 
<br>
<br>
<button type="button" class="btn btn-outline-primary text-right" data-toggle="tooltip">
    <i class="feather icon-plus-circle"></i><a href="crearPuesto">Agregar Puesto de trabajo</a></button>
@endsection

@section('contenido')
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
@endsection
