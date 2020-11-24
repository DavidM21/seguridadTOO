@extends('base')

@section('titulo')
Editar Organización
@endsection

@section('tituloVista')
Modo edición
@endsection

@section('sectiones')
<li class="breadcrumb-item"><a href="javascript:">Organización</a></li>
<li class="breadcrumb-item"><a href="javascript:">Editar</a></li>
@endsection

@section('tituloCard')
    Edición
    <br>
@endsection

@section('contenido')
    <div class="row">
        <div class="col-md-6">
            <form id="formulario" method="POST" action="{{ route('organizacion.update', $organization)}}">
                @csrf @method('PATCH')
                <div class="form-group">
                    <label for="exampleInputEdition"><b>Editar nombre</b><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" aria-describedby="orgNameHelp" value="{{ $organization->name }}">
                    {!! $errors->first('name', '<small>:message</small>') !!}
                </div>
            </form>
        </div>
        <div class="card-footer text-rigth">
                    <a class="btn btn-outline-danger mb-1" href="{{ route('organizacion.store')}}">Cancelar</a>
                    <button type="submit" class="btn btn-outline-primary"  form="formulario">Actualizar</button>
        </div>
    </div>

@endsection
