@extends('base')

@section('titulo')
Crear Empleado
@endsection

@section('tituloVista')
Crear Empleado
@endsection

@section('sectiones')
<li class="breadcrumb-item"><a href="javascript:">Empleado</a></li>
<li class="breadcrumb-item"><a href="javascript:">Crear empleado</a></li>
@endsection

@section('tituloCard')
Información del empleado
<br>
<small class="text-danger">* Obligatorio</small>
@endsection

@section('contenido')                           
<div class="row">
    <div class="col-md-6">
        <form id="formulario">
            <div class="form-group">
                <label for="exampleInputEmail1"><b>Email address</b><span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"><b>Password</b><span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1"><b>Check me out</b></label>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <form>
            <div class="form-group">
                <label><b>Text</b><span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Text">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1"><b>Example select</b><span class="text-danger">*</span></label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1"><b>Example textarea</b><span class="text-danger">*</span></label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        </form>
    </div>
</div>
<div class="card-footer text-right">
                <a class="btn btn-outline-danger mb-2" href="#">Cancelar</a>
                <button type="submit" class="btn btn-outline-primary"  form="formulario">Guardar</button>
</div>
@endsection
