@extends('layouts.app')

@section('content-header')
<section class="content-header">
      <h1> 
        ...
        <small>...</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Cuentas</a></li>
        <li class="active">Registros</li>
      </ol>
    </section>
@endsection
@section('content')
<div class="content">
	<div class="row">
        <div class="col">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Modificar cuentas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <div class="card">
            <div class="card-body">
               
              {!! Form::open(['route' => ['cuentas.update', $cuentas->id], 'method' => 'PUT', 'name' => 'form', 'id' => 'form', 'data-parsley-validate']) !!}
                @csrf
                    <div class="row">                       
                         <div class="col-md-6">
                            <label for="exampleInputEmail1">Nombre *</label>
                             <input required="required" value="{{$cuentas->nombre}}" type="text" name="nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese la Descripción">
                       </div>  

                          <div class="col-md-6">
                            <label for="exampleInputEmail1">Descripción</label>
                             <input type="text" value="{{$cuentas->descripcion}}" name="descripcion" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese la Descripción">
                       </div> 

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                        <div class="form-group mt-3 mt-sm-0">
                            <label>Tipo *</label>
                            <select required="required" data-plugin="customselect" name="tipo" class="form-control" data-placeholder="Seleccione la cuenta">
                                <option selected="selected" readonly>Seleccionar</option>
                                <option value="pasivo">Pasivo</option>
                                <option value="activo">Activo</option>
                                <option value="capital">Capital</option>
                                <option value="egreso">Egreso</option>
                                <option value="ingreso">Ingreso</option>
                            </select>
                        </div> 

                      </div>

                    
                         <div class="col-md-4">
                            <label for="exampleInputEmail1">Código *</label>
                             <input value="{{$cuentas->codigo}}" required="required" type="text" name="codigo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese la Descripción">
                       </div>  

                        <div class="col-md-4">
                            <label for="exampleInputEmail1">Monto *</label>
                            <input value="{{$cuentas->saldo}}" required="required" name="saldo" type="number" class="form-control"  placeholder="Ingrese el monto">
                        </div>
 
                    </div>
                    <p style="color: black; padding-top: 10px;">Campos Obligatorios (*)</p>
                    <br>
                    <button  type="submit" class="btn btn-primary">Guardar</button>

            </div> <!-- end card-body-->
        </div> <!-- end card-->




              {!! Form::close() !!}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
</div>
@endsection