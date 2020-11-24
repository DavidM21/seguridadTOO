@extends('base')

@section('titulo')
Organización
@endsection

@section('tituloVista')
Lista de organizaciones
@endsection

@section('sectiones')
<li class="breadcrumb-item"><a href="javascript:">Organización</a></li>
<li class="breadcrumb-item"><a href="javascript:">Lista</a></li>
@endsection

@section('tituloCard')
Organizaciones
<br>
<br>
<button type="button" class="btn btn-outline-primary text-right" data-toggle="tooltip">
    <i class="feather icon-plus-circle" ></i><a href="crearOrganizacion">Agregar Organización</a></button>
@endsection

@section('contenido')
    <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Organization name</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($organizations as $organization)
                        <tr>
                            <td>{{$organization->id}}</td>
                            <td>{{$organization->name}}</td>
                            <td>
                                <a href="{{ route('organizacion.edit', $organization) }}"><button type="button" class="btn btn-dark" title="Editar" data-toggle="tooltip">
                                <i class="fas fa-edit"></i></button></a>
                            <form  method="POST" action="{{ route('organizacion.destroy', $organization) }}">
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
