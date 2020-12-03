@extends('base')

@section('titulo')
Departamentos
@endsection

@section('tituloVista')
Lista de departamentos
@endsection

@section('sectiones')
<li class="breadcrumb-item"><a href="javascript:">Departamento</a></li>
<li class="breadcrumb-item"><a href="javascript:">Lista</a></li>
@endsection

@section('tituloCard')
Departamentos
<br>
<br>
<button type="button" class="btn btn-outline-primary text-right" data-toggle="tooltip">
    <i class="feather icon-plus-circle"></i><a href="{{ route('departamento.create')}}">Agregar Departamento</a></button>
<a class="btn btn-outline-danger mb-1" href="{{ route('organizacion.show')}}">Cancelar</a>
@endsection

@section('contenido')
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
                                <a href="{{ route('seccion.show') }}"><button type="button" class="btn btn-outline-primary text-right" title="Agregar" data-toggle="tooltip">
                                <i class="fas fa-edit"></i></button></a>

                                <a href="{{ route('departamento.edit', $department) }}"><button type="button" class="btn btn-dark" title="Editar"data-toggle="tooltip">
                                <i class="fas fa-edit"></i></button></a>
                                <form  method="POST" action="{{ route('departamento.destroy', $department) }}">
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
