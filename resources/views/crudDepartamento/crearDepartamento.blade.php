@extends('base')

@section('titulo')
Crear Departamento
@endsection

@section('tituloVista')
Crear Departamento
@endsection

@section('sectiones')
<li class="breadcrumb-item"><a href="javascript:">Departamento</a></li>
<li class="breadcrumb-item"><a href="javascript:">Crear Departamento</a></li>
@endsection

@section('tituloCard')
Información del departamento
<br>
<small class="text-danger">* Obligatorio</small>
@endsection

@section('contenido')
<div class="row">
    <div class="col-md-6">
        <form id="formulario" method="POST" action="{{ route('departamento.store')}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputDepart"><b>Departamento</b><span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="name" aria-describedby="depHelp" placeholder="Enter Deparment">
                {!! $errors->first('name', '<small>:message</small>') !!}

                <label for="exampleFormControlSelect1"><b>Organizacion</b><span class="text-danger">*</span></label>
                <select class="form-control" id="dep" name="organization_id" value="{{ old('organization_id')}}">
                <option>Seleccione una organizacion</option>
                    @foreach($organizaciones as $organizacion)
                    <option value="{{ $organizacion->id}}">{{ $organizacion->name}}</option>
                    @endforeach
                </select>
                {!! $errors->first('organization_id','<small class="text-danger">:message</small>')!!}
            </div>
        </form>
    </div>
</div>
<div class="card-footer text-left">
                <a class="btn btn-outline-danger mb-1" href="{{ route('departamento.show')}}">Cancelar</a>
                <button type="submit" class="btn btn-outline-primary"  form="formulario">Guardar</button>
</div>

@endsection
