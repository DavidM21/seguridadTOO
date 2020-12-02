@extends('base')

@section('titulo')
Crear Empleado
@endsection

@section('tituloVista')
Crear Empleado
@endsection

@section('sectiones')
<li class="breadcrumb-item"><a href="javascript:">Empleado</a></li>
<li class="breadcrumb-item"><a href="javascript:">Crear empleado</a></li>
@endsection

@section('tituloCard')
Información del empleado
<br>
<small class="text-danger">* Obligatorio</small>
@endsection

@section('contenido')                           
<div class="row">
    <div class="col-md-6" align="left">
        <form id="formulario" method="POST" action="{{route('empleado.create')}}"> <!--cambiar -->
            @csrf
            <div class="form-group">
                <label><b>Nombre</b><span class="text-danger">*</span></label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                {!! $errors->first('nombre','<small class="text-danger">:message</small>')!!}
            </div>
            <div class="form-group">
                <label><b>DUI</b><span class="text-danger">*</span></label>
                <input type="text" name="dui" class="form-control" placeholder="00000000-0">
                {!! $errors->first('dui','<small class="text-danger">:message</small>')!!}
            </div>
            <div class="form-group">
                <label><b>ISSS</b><span class="text-danger">*</span></label>
                <input type="number" name="isss" class="form-control" placeholder="averiguar">
                {!! $errors->first('isss','<small class="text-danger">:message</small>')!!}

            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1"><b>Puesto de trabajo</b><span class="text-danger">*</span></label>
                <select class="form-control" id="exampleFormControlSelect1" name="puestoDeTrabajo">
                    @foreach($puestos as $puesto)
                    <option value="{{ $puesto->id}}">{{ $puesto->name}}</option>
                    @endforeach
                </select>
                {!! $errors->first('puestoDeTrabajo','<small class="text-danger">:message</small>')!!}
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1"><b>Departamento</b><span class="text-danger">*</span></label>
                <select class="form-control" id="exampleFormControlSelect1" name="departamento">
                    @foreach($departamentos as $departamento)
                    <option value="{{ $departamento->id}}">{{ $departamento->name}}</option>
                    @endforeach
                </select>
                {!! $errors->first('departamento','<small class="text-danger">:message</small>')!!}
            </div>
            
            <div class="form-group">
                <label for="exampleFormControlSelect1"><b>Municipio</b><span class="text-danger">*</span></label>
                <select class="form-control" id="exampleFormControlSelect1" name="municipio">
                    @foreach($municipios as $municipio)
                    <option value="{{$municipio->id}}">{{$municipio->name}}</option>
                    @endforeach
                </select>
                {!! $errors->first('municipio','<small class="text-danger">:message</small>')!!}
            </div>
    </div>
    <div class="col-md-6">
            <div class="form-group">
                <label><b>Apellido</b><span class="text-danger">*</span></label>
                <input type="text" name="apellido" class="form-control" placeholder="Apellido">
                {!! $errors->first('apellido','<small class="text-danger">:message</small>')!!}
            </div>
            <div class="form-group">
                <label><b>NIT</b><span class="text-danger">*</span></label>
                <input type="text" name="nit" class="form-control" placeholder="0000-000000-000-0">
                {!! $errors->first('nit','<small class="text-danger">:message</small>')!!}
            </div>
            <div class="form-group">
                <label><b>NUP</b><span class="text-danger">*</span></label>
                <input type="text" name="nup" class="form-control" placeholder="averiguar">
                {!! $errors->first('nup','<small class="text-danger">:message</small>')!!}
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1"><b>Estado civil</b><span class="text-danger">*</span></label>
                <select class="form-control" id="exampleFormControlSelect1" name="estadoCivil">
                    @foreach($estadoCiviles as $estadoCivil)
                    <option value="{{$estadoCivil->id}}">{{$estadoCivil->name}}</option>
                    @endforeach
                </select>
                {!! $errors->first('estadoCivil','<small class="text-danger">:message</small>')!!}
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1"><b>Género</b><span class="text-danger">*</span></label>
                <select class="form-control" id="exampleFormControlSelect1" name="genero">
                    @foreach ($generos as $genero)
                    <option value="{{$genero->id}}">{{$genero->name}}</option>
                    @endforeach
                </select>
                {!! $errors->first('genero','<small class="text-danger">:message</small>')!!}
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1"><b>Dirección</b><span class="text-danger">*</span></label>
                <textarea class="form-control" name="direccion" id="exampleFormControlTextarea1" rows="3"></textarea>
                {!! $errors->first('direccion','<small class="text-danger">:message</small>')!!}
            </div>
        </form>
    </div>
</div>

<div class="card-footer text-right">
                <a class="btn btn-outline-danger mb-2" href="#">Cancelar</a>
                <button type="submit" class="btn btn-outline-primary"  form="formulario">Guardar</button>
</div>
@endsection
