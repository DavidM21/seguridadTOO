@extends('base')

@section('titulo')
Crear Seccion
@endsection

@section('tituloVista')
Crear Seccion
@endsection

@section('sectiones')
<li class="breadcrumb-item"><a href="javascript:">Seccion</a></li>
<li class="breadcrumb-item"><a href="javascript:">Crear Seccion</a></li>
@endsection

@section('tituloCard')
Información de la seccion
<br>
<small class="text-danger">* Obligatorio</small>
@endsection

@section('contenido')
<div class="row">
    <div class="col-md-6">
        <form id="formulario" method="POST" action="{{ route('seccion.store')}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputSect"><b>Seccion</b><span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="name" aria-describedby="sectHelp" placeholder="Enter Section">
                {!! $errors->first('name', '<small>:message</small>') !!}

                <label for="exampleFormControlSelect1"><b>Departamento</b><span class="text-danger">*</span></label>
                <select class="form-control" id="dep" name="department_id" value="{{ old('department_id')}}">
                <option>Seleccione un departamento</option>
                    @foreach($departamentos as $departamento)
                    <option value="{{ $departamento->id}}">{{ $departamento->name}}</option>
                    @endforeach
                </select>
                {!! $errors->first('department_id','<small class="text-danger">:message</small>')!!}
            </div>
        </form>
    </div>
</div>
<div class="card-footer text-left">
                <a class="btn btn-outline-danger mb-1" href="{{ route('departamento.show')}}">Cancelar</a>
                <button type="submit" class="btn btn-outline-primary"  form="formulario">Guardar</button>
</div>

@endsection
