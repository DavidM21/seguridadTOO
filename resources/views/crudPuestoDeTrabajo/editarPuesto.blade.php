@extends('layouts.business')

@section('section', 'Puesto de trabajo')

@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">PUESTOS DE TRABAJOS</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:">Puestos de trabajo</a></li>
                        <li class="breadcrumb-item"><a href="javascript:">Editar puesto de trabajo</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12">
        <div class="card Recent-Users">
            <div class="card-header unread">
                <h5>Información del Puesto de trabajo</h5>
                <br>
                <small class="text-danger">* Obligatorio</small>
            </div>
            <div class="card-header py-3"> <!--pegar desde row-->
            <div class="row">
                <div class="col-md-6">
                <form id="formulario" method="POST" action="{{route('puestos.update', $jobPosition)}}">
                    @csrf @method('PATCH')
                        <div class="form-group">
                            <label><b>Nombre</b><span class="text-danger">*</span></label>
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="{{ $jobPosition->name}}" >
                            {!! $errors->first('nombre','<small class="text-danger">:message</small>')!!}
                        </div>
                        <div class="form-group">
                            <label><b>Salario</b><span class="text-danger">*</span></label>
                            <input type="number" name="salario" class="form-control" placeholder="0.00" value="{{ $jobPosition->salary}}" >
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
            <div class="card-footer text-rigth">
                <a class="btn btn-outline-danger mb-2" href="{{ route('puestos.show')}}">Cancelar</a>
                <button type="submit" class="btn btn-outline-primary"  form="formulario">Guardar</button>
                </div>
            </div> <!-- hasta aca-->
        </div>
    </div>
@endsection

@section('js_after')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
@endsection







