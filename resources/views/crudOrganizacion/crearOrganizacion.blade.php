@extends('base')

@section('titulo')
Crear Organizacion
@endsection

@section('tituloVista')
Crear Organizacion
@endsection

@section('sectiones')
<li class="breadcrumb-item"><a href="javascript:">Organizacion</a></li>
<li class="breadcrumb-item"><a href="javascript:">Crear Organizacion</a></li>
@endsection

@section('tituloCard')
Información de la Organización
<br>
<small class="text-danger">* Obligatorio</small>
@endsection

@section('contenido')
<div class="row">
    <div class="col-md-6">
        <form id="formulario" method="POST" action="{{ route('organizacion.store')}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputOrganizacion"><b>Organización</b><span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="name" aria-describedby="orgHelp" placeholder="Enter Organization">
                {!! $errors->first('name', '<small>:message</small>') !!}
            </div>
        </form>
    </div>
</div>
<div class="card-footer text-left">
                <a class="btn btn-outline-danger mb-1" href="{{ route('organizacion.show')}}">Cancelar</a>
                <button type="submit" class="btn btn-outline-primary"  form="formulario">Guardar</button>
</div>

@endsection
