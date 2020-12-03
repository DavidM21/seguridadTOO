@extends('base')

@section('titulo')
Editar Seccion
@endsection

@section('tituloVista')
Modo edición
@endsection

@section('sectiones')
<li class="breadcrumb-item"><a href="javascript:">Seccion</a></li>
<li class="breadcrumb-item"><a href="javascript:">Editar</a></li>
@endsection

@section('tituloCard')
    Edición
    <br>
@endsection

@section('contenido')
    <div class="row">
        <div class="col-md-6">
            <form id="formulario" method="POST" action="{{ route('seccion.update', $section)}}">
                @csrf @method('PATCH')
                <div class="form-group">
                    <label for="exampleInputEdition"><b>Editar nombre</b><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" aria-describedby="depHelp" value="{{ $section->name}}">
                    {!! $errors->first('name', '<small>:message</small>') !!}

                    <label for="exampleFormControlSelect1"><b>Departamentos</b><span class="text-danger">*</span></label>
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
        <div class="card-footer text-rigth">
                    <a class="btn btn-outline-danger mb-1" href="{{ route('seccion.show')}}">Cancelar</a>
                    <button type="submit" class="btn btn-outline-primary"  form="formulario">Actualizar</button>
        </div>
    </div>

@endsection
