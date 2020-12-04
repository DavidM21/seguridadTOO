@extends('layouts.business')

@section('section', 'Eliminar Empleado')

@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Eliminar empleado</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:">Empleado</a></li>
                        <li class="breadcrumb-item"><a href="javascript:">Eliminar</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12">
        <div class="card Recent-Users">
            <div class="card-header unread">
                <h5>Eliminar Empleado</h5>

            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('empleado.destroy', $empleado->id) }}">
                    @csrf @method('DELETE')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><b>Nombre</b><span class="text-danger">*</span></label>
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="{{$empleado->first_name}}" disabled>
                            </div>
                            <div class="form-group">
                                <label><b>Apellido</b><span class="text-danger">*</span></label>
                                <input type="text" name="apellido" class="form-control" placeholder="Apellido" value="{{ $empleado->last_name}}" disabled>
                            </div>
                            <div class="form-group">
                                <label><b>DUI</b><span class="text-danger">*</span></label>
                                <input type="text" name="dui" class="form-control" placeholder="00000000-0" value="{{ $empleado->dui}}" disabled>
                            </div>
                            <a href="{{ route('empleado.show')}}" type="button" class="btn btn-outline-danger">Cancelar</a>
                            <button type="submit" class="btn btn-outline-primary" id="guardar">Eliminar</button>
                        </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js_after')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
@endsection
