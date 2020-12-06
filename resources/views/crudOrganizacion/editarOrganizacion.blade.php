@extends('layouts.business')

@section('section', 'Organización')

@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">ORGANIZACIONES</h5>

                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:">Organizaciones</a></li>
                        <li class="breadcrumb-item"><a href="javascript:">Editar organización</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12">
        <div class="card Recent-Users">
            <div class="card-header unread">
                <h5>Información de la Organización</h5>
                <br>
                <small class="text-danger">* Obligatorio</small>
            </div>
            <div class="card-header py-3"> <!--pegar desde row-->
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
                </div>
                <div class="card-footer text-left">
                        <a class="btn btn-outline-danger mb-1" href="{{ route('organizacion.show')}}">Cancelar</a>
                        <button type="submit" class="btn btn-outline-primary"  form="formulario">Actualizar</button>
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
