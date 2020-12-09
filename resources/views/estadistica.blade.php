@extends('layouts.business')

@section('section', 'Inicio')

@section('content')


<section class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <!-- [ breadcrumb ] start -->
                    <div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-left">
                                <div class="col-md-6">
                                    <div class="page-header-title">
                                        <h5 class="m-b-10">Estadisticas</h5>
                                    </div>
                                </div>
                                <div class="clo-md-6">
                                    <form action="/estadistica/search" method="get">
                                        <div class="input-group">
                                            <input type="search" name="search" class="form-control">
                                            <span class="input-group-prepend">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [ breadcrumb ] end -->
                    

                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <!-- [ Hover-table ] start -->
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Estadistica de usuarios</h5>
                                        </div>
                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Nombre usuario</th>
                                                            <th># bloqueos</th>
                                                            <th># cambios de clave</th>
                                                            <th># roles tenidos</th>
                                                            <th>Fecha actualización</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($estadisticas as $estadistica)
                                                        <tr>                                                        
                                                            <td>{{$estadistica->user->first_name}}</td>
                                                            <td>0</td>
                                                            <td>{{$estadistica->password_changes}}</td>
                                                            <td>{{$estadistica->number_of_roles}}</td>
                                                            <td>{{$estadistica->updated_at}}</td>
                                                        </tr>
                                                    @endforeach    
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ Hover-table ] end -->
                            {!! $estadisticas ->links() !!}    

                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection