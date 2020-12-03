@extends('base')

@section('titulo')
Secciones
@endsection

@section('tituloVista')
Lista de secciones
@endsection

@section('sectiones')
<li class="breadcrumb-item"><a href="javascript:">Sección</a></li>
<li class="breadcrumb-item"><a href="javascript:">Lista</a></li>
@endsection

@section('tituloCard')
Secciones
<br>
<br>
<button type="button" class="btn btn-outline-primary text-right" data-toggle="tooltip">
    <i class="feather icon-plus-circle"></i><a href="{{ route('seccion.create')}}">Agregar Sección</a></button>
<a class="btn btn-outline-danger mb-1" href="{{ route('departamento.show')}}">Cancelar</a>
@endsection

@section('contenido')
    <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Id Departamento</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sections as $section)
                        <tr>
                            <td>{{$section->id}}</td>
                            <td>{{$section->name}}</td>
                            <td>{{$section->department_id}}</td>
                            <td>
                                <a href=""><button type="button" class="btn btn-outline-primary text-right" title="Agregar" data-toggle="tooltip">
                                <i class="fas fa-edit"></i></button></a>

                                <a href="{{ route('seccion.edit', $section) }}"><button type="button" class="btn btn-dark" title="Editar"data-toggle="tooltip">
                                <i class="fas fa-edit"></i></button></a>
                                <form  method="POST" action="{{ route('seccion.destroy', $section) }}">
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
