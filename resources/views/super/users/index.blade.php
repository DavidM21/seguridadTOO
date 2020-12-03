@extends('layouts.business')

@section('section', 'Roles')

@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">USUARIOS</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuarios</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12">
        <div class="card Recent-Users">
            <div class="card-header unread">
                <h5>Usuarios</h5>
                <span class="badge badge-success">{{count($users)}}</span>
                <a style="box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.2);" href="{{ route('users.create') }}"
                   class="fa-pull-right label btn-primary text-white f-12 badge-pill" data-toggle="tooltip"
                   data-placement="top" title="Nuevo">
                    <span class="pcoded-micon"><i class="feather icon-plus"></i></span>
                    <!--<span class="pcoded-mtext">Nuevo</span>-->
                </a>
            </div>
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th >Email</th>
                            <th>Roles</th>
                            <th>Baneado</th>
                            <th >Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    <img class="rounded-circle" style="width:40px;"
                                         src="{{asset('assets/images/user/avatar-2.jpg')}}" alt="activity-user">
                                </td>
                                <!--<th scope="row">{{ $user->id }}</th>-->
                                <td>
                                    <h6 class="mb-1">{{ $user->first_name }}</h6>
                                    <p class="m-0">{{ $user->last_name }}</p>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="badge badge-primary">{{ count($user->roles) }}</span>
                                    @if(count($user->roles)>0)
                                        @for ($i = 0; $i < count($user->roles); $i++)
                                            <span class="badge badge-info">{{ $user->roles[$i]->name }}</span>

                                            @if(($i % 2) == 0 && $i != 0)
                                                <br>
                                            @endif
                                        @endfor
                                    @else
                                        <span class="badge badge-warning">Usuario sin roles</span>
                                    @endif
                                </td>
                                <td>
                                    <h6 class="text-muted" data-toggle="tooltip"
                                        data-placement="top" title="21 MAY 2020"><i class="fas fa-circle text-c-red f-10 m-r-15" ></i>Si</h6>
                                </td>
                                <!--<td>
                                    <h6 class="text-muted"><i class="fas fa-circle text-c-red f-10 m-r-15"></i>11 MAY 10:35</h6>
                                </td>-->
                                <td>
                                    <a href="{{ route('users.show', $user->id) }}" class="label btn-secondary text-white f-12" data-toggle="tooltip"
                                       data-placement="top" title="Ver">
                                        <span class="pcoded-micon"><i class="feather icon-eye"></i></span>
                                        <!--<span class="pcoded-mtext">Editar</span>-->
                                    </a>
                                    <a href="{{ route('users.edit', $user->id) }}" class="label btn-info text-white f-12" data-toggle="tooltip"
                                       data-placement="top" title="Editar">
                                        <span class="pcoded-micon"><i class="feather icon-edit-2"></i></span>
                                        <!--<span class="pcoded-mtext">Editar</span>-->
                                    </a>
                                    <a href="{{ route('users.confirm', $user->id) }}" class="label btn-danger text-white f-12" data-toggle="tooltip"
                                       data-placement="top" title="Eliminar">
                                        <span class="pcoded-micon"><i class="feather icon-trash-2"></i></span>
                                        <!--<span class="pcoded-mtext">Eliminar</span>-->
                                    </a>
                                </td>
                            </tr>
                            <!--<tr class="unread">
                                <th scope="row">1</th>
                                <td>
                                    Isabella Christensen

                                </td>
                                <td>Otto asddfgfbdvs gdfhmjnhbgvfd ntybrtvfcd</td>
                                <td>
                                    <h6 class="text-muted"><i class="fas fa-circle text-c-red f-10 m-r-15"></i>11 MAY 10:35</h6>
                                </td>
                                <td>
                                    <a href="#!" class="label btn-info text-white f-12">
                                        <span class="pcoded-micon"><i class="feather icon-edit-2"></i></span>
                                        <span class="pcoded-mtext">Editar</span>
                                    </a>
                                    <a href="#!" class="label btn-danger text-white f-12">
                                        <span class="pcoded-micon"><i class="feather icon-trash-2"></i></span>
                                        <span class="pcoded-mtext">Eliminar</span>
                                    </a>
                                </td>
                            </tr>-->
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_after')

@endsection

