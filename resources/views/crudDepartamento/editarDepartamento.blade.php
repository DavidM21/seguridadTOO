@extends('base')

@section('titulo')
Editar Departamento
@endsection

@section('tituloVista')
Modo edición
@endsection

@section('sectiones')
<li class="breadcrumb-item"><a href="javascript:">Departamento</a></li>
<li class="breadcrumb-item"><a href="javascript:">Editar</a></li>
@endsection

@section('tituloCard')
    Edición
    <br>
@endsection

@section('contenido')
    <div class="row">
        <div class="col-md-6">
            <form id="formulario" method="POST" action="{{ route('departamento.update', $department)}}">
                @csrf @method('PATCH')
                <div class="form-group">
                    <label for="exampleInputEdition"><b>Editar nombre</b><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" aria-describedby="depHelp" value="{{ $department->name}}">
                    {!! $errors->first('name', '<small>:message</small>') !!}

                    <label for="exampleFormControlSelect1"><b>Departamentos</b><span class="text-danger">*</span></label>
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
        <div class="card-footer text-rigth">
                    <a class="btn btn-outline-danger mb-1" href="{{ route('departamento.show')}}">Cancelar</a>
                    <button type="submit" class="btn btn-outline-primary"  form="formulario">Actualizar</button>
        </div>
    </div>

@endsection
