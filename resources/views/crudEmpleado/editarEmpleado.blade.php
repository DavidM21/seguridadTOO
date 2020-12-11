@extends('layouts.business')

@section('section', 'Empleado')

@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">EMPLEADOS</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:">Empleados</a></li>
                        <li class="breadcrumb-item"><a href="javascript:">Editar empleado</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12">
        <div class="card Recent-Users">
            <div class="card-header unread">
                <h5>Información del Empleado</h5>
                <br>
                <small class="text-danger">* Obligatorio</small>
            </div>
            <div class="card-header py-3"> <!--pegar desde row-->
            <div class="row">
                <div class="col-md-6">
                <form id="formulario" method="POST" action="{{route('empleado.update', $employee)}}"> <!--cambiar -->
            @csrf @method('PATCH')
            <div class="form-group">
                <label><b>Nombre</b><span class="text-danger">*</span></label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="{{ $employee->first_name}}">
                {!! $errors->first('nombre','<small class="text-danger">:message</small>')!!}
            </div>
            <div class="form-group">
                <label><b>DUI</b><span class="text-danger">*</span></label>
                <input type="text" name="dui" class="form-control" placeholder="00000000-0" value="{{ $employee->dui}}">
                {!! $errors->first('dui','<small class="text-danger">:message</small>')!!}
            </div>
            <div class="form-group">
                <label><b>ISSS</b><span class="text-danger">*</span></label>
                <input type="text" name="isss" class="form-control" placeholder="00000000-0" value="{{ $employee->isss}}">
                {!! $errors->first('isss','<small class="text-danger">:message</small>')!!}

            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1"><b>Puesto de trabajo</b><span class="text-danger">*</span></label>
                <select class="form-control" id="exampleFormControlSelect1" name="puestoDeTrabajo" value="{{ $employee->job_position_id}}">
                    @foreach($puestos as $puesto)
                    <option value="{{ $puesto->id}}">{{ $puesto->name}}</option>
                    @endforeach
                </select>
                {!! $errors->first('puestoDeTrabajo','<small class="text-danger">:message</small>')!!}
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1"><b>Departamento</b><span class="text-danger">*</span></label>
                <select class="form-control" id="departamento2" >
                    @foreach($departamentos as $departamento)
                    <option value="{{ $departamento->id}}">{{ $departamento->name}}</option>
                    @endforeach
                </select>
                {!! $errors->first('departamento','<small class="text-danger">:message</small>')!!}
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1"><b>Municipio</b><span class="text-danger">*</span></label>
                <select class="form-control" id="municipio" name="municipio">
                    @foreach($municipios as $municipio)
                    <option value="{{ $municipio->id}}">{{ $municipio->name}}</option>
                    @endforeach
                </select>
                {!! $errors->first('municipio','<small class="text-danger">:message</small>')!!}
            </div>
    </div>
    <div class="col-md-6">
            <div class="form-group">
                <label><b>Apellido</b><span class="text-danger">*</span></label>
                <input type="text" name="apellido" class="form-control" placeholder="Apellido" value="{{ $employee->last_name}}">
                {!! $errors->first('apellido','<small class="text-danger">:message</small>')!!}
            </div>
            <div class="form-group">
                <label><b>NIT</b><span class="text-danger">*</span></label>
                <input type="text" name="nit" class="form-control" placeholder="0000-000000-000-0" value="{{ $employee->nit}}">
                {!! $errors->first('nit','<small class="text-danger">:message</small>')!!}
            </div>
            <div class="form-group">
                <label><b>NUP</b><span class="text-danger">*</span></label>
                <input type="text" name="nup" class="form-control" placeholder="averiguar" value="{{ $employee->nup}}">
                {!! $errors->first('nup','<small class="text-danger">:message</small>')!!}
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1"><b>Estado civil</b><span class="text-danger">*</span></label>
                <select class="form-control" id="exampleFormControlSelect1" name="estadoCivil" value="{{ $employee->marital_status_id}}">
                    @foreach($estadoCiviles as $estadoCivil)
                    <option value="{{$estadoCivil->id}}">{{$estadoCivil->name}}</option>
                    @endforeach
                </select>
                {!! $errors->first('estadoCivil','<small class="text-danger">:message</small>')!!}
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1"><b>Género</b><span class="text-danger">*</span></label>
                <select class="form-control" id="exampleFormControlSelect1" name="genero" value="{{ $employee->gender_id}}">
                    @foreach ($generos as $genero)
                    <option value="{{$genero->id}}">{{$genero->name}}</option>
                    @endforeach
                </select>
                {!! $errors->first('genero','<small class="text-danger">:message</small>')!!}
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1"><b>Dirección</b><span class="text-danger">*</span></label>
                <textarea class="form-control" name="direccion" id="exampleFormControlTextarea1" rows="3" value="{{ $employee->address}}"></textarea>
                {!! $errors->first('direccion','<small class="text-danger">:message</small>')!!}
            </div>
        </form>
                </div>
            </div>
            <div class="card-footer text-rigth">
            <a class="btn btn-outline-danger mb-2" href="{{route('empleado.show')}}">Cancelar</a>
                <button type="submit" class="btn btn-outline-primary"  form="formulario">Actualizar</button>
                </div>
            </div> <!-- hasta aca-->
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












