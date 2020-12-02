@extends('base')

@section('titulo')
Editar Empleado
@endsection

@section('tituloVista')
Editar Empleado
@endsection

@section('sectiones')
<li class="breadcrumb-item"><a href="javascript:">Empleado</a></li>
<li class="breadcrumb-item"><a href="javascript:">Editar empleado</a></li>
@endsection

@section('tituloCard')
Información del empleado
<br>
<small class="text-danger">* Obligatorio</small>
@endsection

@section('contenido')                           
<div class="row">
    <div class="col-md-6" align="left">
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
                <input type="number" name="isss" class="form-control" placeholder="averiguar" value="{{ $employee->isss}}">
                {!! $errors->first('isss','<small class="text-danger">:message</small>')!!}

            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1"><b>Puesto de trabajo</b><span class="text-danger">*</span></label>
                <select class="form-control" id="exampleFormControlSelect1" name="puestoDeTrabajo" value="{{ $employee->job_position_id}}">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
                {!! $errors->first('puestoDeTrabajo','<small class="text-danger">:message</small>')!!}
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1"><b>Departamento</b><span class="text-danger">*</span></label>
                <select class="form-control" id="exampleFormControlSelect1" name="departamento">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
                {!! $errors->first('departamento','<small class="text-danger">:message</small>')!!}
            </div>
            
            <div class="form-group">
                <label for="exampleFormControlSelect1"><b>Municipio</b><span class="text-danger">*</span></label>
                <select class="form-control" id="exampleFormControlSelect1" name="municipio" value="{{ $employee->city_id}}">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
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
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
                {!! $errors->first('estadoCivil','<small class="text-danger">:message</small>')!!}
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1"><b>Género</b><span class="text-danger">*</span></label>
                <select class="form-control" id="exampleFormControlSelect1" name="genero" value="{{ $employee->gender_id}}">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
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

<div class="card-footer text-right">
                <a class="btn btn-outline-danger mb-2" href="#">Cancelar</a>
                <button type="submit" class="btn btn-outline-primary"  form="formulario">Guardar</button>
</div>
@endsection
