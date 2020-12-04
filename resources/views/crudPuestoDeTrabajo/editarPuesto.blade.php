@extends('base')

@section('titulo')
Editar Puesto de trabajo
@endsection

@section('tituloVista')
Editar Puesto de trabajo
@endsection

@section('sectiones')
<li class="breadcrumb-item"><a href="{{ route('puestos.show')}}">Puesto de trabajo</a></li>
<li class="breadcrumb-item"><a href="javascript:">Editar Puesto de trabajo</a></li>
@endsection

@section('tituloCard')
Información del Puesto de trabajo
<br>
<small class="text-danger">* Obligatorio</small>
@endsection

@section('contenido')                           
<div class="row">
    <div class="col-md-6" align="left">
        <form id="formulario" method="POST" action="{{route('puestos.update', $jobPosition)}}">
        @csrf @method('PATCH')
            <div class="form-group">
                <label><b>Nombre</b><span class="text-danger">*</span></label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="{{ $jobPosition->name}}">
                {!! $errors->first('nombre','<small class="text-danger">:message</small>')!!}
            </div>
            <div class="form-group">
                <label><b>Salario</b><span class="text-danger">*</span></label>
                <input type="number" name="salario" class="form-control" placeholder="0.00" value="{{ $jobPosition->salary}}">
                {!! $errors->first('salario','<small class="text-danger">:message</small>')!!}
            </div>
    </div>
    <div class="col-md-6">
            <div class="form-group">
                <label><b>Sección</b><span class="text-danger">*</span></label>
                <input type="number" name="seccion" class="form-control" placeholder="Sección" value="{{ $jobPosition->section_id}}">
            </div>
        </form>
    </div>
</div>

<div class="card-footer text-right">
                <a class="btn btn-outline-danger mb-2" href="{{ route('puestos.show')}}">Cancelar</a>
                <button type="submit" class="btn btn-outline-primary"  form="formulario">Guardar</button>
</div>
@endsection
