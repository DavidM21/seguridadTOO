@extends('base')

@section('titulo')
Empleados
@endsection

@section('tituloVista')
Lista de empleados
@endsection

@section('sectiones')
<li class="breadcrumb-item"><a href="javascript:">Empleado</a></li>
<li class="breadcrumb-item"><a href="javascript:">Lista</a></li>
@endsection

@section('tituloCard')
Empleados 
<br>
<br>
<button type="button" class="btn btn-outline-primary text-right" data-toggle="tooltip">
    <i class="feather icon-plus-circle"></i><a href="crearEmpleado">Agregar Empleado</a></button>
@endsection

@section('contenido')
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
                        <a href="{{ route('empleado.edit', $empleado) }}"><button type="button" class="btn btn-dark" title="Editar" data-toggle="tooltip">
                        <i class="fas fa-edit"></i></button>
                        <form  method="POST" action="{{ route('empleado.destroy', $empleado) }}">
                                    @csrf @method('DELETE')
                                    <button  class="btn btn-danger mb-1" title="Eliminar" data-toggle="tooltip">
                                    <i class="fas fa-trash-alt"></i></i></button>
                        </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
