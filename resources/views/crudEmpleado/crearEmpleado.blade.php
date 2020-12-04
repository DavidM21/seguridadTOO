@extends('base')

@section('titulo')
Crear Empleado
@endsection

@section('tituloVista')
Crear Empleado
@endsection

@section('sectiones')
<li class="breadcrumb-item"><a href="{{route('empleado.show')}}">Empleado</a></li>
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
        <form id="formulario" method="POST" action="{{route('empleado.create')}}"> 
            @csrf
            <div class="form-group">
                <label><b>Nombre</b><span class="text-danger">*</span></label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="{{ old('nombre')}}">
                {!! $errors->first('nombre','<small class="text-danger">:message</small>')!!}
            </div>
            <div class="form-group">
                <label><b>DUI</b><span class="text-danger">*</span></label>
                <input type="text" name="dui" class="form-control" placeholder="00000000-0" value="{{ old('dui')}}">
                {!! $errors->first('dui','<small class="text-danger">:message</small>')!!}
            </div>
            <div class="form-group">
                <label><b>ISSS</b><span class="text-danger">*</span></label>
                <input type="number" name="isss" class="form-control" placeholder="00000000-0" value="{{ old('isss')}}">
                {!! $errors->first('isss','<small class="text-danger">:message</small>')!!}

            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1"><b>Puesto de trabajo</b><span class="text-danger">*</span></label>
                <select class="form-control" id="puesto" name="puestoDeTrabajo" value="{{ old('puestoDeTrabajo')}}">
                <option>Seleccione un puesto de trabajo</option>
                    @foreach($puestos as $puesto)
                    <option value="{{ $puesto->id}}">{{ $puesto->name}}</option>
                    @endforeach
                </select>
                {!! $errors->first('puestoDeTrabajo','<small class="text-danger">:message</small>')!!}
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1"><b>Departamento</b><span class="text-danger">*</span></label>
                <select class="form-control" name="departamento" id="departamento" value="{{ old('departamento')}}">
                <option>Seleccione un departamento</option>
                    @foreach($departamentos as $departamento)
                    <option value="{{ $departamento->id}}">{{ $departamento->name}}</option>
                    @endforeach
                </select>
                {!! $errors->first('departamento','<small class="text-danger">:message</small>')!!}
            </div>
            
            <div class="form-group">
                <label for="exampleFormControlSelect1"><b>Municipio</b><span class="text-danger">*</span></label>
                <select class="form-control" name="municipio" id="municipio" value="{{ old('municipio')}}">
                </select>
                {!! $errors->first('municipio','<small class="text-danger">:message</small>')!!}
            </div>
    </div>
    <div class="col-md-6">
            <div class="form-group">
                <label><b>Apellido</b><span class="text-danger">*</span></label>
                <input type="text" name="apellido" class="form-control" placeholder="Apellido" value="{{ old('apellido')}}">
                {!! $errors->first('apellido','<small class="text-danger">:message</small>')!!}
            </div>
            <div class="form-group">
                <label><b>NIT</b><span class="text-danger">*</span></label>
                <input type="text" name="nit" class="form-control" placeholder="0000-000000-000-0" value="{{ old('nit')}}">
                {!! $errors->first('nit','<small class="text-danger">:message</small>')!!}
            </div>
            <div class="form-group">
                <label><b>NUP</b><span class="text-danger">*</span></label>
                <input type="text" name="nup" class="form-control" placeholder="000000000000" value="{{ old('nup')}}">
                {!! $errors->first('nup','<small class="text-danger">:message</small>')!!}
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1"><b>Estado civil</b><span class="text-danger">*</span></label>
                <select class="form-control"  name="estadoCivil" value="{{ old('estadoCivil')}}">
                    <option>Seleccione un estado civil</option>
                    @foreach($estadoCiviles as $estadoCivil)
                    <option value="{{$estadoCivil->id}}">{{$estadoCivil->name}}</option>
                    @endforeach
                </select>
                {!! $errors->first('estadoCivil','<small class="text-danger">:message</small>')!!}
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1"><b>Género</b><span class="text-danger">*</span></label>
                <select class="form-control"  name="genero" value="{{ old('genero')}}">
                <option>Seleccione un género</option>
                    @foreach ($generos as $genero)
                    <option value="{{$genero->id}}">{{$genero->name}}</option>
                    @endforeach
                </select>
                {!! $errors->first('genero','<small class="text-danger">:message</small>')!!}
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1"><b>Dirección</b><span class="text-danger">*</span></label>
                <textarea class="form-control" name="direccion" id="exampleFormControlTextarea1" rows="3" value="{{ old('direccion')}}"></textarea>
                {!! $errors->first('direccion','<small class="text-danger">:message</small>')!!}
            </div>
        </form>
    </div>
</div>

<div class="card-footer text-right">
                <a class="btn btn-outline-danger mb-2" href="{{route('empleado.show')}}">Cancelar</a>
                <button type="submit" class="btn btn-outline-primary"  form="formulario">Guardar</button>
</div>


@endsection
@section('scripts')
<script src="assets/js/empleado.js"></script>
@endsection