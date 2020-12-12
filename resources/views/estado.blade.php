@extends('layouts.business')

@section('section', 'Inicio')

@section('content')

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">ESTADOS DE USUARIOS</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="javascript:">Estados</a></li>
                </ul>

            </div>

        </div>
    </div>
</div>

<div class="col-xl-12">
    <div class="card Recent-Users">
        <div class="card-header unread">
            <h5>Estados</h5>
            <span class="badge badge-success">{{count($usuario)}}</span>
        </div>   
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($usuario as $user)
                        <tr>                                                        
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>
                            @if($user->isOnline())
                                <li class="text-success">
                                    Activo
                                </li>
                            @else
                            <li class="text-danger">
                                    Inactivo
                                </li>
                            @endif
                            </td>
                        </tr>
                    @endforeach    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- [ Hover-table ] end -->
{!! $usuario ->links() !!}   

<!-- [ Main Content ] end -->

</section>

<!-- Required Js -->

@endsection