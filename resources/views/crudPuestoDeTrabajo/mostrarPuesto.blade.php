@extends('base')

@section('titulo')
Puestos de trabajo
@endsection

@section('tituloVista')
Lista de puestos de trabajo
@endsection

@section('sectiones')
<li class="breadcrumb-item"><a href="javascript:">Puesto de trabajo</a></li>
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

                        <a href="{{ route('puestos.edit', $puesto) }}"><button type="button" class="btn btn-dark" title="Editar" data-toggle="tooltip">
                        <i class="fas fa-edit"></i></button></a>
                        <form  method="POST" action="{{ route('puestos.destroy', $puesto) }}">
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
