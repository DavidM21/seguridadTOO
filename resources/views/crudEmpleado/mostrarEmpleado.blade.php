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
    <i class="feather icon-plus-circle"></i>Agregar Empleado</button>
@endsection

@section('contenido')
    <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>
                        <button type="button" class="btn btn-dark" title="Editar" data-toggle="tooltip">
                        <i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-danger" title="Eliminar" data-toggle="tooltip">
                        <i class="fas fa-trash-alt"></i></i></button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>
                        <button type="button" class="btn btn-dark" title="Editar" data-toggle="tooltip">
                        <i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-danger" title="Eliminar" data-toggle="tooltip">
                        <i class="fas fa-trash-alt"></i></i></button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                        <td>
                        <button type="button" class="btn btn-dark" title="Editar" data-toggle="tooltip">
                        <i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-danger" title="Eliminar" data-toggle="tooltip">
                        <i class="fas fa-trash-alt"></i></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
