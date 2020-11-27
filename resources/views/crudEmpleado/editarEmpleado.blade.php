@extends('base')

@section('titulo')
Editar Empleado
@endsection

@section('tituloVista')
Editar Empleado
@endsection

@section('sectiones')
<li class="breadcrumb-item"><a href="javascript:">Empleado</a></li>
<li class="breadcrumb-item"><a href="javascript:">Editar empleado</a></li>
@endsection

@section('tituloCard')
Información del empleado
<br>
<small class="text-danger">* Obligatorio</small>
@endsection

@section('contenido')                           
<div class="row">
    <div class="col-md-6" align="left">
        <form id="formulario">
            <div class="form-group">
                <label><b>Nombre</b><span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Nombre">
            </div>
            <div class="form-group">
                <label><b>DUI</b><span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="00000000-0">
            </div>
            <div class="form-group">
                <label><b>ISSS</b><span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="averiguar">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1"><b>Puesto de trabajo</b><span class="text-danger">*</span></label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1"><b>Departamento</b><span class="text-danger">*</span></label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="exampleFormControlSelect1"><b>Municipio</b><span class="text-danger">*</span></label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
    </div>
    <div class="col-md-6">
            <div class="form-group">
                <label><b>Apellido</b><span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Apellido">
            </div>
            <div class="form-group">
                <label><b>NIT</b><span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="0000-000000-000-0">
            </div>
            <div class="form-group">
                <label><b>NUP</b><span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="averiguar">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1"><b>Estado civil</b><span class="text-danger">*</span></label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1"><b>Género</b><span class="text-danger">*</span></label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1"><b>Dirección</b><span class="text-danger">*</span></label>
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
