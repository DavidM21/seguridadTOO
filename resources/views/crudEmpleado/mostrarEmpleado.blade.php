@extends('base')

@section('titulo')
Empleados
@endsection

@section('contenido')
    <!-- [ table ] start -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5>Empleados</h5>
                <br>
                <br>
                <button type="button" class="btn btn-outline-primary" data-toggle="tooltip">
                <i class="feather icon-plus-circle"></i>Agregar Empleado</button>
            </div>
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- [ table ] end -->
    
@endsection